<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ZohoBooksService
{
    public function getAccessToken(): string
    {
        return Cache::remember('zoho_access_token', 3500, function () {
            $response = Http::asForm()->post(config('services.zoho.token_url'), [
                'refresh_token' => config('services.zoho.refresh_token'),
                'client_id'     => config('services.zoho.client_id'),
                'client_secret' => config('services.zoho.client_secret'),
                'grant_type'    => 'refresh_token',
            ]);

            if ($response->failed()) {
                Log::error('Failed to refresh Zoho access token.', [
                    'response' => $response->body(),
                ]);
                throw new \Exception('Failed to refresh Zoho access token.');
            }

            return $response->json()['access_token'];
        });
    }

    public function createCustomer(array $data)
    {
        $token = $this->getAccessToken();

        $response = Http::withToken($token, 'Zoho-oauthtoken')->post('https://books.zoho.com/api/v3/customers', [
            'organization_id' => config('services.zoho.org_id'),
            ...$data,
        ]);

        if ($response->failed()) {
            Log::error('Zoho createCustomer failed', [
                'request' => $data,
                'response' => $response->json(),
            ]);
            return null;
        }

        return $response->json('customer');
    }

    public function createInvoice(array $data)
    {
        $token = $this->getAccessToken();

        $response = Http::withToken($token, 'Zoho-oauthtoken')->post("https://books.zoho.com/api/v3/invoices", [
            'organization_id' => config('services.zoho.org_id'),
            ...$data,
        ]);

        if ($response->failed()) {
            Log::error('Zoho createInvoice failed', [
                'request' => $data,
                'response' => $response->json(),
            ]);
            return null;
        }

        return $response->json('invoice');
    }

    public function recordPayment(array $data)
    {
        $token = $this->getAccessToken();

        $response = Http::withToken($token, 'Zoho-oauthtoken')->post("https://books.zoho.com/api/v3/customerpayments", [
            'organization_id' => config('services.zoho.org_id'),
            ...$data,
        ]);

        if ($response->failed()) {
            Log::error('Zoho recordPayment failed', [
                'request' => $data,
                'response' => $response->json(),
            ]);
            return null;
        }

        return $response->json('payment');
    }
}
