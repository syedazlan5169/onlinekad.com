<?php

namespace App\Http\Controllers;

use App\Models\Design;
use App\Models\Package;
use App\Models\Promotion;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch products from the database
        $products = Design::orderBy('total_created', 'desc')->limit(8)->get();

        // Fetch products from the database
        $packages = Package::all();

        // Fetch active promotions
        $activePromotion = Promotion::active()->first();

        // Pass products and active promotions to the view
        return view('home', compact('products', 'packages', 'activePromotion'));
    }
}
