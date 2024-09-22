<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KadController extends Controller
{
    public function show()
    {
        $data = [
            'title' => 'Walimatulurus',
            'bride_nick_name' => 'Hawa',
            'groom_nick_name' => 'Adam',
            'bride_name' => 'Nurul Hawa Binti Ishak',
            'groom_name' => 'Mohammad Adam Bin Mohammad Rahman',
            'father_name' => 'Mohammad Rahman Bin Ayob',
            'mother_name' => 'Sarimah Binti Isa', 
            'event_day' => 'Sabtu',
            'masa_mula' => '10:00 AM',
            'masa_tamat' => '5:00 PM',
            'alamat' => ' No 119 Persiaran Makmor 2, Taman Makmor, 31100 Sungai Siput (U) Perak Darul Ridzuan',
            'event_date' => '21',
            'event_month' => 'Disember',
            'event_year' => '2024',
            'ayat_jemputan' => 'DENGAN SEGALA HORMATNYA MENJEMPUT DATO\' / DATIN / TUAN / PUAN / ENCIK / CIK DAN SEISI KELUARGA KE MAJLIS PERKAHWINAN PUTERA KAMI BERSAMA PASANGANNYA',

            'font_url1' => 'https://fonts.googleapis.com/css2?family=Fredericka+the+Great&family=Great+Vibes&display=swap',
            'font_name1' => 'Great Vibes',
            'font_url2' => 'https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap',
            'font_name2' => 'Dancing Script',
        ];

        return view('kad.base_template', compact('data'));
    }
}
