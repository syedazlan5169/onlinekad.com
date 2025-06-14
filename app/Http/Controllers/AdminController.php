<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kad;
use App\Models\Order;
use App\Models\Design;
use App\Models\Package;
use App\Models\PageVisit;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        $thisMonthRevenue = Order::where('status', 1)->whereBetween('created_at', [ Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth() ])->sum('amount');
        $lastMonthRevenue = Order::where('status', 1)->whereBetween('created_at', [
            Carbon::now()->subMonth()->startOfMonth(),
            Carbon::now()->subMonth()->endOfMonth(),
        ])->sum('amount');
        $thisWeekRevenue = Order::where('status', 1)->whereBetween('created_at', [ Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek() ])->sum('amount');
        $lastWeekRevenue = Order::where('status', 1)->whereBetween('created_at', [
            Carbon::now()->subWeek()->startOfWeek(),
            Carbon::now()->subWeek()->endOfWeek(),
        ])->sum('amount');
        $todayRevenue = Order::where('status', 1)->whereDate('created_at', Carbon::today())->sum('amount');
        $yesterdayRevenue = Order::where('status', 1)->whereDate('created_at', Carbon::yesterday())->sum('amount');

        function calculatePercentageChange($current, $previous)
        {
            return $previous > 0 ? round((($current - $previous) / $previous) * 100, 2) . '%' : 'null';
        }

        $monthChange = calculatePercentageChange($thisMonthRevenue, $lastMonthRevenue);
        $weekChange = calculatePercentageChange($thisWeekRevenue, $lastWeekRevenue);
        $dayChange = calculatePercentageChange($todayRevenue, $yesterdayRevenue);

        // Count Unique Visitor
        $totalVisitor = PageVisit::distinct('ip')->count();
        $thisMonthVisitor = PageVisit::whereBetween('created_at', [ Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth() ])->distinct('ip')->count();
        $thisWeekVisitor = PageVisit::whereBetween('created_at', [ Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek() ])->distinct('ip')->count();
        $todayVisitor = PageVisit::whereDate('created_at', Carbon::today())->distinct('ip')->count();
        $lastMonthVisitor = PageVisit::whereBetween('created_at', [
            Carbon::now()->subMonth()->startOfMonth(),
            Carbon::now()->subMonth()->endOfMonth(),
        ])->distinct('ip')->count();
        $lastWeekVisitor = PageVisit::whereBetween('created_at', [
            Carbon::now()->subWeek()->startOfWeek(),
            Carbon::now()->subWeek()->endOfWeek(),
        ])->distinct('ip')->count();
        $yesterdayVisitor = PageVisit::whereDate('created_at', Carbon::yesterday())->distinct('ip')->count();

        $monthVisitorChange = calculatePercentageChange($thisMonthVisitor, $lastMonthVisitor);
        $weekVisitorChange = calculatePercentageChange($thisWeekVisitor, $lastWeekVisitor);
        $dayVisitorChange = calculatePercentageChange($todayVisitor, $yesterdayVisitor);

        $googleVisitor = PageVisit::where('referer', 'like', '%google%')->distinct('ip')->count();
        $instagramVisitor = PageVisit::where('referer', 'like', '%instagram%')->distinct('ip')->count();
        $onlinekadVisitor = PageVisit::where('referer', 'like', '%onlinekad.com/invitation/%')->distinct('ip')->count();

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
}
