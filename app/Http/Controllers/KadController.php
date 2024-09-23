<?php

namespace App\Http\Controllers;

use App\Models\Guestbook;
use Illuminate\Http\Request;

class KadController extends Controller
{
    public function show()
    {
        $data = [
            'title' => 'Walimatulurus',
            'bride_nickname' => 'Najwa',
            'groom_nickname' => 'Azlan',
            'bride_name' => 'Nurul Nazatul Najwa Binti Mior Rahim',
            'groom_name' => 'Syed Azlan Izzuddin Shah Bin Syed Shaharom',
            'father_name' => 'Syed Shaharom Bin Syed Bahari',
            'mother_name' => 'Zubaidah Binti Hamdan', 
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

        $guestbookController = new GuestbookController();
        $wishes = $guestbookController->showWishes();

        $imageUrls = json_decode('["images/slide1.webp", "images/slide2.webp", "images/slide3.webp"]');

        return view('kad.base_template', compact('data', 'imageUrls', 'wishes'));
    }
}
