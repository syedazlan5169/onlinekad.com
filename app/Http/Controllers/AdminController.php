<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kad;
use App\Models\Order;
use App\Models\Design;
use App\Models\Package;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);
        $totalUsers = User::count();

        $kads = Kad::with('design', 'package')->paginate(5);
        $totalKads = Kad::count();

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

        if ($lastMonthRevenue > 0)
        {
            $monthChange = round((($thisMonthRevenue - $lastMonthRevenue) / $lastMonthRevenue) * 100, 2) . '%';
            $weekchange = round((($thisWeekRevenue - $lastWeekRevenue) / $lastWeekRevenue) * 100, 2) . '%';
            $dayChange = round((($todayRevenue - $yesterdayRevenue) / $yesterdayRevenue) * 100, 2) . '%';
        }
        else
        {
            $monthChange = 'null';
            $weekChange = 'null';
            $dayChange = 'null';
        }


        return view('admin-dashboard', compact('users', 'totalUsers', 'kads', 'totalKads', 'orders', 'totalRevenue', 'thisMonthRevenue','thisWeekRevenue', 'todayRevenue', 'monthChange', 'weekChange', 'dayChange'));
    }

    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('success', 'User deleted successfully');
    }
}
