<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kad;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);
        $totalUsers = User::count();

        $kads = Kad::paginate(5);
        $totalKads = Kad::count();

        $orders = Order::paginate(5);
        $totalOrders = Order::count();

        return view('admin-dashboard', compact('users', 'totalUsers', 'kads', 'totalKads', 'orders', 'totalOrders'));
    }

    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('success', 'User deleted successfully');
    }
}
