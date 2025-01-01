<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

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

        return back()->with('success', 'Mesej anda berjaya dihantar.');
    }
}
