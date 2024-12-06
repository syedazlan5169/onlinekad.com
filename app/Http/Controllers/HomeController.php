<?php

namespace App\Http\Controllers;

use App\Models\Design;
use App\Models\Package;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch products from the database
        $products = Design::orderBy('total_created', 'desc')->limit(8)->get();

        // Fetch products from the database
        $packages = Package::all();

        // Pass products to the view
        return view('home', compact('products', 'packages'));
    }
}
