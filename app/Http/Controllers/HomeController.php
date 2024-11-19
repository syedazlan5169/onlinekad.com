<?php

namespace App\Http\Controllers;

use App\Models\Design;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch products from the database
        $products = Design::orderBy('total_created', 'desc')->limit(8)->get();

        // Pass products to the view
        return view('home', compact('products'));
    }
}
