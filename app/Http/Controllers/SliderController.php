<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Kad; 

class SliderController extends Controller
{
    /**
     * Handle the file upload and return the file path.
     */
    public function uploadImage($file)
    {
        // Define the directory for storing images
        $directory = 'slider';

        // Create a unique file name
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();

        // Store the file in the 'storage/app/public/slider' directory
        $file->storeAs("public/$directory", $filename);

        // Return the file path to store in the database
        return "$directory/$filename";
    }
}
