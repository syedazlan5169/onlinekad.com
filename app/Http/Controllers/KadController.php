<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KadController extends Controller
{
    public function show()
    {
        $data = [
            'title' => 'Walimatulurus',
            'bride_name' => 'Mariani',
            'groom_name' => 'Mazlan',
            'event_day' => 'Sabtu',
            'event_date' => '21',
            'event_month' => 'Disember',
            'event_year' => '2024',
        ];

        return view('kad.base_template', compact('data'));
    }
}
