<?php

namespace App\Http\Controllers;

use App\Models\BgSong;
use Illuminate\Http\Request;
use App\Models\Kad;
use App\Models\Design;
use App\Models\Font;
use App\Models\Guestbook;
use App\Models\Package;
use App\Models\Rsvp;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KadController extends Controller
{
    public function index()
    {
        $currentUserId = Auth::id();

        $kads = Kad::where('user_id', $currentUserId)->with('design')->with('package')->get();

        return view('kad.senarai-kad', compact('kads'));
    }

    public function destroy($id)
    {
        $kad = Kad::findOrFail($id);
        $kad->delete();

        return back()->with('success', 'Kad deleted successfully');
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
            'nama-penuh-lelaki' => ['required'],
            'nama-panggilan-lelaki' => ['required', 'max:12'],
            'nama-penuh-perempuan' => ['required'],
            'nama-panggilan-perempuan' => ['required', 'max:12'],
            'penjemput' => ['required', 'numeric'],
            'nama-bapa-pengantin-lelaki' => ['required_if:penjemput,1,3'],
            'nama-ibu-pengantin-lelaki' => ['required_if:penjemput,1,3'],
            'nama-bapa-pengantin-perempuan' => ['required_if:penjemput,2,3'],
            'nama-ibu-pengantin-perempuan' => ['required_if:penjemput,2,3'],

            // Maklumat Majlis
            'tajuk-kad' => ['required', 'max:20'],
            'ayat-jemputan' => ['required'],
            'doa-pengantin' => ['required'],
            'tarikh-majlis' => ['required', 'date'],
            'masa-mula-majlis' => ['required'],
            'masa-tamat-majlis' => ['required'],
            'alamat-majlis' => ['required'],
            'google-url' => ['required'],
            'waze-url' => ['required'],
        ]);

        // Retrieve the specific Kad by its ID
        $kad = Kad::findOrFail($Id);

        //Generate Calendar Url
        $title = request('nama-panggilan-lelaki') . '&' . request('nama-panggilan-perempuan');
        $location = request('alamat-majlis');
        $start = request('tarikh-majlis') . 'T' . request('masa-mula-majlis');
        $end = request('tarikh-majlis') . 'T' . request('masa-tamat-majlis');
        $startFormatted = str_replace(['-', ':'], '', $start); 
        $endFormatted = str_replace(['-', ':'], '', $end);
        $reminderUrl = $this->generateReminderUrl($title, $title, $location, $startFormatted, $endFormatted, $kad->order_id);


        // Update the Kad with the validated data
        $kad->update([
            //Maklumat Kad
            'font_id' => $request->input('font'),
            'bg_song_id' => $request->input('bg-song-id'),
            'rsvp_is_on' =>$request->input('rsvp-is-on'),
            'guestbook_is_on' =>$request->input('guestbook-is-on'),
            'slideshow_is_on' =>$request->input('slideshow-is-on'),

            // Maklumat Pengantin
            'nama_penuh_lelaki' => $request->input('nama-penuh-lelaki'),
            'nama_panggilan_lelaki' => $request->input('nama-panggilan-lelaki'),
            'nama_penuh_perempuan' => $request->input('nama-penuh-perempuan'),
            'nama_panggilan_perempuan' => $request->input('nama-panggilan-perempuan'),
            'penjemput' => $request->input('penjemput'),
            'nama_bapa_pengantin_lelaki' => $request->input('nama-bapa-pengantin-lelaki'),
            'nama_ibu_pengantin_lelaki' => $request->input('nama-ibu-pengantin-lelaki'),
            'nama_bapa_pengantin_perempuan' => $request->input('nama-bapa-pengantin-perempuan'),
            'nama_ibu_pengantin_perempuan' => $request->input('nama-ibu-pengantin-perempuan'),

            // Maklumat Majlis
            'tajuk_kad' => $request->input('tajuk-kad'),
            'ayat_jemputan' => $request->input('ayat-jemputan'),
            'doa_pengantin' => $request->input('doa-pengantin'),
            'tarikh_majlis' => $request->input('tarikh-majlis'),
            'masa_mula_majlis' => $request->input('masa-mula-majlis'),
            'masa_tamat_majlis' => $request->input('masa-tamat-majlis'),
            'alamat_majlis' => $request->input('alamat-majlis'),
            'google_url' => $request->input('google-url'),
            'waze_url' => $request->input('waze-url'),
            'google_calendar_url' => $reminderUrl['googleCalendarLink'],
            'apple_calendar_url' => $reminderUrl['icalendarFilePath'],

            // JSON fields
            'nombor_telefon' =>[
                [
                    'nama' => $request->input('nama-1'),
                    'nombor_telefon' => $request->input('nombor-telefon-1')
                ],
                [
                    'nama' => $request->input('nama-2'),
                    'nombor_telefon' => $request->input('nombor-telefon-2')
                ],
                [
                    'nama' => $request->input('nama-3'),
                    'nombor_telefon' => $request->input('nombor-telefon-3')
                ],
                [
                    'nama' => $request->input('nama-4'),
                    'nombor_telefon' => $request->input('nombor-telefon-4')
                ],
                [
                    'nama' => $request->input('nama-5'),
                    'nombor_telefon' => $request->input('nombor-telefon-5')
                ]
            ],

            'aturcara_majlis' =>[
                [
                    'masa_acara' => $request->input('masa-acara-1'),
                    'acara' => $request->input('acara-1')
                ],
                [
                    'masa_acara' => $request->input('masa-acara-2'),
                    'acara' => $request->input('acara-2')
                ],
                [
                    'masa_acara' => $request->input('masa-acara-3'),
                    'acara' => $request->input('acara-3')
                ],
                [
                    'masa_acara' => $request->input('masa-acara-4'),
                    'acara' => $request->input('acara-4')
                ],
                [
                    'masa_acara' => $request->input('masa-acara-5'),
                    'acara' => $request->input('acara-5')
                ],
                [
                    'masa_acara' => $request->input('masa-acara-6'),
                    'acara' => $request->input('acara-6')
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
            'nama-penuh-lelaki' => ['required'],
            'nama-panggilan-lelaki' => ['required', 'max:12'],
            'nama-penuh-perempuan' => ['required'],
            'nama-panggilan-perempuan' => ['required', 'max:12'],
            'penjemput' => ['required', 'numeric'],
            'nama-bapa-pengantin-lelaki' => ['required_if:penjemput,1,3'],
            'nama-ibu-pengantin-lelaki' => ['required_if:penjemput,1,3'],
            'nama-bapa-pengantin-perempuan' => ['required_if:penjemput,2,3'],
            'nama-ibu-pengantin-perempuan' => ['required_if:penjemput,2,3'],

            // Maklumat Majlis
            'tajuk-kad' => ['required', 'max:20'],
            'ayat-jemputan' => ['required'],
            'doa-pengantin' => ['required'],
            'tarikh-majlis' => ['required', 'date'],
            'masa-mula-majlis' => ['required', 'date_format:H:i'],
            'masa-tamat-majlis' => ['required', 'date_format:H:i'],
            'alamat-majlis' => ['required'],
            'google-url' => ['required'],
            'waze-url' => ['required'],
        ]);

        //Generate orderId
        $orderId = 'SY' . rand(100000, 999999) . strtoupper(Str::random(5));

        //Generate Calendar Url
        $title = request('nama-panggilan-lelaki') . '&' . request('nama-panggilan-perempuan');
        $location = request('alamat_majlis');
        $start = request('tarikh-majlis') . 'T' . request('masa-mula-majlis');
        $end = request('tarikh-majlis') . 'T' . request('masa-tamat-majlis');
        $startFormatted = str_replace(['-', ':'], '', $start);
        $endFormatted = str_replace(['-', ':'], '', $end);  
        $reminderUrl = $this->generateReminderUrl($title, $title, $location, $startFormatted, $endFormatted, $orderId);

        if(request('package-id') == 1)
        {
            $isPaid = true;
        }
        else
        {
            $isPaid = false;
        }

        // Create a new Kad entry
        Kad::create([
            // Maklumat Kad
            'slug' => Str::slug(request('nama-panggilan-lelaki')) . '-' . Str::slug(request('nama-panggilan-perempuan')) . '-' . Str::random(5),
            'order_id' => $orderId,
            'user_id' => Auth::id(),
            'design_id' => request('design-id'), 
            'font_id' => request('font'),
            'package_id' => request('package-id'),
            'bg_song_id' => request('bg-song-id'),
            'rsvp_is_on' =>request('rsvp-is-on'),
            'guestbook_is_on' =>request('guestbook-is-on'),
            'slideshow_is_on' =>request('slideshow-is-on'),
            'is_paid' => $isPaid,

            // Maklumat Pengantin
            'nama_penuh_lelaki' => request('nama-penuh-lelaki'),
            'nama_panggilan_lelaki' => request('nama-panggilan-lelaki'),
            'nama_penuh_perempuan' => request('nama-penuh-perempuan'),
            'nama_panggilan_perempuan' => request('nama-panggilan-perempuan'),
            'penjemput' => request('penjemput'),
            'nama_bapa_pengantin_lelaki' => request('nama-bapa-pengantin-lelaki'),
            'nama_ibu_pengantin_lelaki' => request('nama-ibu-pengantin-lelaki'),
            'nama_bapa_pengantin_perempuan' => request('nama-bapa-pengantin-perempuan'),
            'nama_ibu_pengantin_perempuan' => request('nama-ibu-pengantin-perempuan'),

            // Maklumat Majlis
            'tajuk_kad' => request('tajuk-kad'),
            'ayat_jemputan' => request('ayat-jemputan'),
            'doa_pengantin' => request('doa-pengantin'),
            'tarikh_majlis' => request('tarikh-majlis'),
            'masa_mula_majlis' => request('masa-mula-majlis'),
            'masa_tamat_majlis' => request('masa-tamat-majlis'),
            'alamat_majlis' => request('alamat-majlis'),
            'google_url' => request('google-url'),
            'waze_url' => request('waze-url'),
            'google_calendar_url' => $reminderUrl['googleCalendarLink'],
            'apple_calendar_url' => $reminderUrl['icalendarFilePath'],

            // Maklumat Nombor Telefon (JSON)
            'nombor_telefon' => [
                [
                    'nama' => request('nama-1') ?: null,
                    'nombor_telefon' => request('nombor-telefon-1') ?: null
                ],
                [
                    'nama' => request('nama-2') ?: null,
                    'nombor_telefon' => request('nombor-telefon-2') ?: null
                ],
                [
                    'nama' => request('nama-3') ?: null,
                    'nombor_telefon' => request('nombor-telefon-3') ?: null
                ],
                [
                    'nama' => request('nama-4') ?: null,
                    'nombor_telefon' => request('nombor-telefon-4') ?: null
                ],
                [
                    'nama' => request('nama-5') ?: null,
                    'nombor_telefon' => request('nombor-telefon-5') ?: null
                ]
            ],

            // Maklumat Aturcara Majlis (JSON)
            'aturcara_majlis' => [
                [
                    'masa_acara' => request('masa-acara-1') ?: null,
                    'acara' => request('acara-1') ?: null
                ],
                [
                    'masa_acara' => request('masa-acara-2') ?: null,
                    'acara' => request('acara-2') ?: null
                ],
                [
                    'masa_acara' => request('masa-acara-3') ?: null,
                    'acara' => request('acara-3') ?: null
                ],
                [
                    'masa_acara' => request('masa-acara-4') ?: null,
                    'acara' => request('acara-4') ?: null
                ],
                [
                    'masa_acara' => request('masa-acara-5') ?: null,
                    'acara' => request('acara-5') ?: null
                ],
                [
                    'masa_acara' => request('masa-acara-6') ?: null,
                    'acara' => request('acara-6') ?: null
                ]
            ],
        ]);

        return redirect('/senarai-kad');
    }


    public function generateReminderUrl($title, $description, $location, $start, $end, $orderId)
    {
        $eventTitle = urlencode($title);
        $eventDescription = urlencode($description);
        $eventLocation = urlencode($location);
        $startDateTime = urlencode($start); // Use 'Y-m-d\TH:i:s' format
        $endDateTime = urlencode($end);

        $googleCalendarLink = "https://www.google.com/calendar/render?action=TEMPLATE&text={$eventTitle}&dates={$startDateTime}/{$endDateTime}&details={$eventDescription}&location={$eventLocation}&sf=true&output=xml";

        $icalContent = "BEGIN:VCALENDAR
        VERSION:2.0
        PRODID:-//Your Company//Your Product//EN
        BEGIN:VEVENT
        UID:" . uniqid() . "
        DTSTAMP:" . gmdate('Ymd\THis\Z') . "
        DTSTART:{$startDateTime}
        DTEND:{$endDateTime}
        SUMMARY:{$eventTitle}
        DESCRIPTION:{$eventDescription}
        LOCATION:{$eventLocation}
        END:VEVENT
        END:VCALENDAR";

        // Define a unique file name
        $fileName = $orderId . '.ics';

        // Use the 'public' disk, which corresponds to 'storage/app/public'
        $directory = 'icalendar';

        // Check if the directory exists, if not, create it
        if (!Storage::disk('public')->exists($directory)) {
            Storage::disk('public')->makeDirectory($directory);
        }

        // Save the iCalendar content to the file in the 'public' disk
        Storage::disk('public')->put("{$directory}/{$fileName}", $icalContent);

        // Return Google Calendar link and the public URL to the iCalendar file
        return [
            'googleCalendarLink' => $googleCalendarLink,
            'icalendarFilePath' => Storage::url("{$directory}/{$fileName}")
        ];
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

    public function showFormTempah($id)
    {
        $design = Design::findOrFail($id);
        $packages = Package::all();

        // Assign individual packages to variables
        $package1 = $packages[0] ?? null;  // Example for Package 1
        $package2 = $packages[1] ?? null;  // Example for Package 2
        $package3 = $packages[2] ?? null;  // Example for Package 3

        return view('form-tempah', compact('design', 'package1', 'package2', 'package3'));
    }

}