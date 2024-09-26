<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rsvp;

class RsvpController extends Controller
{
    public function create()
    {
        Rsvp::create([
            'kad_id' => request('kad_id'),
            'nama' => request('nama'),
            'nombor_telefon' => request('nombor_telefon'),
            'kehadiran' => request('kehadiran'),
            'jumlah_kehadiran' => request('jumlah_kehadiran')
        ]);

        return redirect('/n002')->with('success', 'RSVP submitted successfully.');
    }
}
