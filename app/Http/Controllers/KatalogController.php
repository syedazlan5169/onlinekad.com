<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Design;

class KatalogController extends Controller
{
       public function index()
    {
        // Fetch products from the database
        $products = Design::all();

        // Pass products to the view
        return view('katalog', compact('products'));
    }
}
