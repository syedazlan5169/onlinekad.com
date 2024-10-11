<?php

namespace App\Http\Controllers;

use App\Models\BgSong;
use Illuminate\Http\Request;
use App\Models\Kad;
use App\Models\Design;
use App\Models\Font;
use App\Models\Guestbook;
use App\Models\Rsvp;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class KadController extends Controller
{
    public function index()
    {
        $currentUserId = Auth::id();

        $kads = Kad::where('user_id', $currentUserId)->with('design')->with('package')->get();

        return view('kad.senarai-kad', compact('kads'));
    }

    public function showEdit($id)
    {
        $currentUserId = Auth::id();
        $kadData = Kad::where('user_id', $currentUserId)->where('id', $id)->with('design')->first();
        if (!$kadData) {
            return redirect()->back()->withErrors('Kad not found or you do not have permission to view it.');
        }

        return view('kad.kad-edit', compact('kadData'));
    }


    public function patch(Request $request, $Id)
    {
        // Validate the request data
        $request->validate([
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
            'masa_mula_majlis' => ['required'],
            'masa_tamat_majlis' => ['required'],
            'alamat_majlis' => ['required'],
            'google_url' => ['required'],
            'waze_url' => ['required'],
        ]);

        // Retrieve the specific Kad by its ID
        $kad = Kad::findOrFail($Id);

        // Update the Kad with the validated data
        $kad->update([
            //Maklumat Kad
            'font_id' => $request->input('font'),

            // Maklumat Pengantin
            'nama_penuh_lelaki' => $request->input('nama_penuh_lelaki'),
            'nama_panggilan_lelaki' => $request->input('nama_panggilan_lelaki'),
            'nama_penuh_perempuan' => $request->input('nama_penuh_perempuan'),
            'nama_panggilan_perempuan' => $request->input('nama_panggilan_perempuan'),
            'penjemput' => $request->input('penjemput'),
            'nama_bapa_pengantin_lelaki' => $request->input('nama_bapa_pengantin_lelaki'),
            'nama_ibu_pengantin_lelaki' => $request->input('nama_ibu_pengantin_lelaki'),
            'nama_bapa_pengantin_perempuan' => $request->input('nama_bapa_pengantin_perempuan'),
            'nama_ibu_pengantin_perempuan' => $request->input('nama_ibu_pengantin_perempuan'),

            // Maklumat Majlis
            'tajuk_kad' => $request->input('tajuk_kad'),
            'ayat_jemputan' => $request->input('ayat_jemputan'),
            'doa_pengantin' => $request->input('doa_pengantin'),
            'tarikh_majlis' => $request->input('tarikh_majlis'),
            'masa_mula_majlis' => $request->input('masa_mula_majlis'),
            'masa_tamat_majlis' => $request->input('masa_tamat_majlis'),
            'alamat_majlis' => $request->input('alamat_majlis'),
            'google_url' => $request->input('google_url'),
            'waze_url' => $request->input('waze_url'),

            // JSON fields
            'nombor_telefon' =>[
                [
                    'nama' => $request->input('nama_1'),
                    'nombor_telefon' => $request->input('nombor_telefon_1')
                ],
                [
                    'nama' => $request->input('nama_2'),
                    'nombor_telefon' => $request->input('nombor_telefon_2')
                ],
                [
                    'nama' => $request->input('nama_3'),
                    'nombor_telefon' => $request->input('nombor_telefon_3')
                ],
                [
                    'nama' => $request->input('nama_4'),
                    'nombor_telefon' => $request->input('nombor_telefon_4')
                ],
                [
                    'nama' => $request->input('nama_5'),
                    'nombor_telefon' => $request->input('nombor_telefon_5')
                ]
            ],

            'aturcara_majlis' =>[
                [
                    'masa_acara' => $request->input('masa_acara_1'),
                    'acara' => $request->input('acara_1')
                ],
                [
                    'masa_acara' => $request->input('masa_acara_2'),
                    'acara' => $request->input('acara_2')
                ],
                [
                    'masa_acara' => $request->input('masa_acara_3'),
                    'acara' => $request->input('acara_3')
                ],
                [
                    'masa_acara' => $request->input('masa_acara_4'),
                    'acara' => $request->input('acara_4')
                ],
                [
                    'masa_acara' => $request->input('masa_acara_5'),
                    'acara' => $request->input('acara_5')
                ],
                [
                    'masa_acara' => $request->input('masa_acara_6'),
                    'acara' => $request->input('acara_6')
                ]
            ]
        ]);

        // Redirect with success message
        return redirect('/senarai-kad')->with('success', 'Kad updated successfully');
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

        // Create a new Kad entry
        Kad::create([
            // Maklumat Kad
            'slug' => Str::slug(request('nama_panggilan_lelaki')) . '-' . Str::slug(request('nama_panggilan_perempuan')) . '-' . Str::random(5),
            'order_id' => 'SY' . rand(100000, 999999) . strtoupper(Str::random(5)),
            'user_id' => Auth::id(),
            'design_id' => request('design_id'), 
            'font_id' => request('font'),
            'package_id' => 3 ,
            'is_paid' => false,

            // Maklumat Pengantin
            'nama_penuh_lelaki' => request('nama_penuh_lelaki'),
            'nama_panggilan_lelaki' => request('nama_panggilan_lelaki'),
            'nama_penuh_perempuan' => request('nama_penuh_perempuan'),
            'nama_panggilan_perempuan' => request('nama_panggilan_perempuan'),
            'penjemput' => request('penjemput'),
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

            // Maklumat Nombor Telefon (JSON)
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

            // Maklumat Aturcara Majlis (JSON)
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
        $bgSong = BgSong::findOrFail($kadData->bg_song_id);

        $dateTime = [
            'hari_tarikh_majlis' => $this->translateToMalay($kadData->tarikh_majlis, 3),
            'hari_majlis' => $this->translateToMalay($kadData->tarikh_majlis, 1),
            'tarikh_majlis' => $this->translateToMalay($kadData->tarikh_majlis, 2),
            'masa_mula_majlis' => Carbon::createFromFormat('H:i:s', $kadData->masa_mula_majlis)->format('g:i A'),
            'masa_tamat_majlis' => Carbon::createFromFormat('H:i:s', $kadData->masa_tamat_majlis)->format('g:i A')
        ];

        $imageUrls = json_decode('["images/slide1.webp", "images/slide2.webp", "images/slide3.webp"]');

        return view('kad.base_template', compact('kadData', 'dateTime', 'font', 'imageUrls', 'design', 'bgSong'));
    }

    public function showPreview($slug)
    {

        $kadData = Kad::findOrFail(1);
        $design = Design::where('design_code', $slug)->firstOrFail();
        $font = Font::findOrFail($kadData->font_id);
        $bgSong = BgSong::findOrFail($kadData->bg_song_id);

        Log::info('kadData:', ['kadData' => $kadData]);
        Log::info('design:', ['design' => $design]);
        Log::info('font:', ['font' => $font]);


        $dateTime = [
            'hari_tarikh_majlis' => $this->translateToMalay($kadData->tarikh_majlis, 3),
            'hari_majlis' => $this->translateToMalay($kadData->tarikh_majlis, 1),
            'tarikh_majlis' => $this->translateToMalay($kadData->tarikh_majlis, 2),
            'masa_mula_majlis' => Carbon::createFromFormat('H:i:s', $kadData->masa_mula_majlis)->format('g:i A'),
            'masa_tamat_majlis' => Carbon::createFromFormat('H:i:s', $kadData->masa_tamat_majlis)->format('g:i A')
        ];

        $imageUrls = json_decode('["images/slide1.webp", "images/slide2.webp", "images/slide3.webp"]');

        return view('kad.base_template', compact('kadData', 'dateTime', 'font', 'imageUrls', 'design', 'bgSong'));
    }

    public function showGuestbook($id)
    {
        // Retrieve the Kad by ID with related RSVP and Guestbook data
        $currentUserId = Auth::id();

        $kadData = Kad::where('user_id', $currentUserId)->where('id', $id)->first();
        if (!$kadData) {
            return redirect()->back()->withErrors('Kad not found or you do not have permission to view it.');
        }

        $totalWishes = Guestbook::where('kad_id', $kadData->id)->count();
        $wishes = Guestbook::where('kad_id', $kadData->id)->paginate(10);

        // Return the view with the data
        return view('kad.kad-guestbook', compact('kadData', 'wishes', 'totalWishes'));
    }

    public function showRsvp($id)
    {
        $currentUserId = Auth::id();

        $kadData = Kad::where('user_id', $currentUserId)->where('id', $id)->first();
        if (!$kadData) {
            return redirect()->back()->withErrors('Kad not found or you do not have permission to view it.');
        }


        $totalRsvp = Rsvp::where('kad_id', $kadData->id)->count();
        $totalHadir = Rsvp::where('kad_id', $kadData->id)->where('kehadiran', 'Hadir')->count();
        $totalTidakHadir = Rsvp::where('kad_id', $kadData->id)->where('kehadiran', 'Tidak Hadir')->count();
        $totalKehadiran = Rsvp::where('kad_id', $kadData->id)->where('kehadiran', 'Hadir')->sum('jumlah_kehadiran');

        return view('kad.kad-rsvp', compact('kadData', 'totalRsvp', 'totalHadir', 'totalTidakHadir', 'totalKehadiran'));
    }

}
