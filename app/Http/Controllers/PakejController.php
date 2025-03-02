<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;

class PakejController extends Controller
{
    public function index()
    {
        // Fetch products from the database
        $packages = Package::all();

        // Pass products to the view
        return view('pakej', compact('packages'));
    }
}
