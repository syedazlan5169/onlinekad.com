<?php

namespace App\Http\Controllers;

use App\Mail\NewPayment;
use App\Models\Kad;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Package;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Services\ZohoBooksService;

class ToyyibpayController extends Controller
{
    public function createOrder($kad)
    {
        // Check if an order already exists with this order_id
        $existingOrder = Order::where('order_id', $kad->order_id)->first();

        if (!$existingOrder) {
            // If no existing order, create a new one
            Order::create([
                'user_id' => Auth::user()->id,
                'user_email' => Auth::user()->email,
                'order_id' => $kad->order_id,
            ]);
        }
    }


    public function createBill($kadId)
    {
        // Retrieve the Kad and its associated package
        $kad = Kad::where('id', $kadId)->with('package')->first();

        if (!$kad || !$kad->package) {
            return redirect()->back()->withErrors('Kad or package not found.');
        }

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Use the package directly from the loaded relationship
        $package = $kad->package;
        $price = 100 * $package->final_price;
        $orderId = $kad->order_id;

        // Create the order
        $this->createOrder($kad);

        // Build the bill data
        $bill = [
            'userSecretKey' => config('services.toyyibpay.secretKey'),
            'categoryCode' => config('services.toyyibpay.category'),
            'billName' => $package->name,
            'billDescription' => $package->description,
            'billPriceSetting' => 1,
            'billPayorInfo' => 1,
            'billAmount' => $price,
            'billReturnUrl' => route('payment-status'),
            'billCallbackUrl' => route('toyyibpay-callback'),
            'billExternalReferenceNo' => $orderId,
            'billTo' => Auth::user()->name,
            'billEmail' => Auth::user()->email,
            'billPhone' => Auth::user()->phone,
            'billSplitPayment' => 0,
            'billSplitPaymentArgs' => '',
            'billPaymentChannel' => '0',
            'billContentEmail' => 'Thank you for purchasing our product!',
        ];

        // Log the bill data for debugging purposes
        Log::info('Bill data being sent to ToyyibPay: ', $bill);

        // Send request to ToyyibPay API
        $url = config('services.toyyibpay.createBillUrl');
        
        try {
            $response = Http::asForm()->post($url, $bill);

            // Log the response for debugging purposes
            Log::info('ToyyibPay API Response: ', $response->json());

            // Check if the response was successful and contains a BillCode
            if ($response->successful() && isset($response[0]['BillCode'])) {
                $billCode = $response[0]['BillCode'];
                return redirect()->away(config('services.toyyibpay.redirectUrl') . $billCode);
            } else {
                Log::error('ToyyibPay API Error: ' . $response->body());
                return redirect()->back()->withErrors('Failed to create bill. Please try again.');
            }
        } catch (\Exception $e) {
            Log::error('Error during API request: ' . $e->getMessage());
            return redirect()->back()->withErrors('An error occurred. Please try again later.');
        }
    }


    public function handleToyyibpayRedirect(Request $request)
    {
        $statusId = $request->query('status_id');
        $billcode = $request->query('billcode');
        $orderId = $request->query('order_id');
        
        return view('payment-status', compact('statusId', 'billcode', 'orderId'));
    }

    public function handleToyyibpayCallback(Request $request)
    {
        // Extract the necessary fields from the callback request
        $response = $request->only(['refno', 'status', 'reason', 'billcode', 'order_id', 'amount', 'transaction_time']);
        $order = Order::where('order_id', $response['order_id'])->firstOrFail();
        $kad = $order->kad;
        $user = User::where('id', $kad->user_id)->first();
        if ($kad->package_id == 3) {
            $item_id = "3074856000000835030";
        }
        else
        {
            $item_id = "3074856000000835017";
        }

        // Create a new PaymentAttempt entry
        Payment::create([
            'order_id' => $response['order_id'],  
            'refno' => $response['refno'],  
            'reason' => $response['reason'],   
            'billcode' => $response['billcode'],  
            'status' => $response['status'] === '1' ? 'success' : 'failed', 
            'amount' => $response['amount'],       
            'transaction_time' => $response['transaction_time'], 
        ]);

        Log::info('Response:', ['response' => $response]);
        Log::info('Order:', ['order' => $order]);
        Log::info('Kad:', ['kad' => $kad]);

        // Check if the payment status is successful
        if ($response['status'] === '1') {
            // Update the is_paid field to true using the Kad model
            if ($kad) {
                $kad->update(['is_paid' => true]);

                $zoho = new ZohoBooksService();

                // Create a new contact in Zoho Books
                $customer= $zoho->createCustomer([
                    'contact_name' => $user->name,
                ]);
                Log::info('Customer Create Response: ', ['customer' => $customer]);

                // Create a new invoice in Zoho Books
                $invoice = $zoho->createInvoice([
                    'customer_id' => $customer['customer_id'],
                    'date' => today()->format('Y-m-d'),
                    'line_items' => [
                        [
                            'item_id' => $item_id,
                            'quantity' => 1,
                        ],
                    ],
                    'adjustment' => -1,
                    'adjustment_description' => "ToyyibPay",
                ]);
                Log::info('Invoice Create Response: ', ['invoice' => $invoice]);

                // Create a new payment
                $zoho->recordPayment([
                    'customer_id' => $customer['customer_id'],
                    'payment_mode' => "Cash",
                    'amount' => $response['amount'] + $invoice['adjustment'],
                    'date' => today()->format('Y-m-d'),
                    'invoices' => [
                        [
                            'invoice_id' => $invoice['invoice_id'],
                            'amount_applied' => $response['amount'] + $invoice['adjustment'],
                        ]
                    ],
                    'invoice_id' => $invoice['invoice_id'],
                    'amount_applied' => $response['amount'] + $invoice['adjustment'],
                ]);

                // Send payment success email to user
                try {
                    Mail::to($order->user_email)->send(new NewPayment());
                } catch (\Exception $e) {
                    Log::error('Email failed: ' . $e->getMessage());
                }

            } else {
                Log::error('No associated Kad found for the order.');
            }
        } else {
            // Log a warning if the payment was unsuccessful
            Log::warning('Payment was unsuccessful.', [
                'order_id' => $response['order_id'], 
                'status' => $response['status']
            ]);
        }

        // Update the order with the response data
        $order->update($response);
    }

}
