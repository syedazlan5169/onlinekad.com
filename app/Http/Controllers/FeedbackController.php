<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewFeedback;

class FeedbackController extends Controller
{
    public function create(Request $request)
    {
        $feedback = Feedback::create([
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'telefon' => $request->input('telefon'),
            'subjek' => $request->input('subjek'),
            'mesej' => $request->input('mesej'),
        ]);

        // Send New Kad created email
        try {
            Mail::to('admin@onlinekad.com')->send(new NewFeedback($feedback));
        } catch (\Exception $e) {
            Log::error('Email failed: ' . $e->getMessage());
        }

        return back()->with('success', 'Mesej anda berjaya dihantar.');
    }
}
