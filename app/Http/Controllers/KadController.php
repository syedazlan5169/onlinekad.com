<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kad;
use App\Models\Design;
use App\Models\Font;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class KadController extends Controller
{
    public function index()
{
    $currentUserId = Auth::id();
    $kads = Kad::where('user_id', $currentUserId)->get();
    
    return view('senarai-kad', compact('kads'));
}


    public function tempahKad()
    {

        request()->validate([
            // Maklumat Pengantin
            'nama_penuh_lelaki' => ['required'],
            'nama_panggilan_lelaki' => ['required', 'max:12'],
            'nama_penuh_perempuan' => ['required'],
            'nama_panggilan_perempuan' => ['required', 'max:12'],
            'penjemput' => ['required', 'numeric'],
            'nama_bapa_pengantin_lelaki' => ['required_if:penjemput,1,3'],
            'nama_ibu_pengantin_lelaki' => ['required_if:penjemput,1,3'],
            'nama_bapa_pengantin_perempuan' => ['required_if:penjemput,2,3'],
            'nama_ibu_pengantin_perempuan' => ['required_if:penjemput,2,3'],
        
            // Maklumat Majlis
            'tajuk_kad' => ['required', 'max:20'],
            'ayat_jemputan' => ['required'],
            'doa_pengantin' => ['required'],
            'tarikh_majlis' => ['required', 'date'],
            'masa_mula_majlis' => ['required', 'date_format:H:i'],
            'masa_tamat_majlis' => ['required', 'date_format:H:i'],
            'alamat_majlis' => ['required'],
            'google_url' => ['required'],
            'waze_url' => ['required'],
        ]);

        Kad::create([
            //Maklumat Kad
            'slug' => Str::slug(request('nama_panggilan_lelaki')) . '-' . Str::slug(request('nama_panggilan_perempuan')) . '-' . Str::random(5),
            'order_id' => 'SY' . rand(100000, 999999) . strtoupper(Str::random(5)),
            'user_id' => 1,
            'design_id' => request('design_id'), 
            'font_id' => request('font'),
            'package_id' => 1,
            'is_paid' => true,

            // Maklumat Pengantin
            'nama_penuh_lelaki' => request('nama_penuh_lelaki'),
            'nama_panggilan_lelaki' => request('nama_panggilan_lelaki'),
            'nama_penuh_perempuan' => request('nama_penuh_perempuan'),
            'nama_panggilan_perempuan' => request('nama_panggilan_perempuan'),
            'nama_bapa_pengantin_lelaki' => request('nama_bapa_pengantin_lelaki'),
            'nama_ibu_pengantin_lelaki' => request('nama_ibu_pengantin_lelaki'),
            'nama_bapa_pengantin_perempuan' => request('nama_bapa_pengantin_perempuan'),
            'nama_ibu_pengantin_perempuan' => request('nama_ibu_pengantin_perempuan'),

            // Maklumat Majlis
            'tajuk_kad' => request('tajuk_kad'),
            'ayat_jemputan' => request('ayat_jemputan'),
            'doa_pengantin' => request('doa_pengantin'),
            'tarikh_majlis' => request('tarikh_majlis'),
            'masa_mula_majlis' => request('masa_mula_majlis'),
            'masa_tamat_majlis' => request('masa_tamat_majlis'),
            'alamat_majlis' => request('alamat_majlis'),
            'google_url' => request('google_url'),
            'waze_url' => request('waze_url'),
            
            'nombor_telefon' => [
                [
                    'nama' => request('nama_1') ?: null,
                    'nombor_telefon' => request('nombor_telefon_1') ?: null
                ],
                [
                    'nama' => request('nama_2') ?: null,
                    'nombor_telefon' => request('nombor_telefon_2') ?: null
                ],
                [
                    'nama' => request('nama_3') ?: null,
                    'nombor_telefon' => request('nombor_telefon_3') ?: null
                ],
                [
                    'nama' => request('nama_4') ?: null,
                    'nombor_telefon' => request('nombor_telefon_4') ?: null
                ],
                [
                    'nama' => request('nama_5') ?: null,
                    'nombor_telefon' => request('nombor_telefon_5') ?: null
                ]
            ],
            
            'aturcara_majlis' => [
                [
                    'masa_acara' => request('masa_acara_1') ?: null,
                    'acara' => request('acara_1') ?: null
                ],
                [
                    'masa_acara' => request('masa_acara_2') ?: null,
                    'acara' => request('acara_2') ?: null
                ],
                [
                    'masa_acara' => request('masa_acara_3') ?: null,
                    'acara' => request('acara_3') ?: null
                ],
                [
                    'masa_acara' => request('masa_acara_4') ?: null,
                    'acara' => request('acara_4') ?: null
                ],
                [
                    'masa_acara' => request('masa_acara_5') ?: null,
                    'acara' => request('acara_5') ?: null
                ],
                [
                    'masa_acara' => request('masa_acara_6') ?: null,
                    'acara' => request('acara_6') ?: null
                ]
            ],

        ]);


        return redirect('/senarai-kad');
    }

    public function translateToMalay($date, $option = 3)
    {
        // Set Carbon to display the day in English
        Carbon::setLocale('en'); 
    
        // Parse the date
        $date = Carbon::parse($date);
    
        // Define translations for days and months
        $days = [
            'Monday' => 'Isnin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Khamis',
            'Friday' => 'Jumaat',
            'Saturday' => 'Sabtu',
            'Sunday' => 'Ahad',
        ];
    
        $months = [
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Mac',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Jun',
            'July' => 'Julai',
            'August' => 'Ogos',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Disember',
        ];
    
        // Translate the day and month
        $translatedDay = $days[$date->format('l')];
        $translatedMonth = $months[$date->format('F')];
    
        // Build the full date
        $translatedDate = $translatedDay . ' ' . $date->format('d') . ' ' . $translatedMonth . ' ' . $date->format('Y');
    
        // Return based on the option selected
        switch ($option) {
            case 1:
                return $translatedDay; // Return only the day
            case 2:
                return $date->format('d') . ' ' . $translatedMonth . ' ' . $date->format('Y'); // Return only the date
            case 3:
            default:
                return $translatedDate; // Return day + date (default)
        }
    }
    

    public function show($slug)
    {

        $kadData = Kad::where('slug', $slug)->firstOrFail();
        $design = Design::findOrFail($kadData->design_id);
        $font = Font::findOrFail($kadData->font_id);

        $dateTime = [
            'hari_tarikh_majlis' => $this->translateToMalay($kadData->tarikh_majlis, 3),
            'hari_majlis' => $this->translateToMalay($kadData->tarikh_majlis, 1),
            'tarikh_majlis' => $this->translateToMalay($kadData->tarikh_majlis, 2),
            'masa_mula_majlis' => Carbon::createFromFormat('H:i:s', $kadData->masa_mula_majlis)->format('g:i A'),
            'masa_tamat_majlis' => Carbon::createFromFormat('H:i:s', $kadData->masa_tamat_majlis)->format('g:i A')
        ];

        $imageUrls = json_decode('["images/slide1.webp", "images/slide2.webp", "images/slide3.webp"]');

        return view('kad.base_template', compact('kadData', 'dateTime', 'font', 'imageUrls', 'design'));
    }
}
