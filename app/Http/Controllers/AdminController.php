<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kad;
use App\Models\Order;
use App\Models\Design;
use App\Models\Package;
use App\Models\PageVisit;
use App\Models\DailyPageStat;
use App\Models\DailyReferrerStat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $kads = Kad::query()
            ->when($search, function ($query, $search) {
                $query->where('id', 'like', "%{$search}%")
                      ->orWhereHas('user', function ($query) use ($search) {
                          $query->where('name', 'like', "%{$search}%");
                      })
                      ->orWhere('nama_panggilan_pasangan_pertama', 'like', "%{$search}%")
                      ->orWhere('nama_panggilan_pasangan_kedua', 'like', "%{$search}%")
                      ->orWhere('nama_panggilan_lelaki', 'like', "%{$search}%")
                      ->orWhere('nama_panggilan_perempuan', 'like', "%{$search}%")
                      ->orWhere('slug', 'like', "%{$search}%");
            })
            ->paginate(10);

        $totalKads = Kad::count();

        $users = User::paginate(10);
        $totalUsers = User::count();

        $orders = Order::paginate(5);
        $totalRevenue = Order::where('status', 1)->sum('amount');
        $thisMonthRevenue = Order::where('status', 1)->whereBetween('updated_at', [ Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth() ])->sum('amount');
        $lastMonthRevenue = Order::where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->subMonth()->startOfMonth(),
            Carbon::now()->subMonth()->endOfMonth(),
        ])->sum('amount');
        $thisWeekRevenue = Order::where('status', 1)->whereBetween('updated_at', [ Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek() ])->sum('amount');
        $lastWeekRevenue = Order::where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->subWeek()->startOfWeek(),
            Carbon::now()->subWeek()->endOfWeek(),
        ])->sum('amount');
        $todayRevenue = Order::where('status', 1)->whereDate('updated_at', Carbon::today())->sum('amount');
        $yesterdayRevenue = Order::where('status', 1)->whereDate('updated_at', Carbon::yesterday())->sum('amount');

        function calculatePercentageChange($current, $previous)
        {
            return $previous > 0 ? round((($current - $previous) / $previous) * 100, 2) . '%' : 'null';
        }

        $monthChange = calculatePercentageChange($thisMonthRevenue, $lastMonthRevenue);
        $weekChange = calculatePercentageChange($thisWeekRevenue, $lastWeekRevenue);
        $dayChange = calculatePercentageChange($todayRevenue, $yesterdayRevenue);

        // Visitor stats calculation
        // Today: from raw logs
        $todayVisitor = PageVisit::whereDate('created_at', Carbon::today())->distinct('ip')->count();
        $yesterdayVisitor = DailyPageStat::where('date', Carbon::yesterday()->toDateString())->sum('unique_ips');

        // Week & Month: from summary
        $archivedThisWeek = DailyPageStat::whereBetween('date', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->sum('unique_ips');
        $thisWeekVisitor = $archivedThisWeek + $todayVisitor;

        $lastWeekVisitor = DailyPageStat::whereBetween('date', [
            Carbon::now()->subWeek()->startOfWeek(),
            Carbon::now()->subWeek()->endOfWeek(),
        ])->sum('unique_ips');

        $archivedThisMonth = DailyPageStat::whereBetween('date', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->sum('unique_ips');
        $thisMonthVisitor = $archivedThisMonth + $todayVisitor;

        $lastMonthVisitor = DailyPageStat::whereBetween('date', [
            Carbon::now()->subMonth()->startOfMonth(),
            Carbon::now()->subMonth()->endOfMonth(),
        ])->sum('unique_ips');

        $totalVisitor = DailyPageStat::sum('unique_ips') + PageVisit::distinct('ip')->count(); // total from summary + current day

        $monthVisitorChange = calculatePercentageChange($thisMonthVisitor, $lastMonthVisitor);
        $weekVisitorChange = calculatePercentageChange($thisWeekVisitor, $lastWeekVisitor);
        $dayVisitorChange = calculatePercentageChange($todayVisitor, $yesterdayVisitor);

        // Referrer stats (Google, Instagram, OnlineKad)
        $archivedGoogle = DailyReferrerStat::where('referer', 'like', '%google%')->sum('unique_ips');
        $googleVisitor = $archivedGoogle + PageVisit::where('referer', 'like', '%google%')->distinct('ip')->count();

        $archivedInstagram = DailyReferrerStat::where('referer', 'like', '%instagram%')->sum('unique_ips');
        $instagramVisitor = $archivedInstagram + PageVisit::where('referer', 'like', '%instagram%')->distinct('ip')->count();

        $archivedOnlinekad = DailyReferrerStat::where('referer', 'like', '%onlinekad.com/invitation/%')->sum('unique_ips');
        $onlinekadVisitor = $archivedOnlinekad + PageVisit::where('referer', 'like', '%onlinekad.com/invitation/%')->distinct('ip')->count();

        return view('admin-dashboard', compact('users',
                                                'totalUsers', 'kads', 'totalKads', 'orders',
                                                'totalRevenue', 'thisMonthRevenue','thisWeekRevenue', 'todayRevenue', 'monthChange', 'weekChange', 'dayChange',
                                                'totalVisitor', 'thisMonthVisitor', 'thisWeekVisitor', 'todayVisitor', 'monthVisitorChange', 'weekVisitorChange', 'dayVisitorChange',
                                                'googleVisitor', 'instagramVisitor', 'onlinekadVisitor'));
    }

    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('success', 'User deleted successfully');
    }

    public function createFakeOrder(Request $request)
    {
        $user = Auth::user();
        $orderId = 'MAN' . rand(100000, 999999) . strtoupper(Str::random(5));

        Order::create([
            'user_id' => $user->id,
            'user_email' => $user->email,
            'amount' => $request->amount,
            'order_id' => $orderId,
            'status' => 1,
            'reason' => 'Manual Order',
            'created_at' => $request->order_date,
            'updated_at' => $request->order_date,
        ]);

        return back()->with('success', 'Manual Order created successfully');
    }

    public function searchKadBySlug(Request $request)
    {
        $request->validate([
            'slug' => 'required|string',
        ]);

        $kad = Kad::where('slug', $request->slug)->first();

        if (!$kad) {
            return back()->with('error', 'Kad not found with the provided slug.');
        }

        return back()->with('kad_search_result', $kad);
    }

    public function updateKadPaymentStatus(Request $request, $id)
    {
        $request->validate([
            'is_paid' => 'required|boolean',
        ]);

        $kad = Kad::findOrFail($id);
        $kad->is_paid = $request->is_paid;
        $kad->save();

        $status = $request->is_paid ? 'PAID' : 'UNPAID';
        return back()->with('success', "Payment status updated to {$status} successfully.");
    }
}
