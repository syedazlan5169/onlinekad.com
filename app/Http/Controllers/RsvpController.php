<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rsvp;
use App\Models\Kad;

class RsvpController extends Controller
{
    public function create()
    {
        $kad = Kad::findOrFail(request('kad_id'));
        Rsvp::create([
            'kad_id' => request('kad_id'),
            'nama' => request('nama'),
            'nombor_telefon' => request('nombor_telefon'),
            'kehadiran' => request('kehadiran'),
            'jumlah_kehadiran' => request('jumlah_kehadiran')
        ]);

        return redirect()->back()->with([
            'success' => 'RSVP successfully submitted',
            'message_detail' => 'Thanks you for the response'
        ]);
    }

    public function destroy($id)
    {
        $rsvp = Rsvp::findOrFail($id);
        $rsvp->delete();

        return back()->with('success', 'Rsvp deleted successfully');
    }
}
