<?php

namespace App\Http\Controllers;

use App\Providers\GoogleDriveService;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    protected $googleDrive;

    public function __construct(GoogleDriveService $googleDrive)
    {
        $this->googleDrive = $googleDrive;
    }

    public function store(Request $request, $kadId)
    {
        $slider = new Slider();
        $slider->kad_id = $kadId;

        // Process each image and upload to Google Drive
        for ($i = 1; $i <= 5; $i++) {
            $imageField = 'picture_' . $i;
            if ($request->hasFile($imageField)) {
                $file = $request->file($imageField);
                $fileName = $file->getClientOriginalName();
                $filePath = $file->getPathname();

                // Upload file to Google Drive
                $fileId = $this->googleDrive->uploadFile($filePath, $fileName);

                // Store the Google Drive file URL in the database
                $slider->{'image_url_' . $i} = $this->googleDrive->getFileUrl($fileId);
            }
        }

        $slider->save();

        return redirect()->back()->with('success', 'Images uploaded successfully!');
    }
}

