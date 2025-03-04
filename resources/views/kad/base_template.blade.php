<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-1MLQMPS6W2"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-1MLQMPS6W2');
        </script>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @if ($kadData->dua_pasangan_is_on)
        <title>{{ $kadData->nama_panggilan_pasangan_pertama}} | {{ $kadData->nama_panggilan_pasangan_kedua}}</title>
        @else
        <title>{{ $kadData->nama_panggilan_lelaki}} &#10084; {{ $kadData->nama_panggilan_perempuan}}</title>
        @endif

        <!-- Open Graph Meta Tags -->
        <meta property="og:title" content="{{ $kadData->tajuk_kad }}">
        <meta property="og:description" content="Anda dijemput hadir ke majlis {{ $kadData->nama_panggilan_lelaki }} dan {{ $kadData->nama_panggilan_perempuan }} pada {{ $dateTime['tarikh_majlis'] }} di {{ $kadData->alamat_majlis }}.">
        <meta property="og:image" content="{{ asset($design->thumbnail) }}">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:type" content="website">
        <meta property="og:locale" content="en_US"> <!-- Change this to your language -->

        <!-- Twitter Card Meta Tags -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $kadData->tajuk_kad }}">
        <meta name="twitter:description" content="Anda dijemput hadir ke {{ $kadData->nama_panggilan_lelaki }} & {{ $kadData->nama_panggilan_perempuan }} pada {{ $dateTime['tarikh_majlis'] }} di {{ $kadData->alamat_majlis }}.">
        <meta name="twitter:image" content="{{ asset($design->thumbnail) }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Sofadi+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300..700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Noticia+Text:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap" rel="stylesheet">

        <link href="{{ $font->font_url }}" rel="stylesheet">

        <!-- CSS Animation -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Styles -->
        @vite(['resources/css/app.css','resources/js/app.js'])
        <style>

            /* Zoom-In Animation */
            @keyframes zoom-in {
                0% {
                    opacity: 0; /* Start invisible */
                    transform: scale(0.5); /* Start smaller */
                }
                100% {
                    opacity: 1; /* Fully visible */
                    transform: scale(1); /* Full size */
                }
            }

            /* Animation Classes */
            .animate-zoom-in {
                animation: zoom-in 0.8s ease-out forwards; /* Default zoom-in */
            }

            .animate-zoom-in-delay-1 {
                animation: zoom-in 1.2s ease-out forwards; /* Delayed zoom-in */
            }

            .animate-zoom-in-delay-2 {
                animation: zoom-in 1.6s ease-out forwards; /* Delayed zoom-in */
            }

            .animate-zoom-in-delay-3 {
                animation: zoom-in 2.0s ease-out forwards; /* Delayed zoom-in */
            }

            .animate-zoom-in-delay-4 {
                animation: zoom-in 2.4s ease-out forwards; /* Delayed zoom-in */
            }

            /* Watermark Styles */
            .watermark {
                position: fixed; /* Use fixed instead of absolute */
                top: 0;
                left: 0;
                width: 100vw; /* Full width */
                height: 100vh; /* Full height */
                background: transparent; /* Transparent background */
                display: flex;
                justify-content: center;
                align-items: center;
                z-index: 9999; /* High z-index to sit on top */
                pointer-events: none; /* Allow interaction with underlying content */
            }

            .watermark-text {
                font-size: 5rem;
                color: rgba(255, 0, 0, 0.3); /* Light red */
                text-transform: uppercase;
                transform: rotate(-45deg);
                user-select: none; /* Disable text selection */
            }

            /* Audio Player Animation */
            /* Animation for the first bar */
            @keyframes bar1 {
            0% { height: 4px; }
            25% { height: 9px; }
            50% { height: 6px; }
            75% { height: 10px; }
            100% { height: 4px; }
            }

            /* Animation for the second bar */
            @keyframes bar2 {
            0% { height: 2px; }
            20% { height: 6px; }
            40% { height: 9px; }
            60% { height: 7px; }
            80% { height: 12px; }
            100% { height: 2px; }
            }

            /* Animation for the third bar */
            @keyframes bar3 {
            0% { height: 5px; }
            15% { height: 7px; }
            35% { height: 5px; }
            55% { height: 11px; }
            75% { height: 8px; }
            100% { height: 5px; }
            }

            /* Apply animation to bars when playing */
            .animate-bar1 {
            animation: bar1 1s infinite ease-in-out;
            }
        
            .animate-bar2 {
            animation: bar2 1s infinite ease-in-out;
            }
        
            .animate-bar3 {
            animation: bar3 1s infinite ease-in-out;
            }

             /* Ensure the slider and slides are square */
            .main-slider {
                width: 100%; /* Adjust width as needed */
                max-width: 400px; /* The square size, you can adjust this */
                aspect-ratio: 1 / 1; /* Ensures it's a square */
            }

            .main-slider .slide {
                position: relative;
                width: 100%;
                height: 100%;
                overflow: hidden;
            }

            /* Ensure images fit within the square and are cropped as needed */
            .slide-image {
                width: 100%;
                height: 100%;
                object-fit: cover; /* Crops the image to fill the square container */
                border-radius: 1rem;
            }
           
        </style>

        <!-- Variable -->
        @php
            $colorCode = $design->color_code;
            $colorFooter = $design->color_footer;
            $primaryTextColor = $design->primary_text_color;
            $secondaryTextColor = $design->secondary_text_color;
            $bgSongUrl = '';
            $bgSongName = '';

            if ($kadData->bg_song_option === 2)
            {
                $bgSongUrl = $kadData->uploaded_song_url;
                $bgSongName = $kadData->uploaded_song_name;
            }
            else {
                $bgSongUrl = $bgSong->song_url;
                $bgSongName = $bgSong->song_name;
            }

        @endphp
        
    </head>

    <body x-data="{ form_ucapan: false, form_rsvp: false, location_modal: false, reminder_modal: false, contact_modal: false, gift_modal: false}">


        @if(!$kadData->is_paid && in_array($kadData->package_id, [2, 3]))
            <div class="watermark">
                <div class="watermark-text">UNPAID</div>
            </div>
        @endif

        <!-- Notification Panel -->
        @if(session('success'))
            <!-- Global notification live region -->
            <div 
                x-data="{ show: true }" 
                x-init="setTimeout(() => show = false, 5000)" 
                x-show="show" 
                x-transition:enter="transform ease-out duration-300 transition"
                x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
                x-transition:leave="transition ease-in duration-100"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                aria-live="assertive" 
                class="pointer-events-none fixed inset-0 flex items-start px-4 py-6 sm:items-start sm:p-6"
            >
                <div class="flex w-full flex-col items-center space-y-4">
                    <div class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
                        <div class="p-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="ml-3 w-0 flex-1 pt-0.5">
                                    <p class="text-sm font-medium text-gray-900">{{ session('success') }}</p>
                                    <p class="mt-1 text-sm text-gray-500">{{ session('message_detail') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!-- End of Notification Panel -->


        <div x-data="{ showModal: @if(!session('success')) true @else false @endif }"
             class="h-full w-full bg-cover bg-center lg:w-[400px] sm:bg-contain sm:mx-auto sm:max-w-lg sm:rounded-lg sm:shadow-xl" style="background-image: url('{{ asset($design->design_url_2) }}'); background-attachment: fixed; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);">


            <canvas class="fixed opacity-30" style="pointer-events: none"></canvas>
            <!-- Kad Section -->
            <div class="h-screen w-full bg-cover bg-center" style="background-image: url('{{ asset($design->design_url_1) }}');">
                <div class="absolute inset-0 bg-white bg-opacity-20">
                    <div x-show="showModal == false || {{ $kadData->package_id }} == '1'" class="flex flex-col justify-center gap-16 items-center h-full">
                        <h1 class="px-14 text-2xl text-center text-gray-600 animate-zoom-in" style="font-family: 'Noticia Text', cursive; color: {{ $primaryTextColor }};">{{ $kadData->tajuk_kad }}</h1>
                        @if ($kadData->dua_pasangan_is_on == true)
                            <div class="text-center">
                                <p class="text-5xl text-gray-600 mb-0 leading-tight animate-zoom-in-delay-1" style="font-family: '{{ $font->font_name }}', cursive; color: {{ $primaryTextColor }};">{{ $kadData->nama_panggilan_pasangan_pertama }}</p>
                                <p class="text-2xl text-gray-600 mb-0 leading-tight animate-zoom-in-delay-2" style="font-family: '{{ $font->font_name }}', cursive; color: {{ $primaryTextColor }};">{{ $kadData->is_english ? 'With' : 'Bersama' }}</p>
                                <p class="text-5xl text-gray-600 mb-0 leading-tight animate-zoom-in-delay-3" style="font-family: '{{ $font->font_name }}', cursive; color: {{ $primaryTextColor }};">{{ $kadData->nama_panggilan_pasangan_kedua }}</p>
                            </div>
                        @elseif ($kadData->penjemput == 2)
                            <div class="text-center">
                                <p class="text-7xl text-gray-600 mb-0 leading-tight animate-zoom-in-delay-1" style="font-family: '{{ $font->font_name }}', cursive; color: {{ $primaryTextColor }};">{{ $kadData->nama_panggilan_perempuan }}</p>
                                <p class="text-5xl text-gray-600 mb-0 leading-tight animate-zoom-in-delay-2" style="font-family: '{{ $font->font_name }}', cursive; color: {{ $primaryTextColor }};">&</p>
                                <p class="text-7xl text-gray-600 mb-0 leading-tight animate-zoom-in-delay-3" style="font-family: '{{ $font->font_name }}', cursive; color: {{ $primaryTextColor }};">{{ $kadData->nama_panggilan_lelaki }}</p>
                            </div>
                        @else
                            <div class="text-center">
                                <p class="text-7xl text-gray-600 mb-0 leading-tight animate-zoom-in-delay-1" style="font-family: '{{ $font->font_name }}', cursive; color: {{ $primaryTextColor }};">{{ $kadData->nama_panggilan_lelaki }}</p>
                                <p class="text-5xl text-gray-600 mb-0 leading-tight animate-zoom-in-delay-2" style="font-family: '{{ $font->font_name }}', cursive; color: {{ $primaryTextColor }};">&</p>
                                <p class="text-7xl text-gray-600 mb-0 leading-tight animate-zoom-in-delay-3" style="font-family: '{{ $font->font_name }}', cursive; color: {{ $primaryTextColor }};">{{ $kadData->nama_panggilan_perempuan }}</p>
                            </div>
                        @endif
                        <div class="text-center">
                            <p class="text-2xl text-gray-600 leading-tight animate-zoom-in-delay-4" style="font-family: 'Noticia Text', cursive; color: {{ $primaryTextColor }};">{{ $dateTime['hari_majlis'] }}</p>
                            <p class="text-2xl text-gray-600 leading-tight animate-zoom-in-delay-4" style="font-family: 'Noticia Text', cursive; color: {{ $primaryTextColor }};">{{ $dateTime['tarikh_majlis'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <!-- Details Section -->
            <div class="mb-8 pb-8">
                <div class="relative top-0 bg-white bg-opacity-40">
                    <!-- Custom Audio Player -->
                    @if ($kadData->package_id == 2 || $kadData->package_id == 3)
                        <div x-data="{ isPlaying: true, audio: null }" 
                            x-init="audio = $refs.audioElement" class="flex items-center justify-center mb-4">

                            <!-- Play/Pause Button -->
                            @if ($kadData->bg_song_id != 1)
                            <button @click="isPlaying ? audio.pause() : audio.play(); isPlaying = !isPlaying" 
                                class="bg-gray-50 opacity-70 fixed top-2 z-50 flex items-center  space-x-2 py-0 px-2 rounded-full transition-colors duration-300 ease-in-out shadow-md">
                                
                                <!-- Music Bars Icon (Animate when playing) -->
                                <svg class="w-6 h-6 text-gray-500" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <!-- First Bar -->
                                    <rect x="4" y="8" width="2" height="2" :class="isPlaying ? 'animate-bar1' : ''" class="transition-all duration-300 ease-in-out" style="transform-origin: bottom;"></rect>
                                    <!-- Second Bar -->
                                    <rect x="10" y="8" width="2" height="2" :class="isPlaying ? 'animate-bar2' : ''" class="transition-all duration-300 ease-in-out" style="transform-origin: bottom;"></rect>
                                    <!-- Third Bar -->
                                    <rect x="16" y="8" width="2" height="2" :class="isPlaying ? 'animate-bar3' : ''" class="transition-all duration-300 ease-in-out" style="transform-origin: bottom;"></rect>
                                </svg>

                                <p class="text-xs font-sans font-semibold">{{ $bgSongName }}</p>
                            </button>
                            @endif


                            <!-- Hidden Audio Element -->

                            <audio x-ref="audioElement" loop>
                                <source src="{{ asset($bgSongUrl) }}" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>

                            <!-- Modal for User Interaction to Play Audio -->
                            <div class="flex justify-center items-center">
                                <div x-show="showModal" x-cloak
                                    x-transition:leave="transition ease-out duration-[1500ms] transform"
                                    x-transition:leave-start="translate-y-0"
                                    x-transition:leave-end="-translate-y-full"
                                    class="fixed inset-0 z-[9999] flex items-center justify-center bg-opacity-75 bg-cover lg:w-[400px] lg:mx-auto lg:my-auto lg:flex lg:items-center lg:justify-center">
                                    <!-- Modal Content -->
                                    <div class="h-full w-full relative">
                                        <!-- Blurred Background Image -->
                                        <div 
                                            class="absolute inset-0 bg-cover bg-center blur-sm" 
                                            style="background-image: url('{{ asset($design->design_url_1) }}');">
                                        </div>

                                        <!-- Content Overlay -->
                                        <div class="relative z-10 flex flex-col gap-6 items-center justify-center h-full">
                                            @if ($kadData->dua_pasangan_is_on == true)
                                                <div class="text-center">
                                                    <p class="text-5xl text-gray-600 mb-0 leading-tight" data-aos="fade-up" data-aos-duration="1000" style="font-family: '{{ $font->font_name }}', cursive; color: {{ $primaryTextColor }};">{{ $kadData->nama_panggilan_pasangan_pertama }}</p>
                                                    <p class="text-2xl text-gray-600 mb-0 leading-tight" data-aos="fade-up" data-aos-duration="1000" style="font-family: '{{ $font->font_name }}', cursive; color: {{ $primaryTextColor }};">{{ $kadData->is_english ? 'With' : 'Bersama' }}</p>
                                                    <p class="text-5xl text-gray-600 mb-0 leading-tight" data-aos="fade-up" data-aos-duration="1000" style="font-family: '{{ $font->font_name }}', cursive; color: {{ $primaryTextColor }};">{{ $kadData->nama_panggilan_pasangan_kedua }}</p>
                                                </div>
                                            @elseif ($kadData->penjemput == 2)
                                                <div class="text-center">
                                                    <p class="text-7xl text-gray-600 mb-0 leading-tight" data-aos="fade-up" data-aos-duration="1000" style="font-family: '{{ $font->font_name }}', cursive; color: {{ $primaryTextColor }};">{{ $kadData->nama_panggilan_perempuan }}</p>
                                                    <p class="text-5xl text-gray-600 mb-0 leading-tight" data-aos="fade-up" data-aos-duration="1000" style="font-family: '{{ $font->font_name }}', cursive; color: {{ $primaryTextColor }};">&</p>
                                                    <p class="text-7xl text-gray-600 mb-0 leading-tight" data-aos="fade-up" data-aos-duration="1000" style="font-family: '{{ $font->font_name }}', cursive; color: {{ $primaryTextColor }};">{{ $kadData->nama_panggilan_lelaki }}</p>
                                                </div>
                                            @else
                                                <div class="text-center">
                                                    <p class="text-7xl text-gray-600 mb-0 leading-tight" data-aos="fade-up" data-aos-duration="1000" style="font-family: '{{ $font->font_name }}', cursive; color: {{ $primaryTextColor }};">{{ $kadData->nama_panggilan_lelaki }}</p>
                                                    <p class="text-5xl text-gray-600 mb-0 leading-tight" data-aos="fade-up" data-aos-duration="1000" style="font-family: '{{ $font->font_name }}', cursive; color: {{ $primaryTextColor }};">&</p>
                                                    <p class="text-7xl text-gray-600 mb-0 leading-tight" data-aos="fade-up" data-aos-duration="1000" style="font-family: '{{ $font->font_name }}', cursive; color: {{ $primaryTextColor }};">{{ $kadData->nama_panggilan_perempuan }}</p>
                                                </div>
                                            @endif
                                            <button
                                                id="autoScroll"
                                                @click="audio.play(); showModal = false" 
                                                class="bg-blue-500 text-white py-2 px-4 rounded-lg shadow animate-pulse hover:bg-blue-600 transition">
                                                {{ $kadData->is_english ? 'Open' : 'Buka' }} 
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endif
                    <!-- End of Custom Audio Player-->

                    <div class="mb-28 flex flex-col justify-center gap-2 items-center h-full">
                        @if ($kadData->greeting_image == 0)
                            <img data-aos="fade-up" data-aos-duration="1000" data-aos-duration="1000" class="w-[70%] px-3 py-4 mt-6" src="/images/greeting-1.webp" alt="">
                        @elseif ($kadData->greeting_image == 1)
                            <img data-aos="fade-up" data-aos-duration="1000" data-aos-duration="1000" class="w-[70%] px-3 py-4 mt-6" src="/images/greeting-2.webp" alt="">
                        @elseif ($kadData->greeting_image == 2)
                            <img data-aos="fade-up" data-aos-duration="1000" data-aos-duration="1000" class="w-[70%] px-3 py-4 mt-6" src="/images/greeting-3.webp" alt="">
                        @elseif ($kadData->greeting_image == 3)
                            <img data-aos="fade-up" data-aos-duration="1000" data-aos-duration="1000" class="w-[70%] px-3 py-4 mt-6" src="/images/greeting-4.webp" alt="">
                        @endif

                        <div data-aos="fade-up" data-aos-duration="1000" class="text-center">
                            <p class="text-sm text-center px-4 font-serif" style="font-family: 'EB Garamond'; color: {{ $colorCode }}">@empty($kadData->greeting_text) ASSALAMUALAIKUM W.B.T @else {{ $kadData->greeting_text }} @endempty</p>
                        </div>


                        <!-- Penjemput Pihak Lelaki -->
                        @if ($kadData->penjemput == 1)
                            <div data-aos="fade-up" data-aos-duration="1000" class="text-center">
                                <p class="text-lg text-center text-gray-600 font-serif" style="font-family: 'EB Garamond'">{{ $kadData->nama_bapa_pengantin_lelaki }}</p>
                                <p class="text-lg text-center text-gray-600 font-serif" style="font-family: 'EB Garamond'">&</p>
                                <p class="text-lg text-center text-gray-600 font-serif" style="font-family: 'EB Garamond'">{{ $kadData->nama_ibu_pengantin_lelaki }}</p>
                            </div>
                        @elseif ($kadData->penjemput == 2)
                            <!-- Penjemput Pihak Perempuan -->
                            <div data-aos="fade-up" data-aos-duration="1000" class="text-center">
                                <p class="text-lg text-center text-gray-600 font-serif" style="font-family: 'EB Garamond'">{{ $kadData->nama_bapa_pengantin_perempuan }}</p>
                                <p class="text-lg text-center text-gray-600 font-serif" style="font-family: 'EB Garamond'">&</p>
                                <p class="text-lg text-center text-gray-600 font-serif" style="font-family: 'EB Garamond'">{{ $kadData->nama_ibu_pengantin_perempuan }}</p>
                            </div>
                        @elseif ($kadData->penjemput == 3)
                            <!-- Penjemput Dua Pihak -->
                            <div data-aos="fade-up" data-aos-duration="1000" class="text-center">
                                <p class="text-lg text-center text-gray-600 font-serif" style="font-family: 'EB Garamond'">{{ $kadData->nama_bapa_pengantin_lelaki }}</p>
                                <p class="text-lg text-center text-gray-600 font-serif" style="font-family: 'EB Garamond'">&</p>
                                <p class="text-lg text-center text-gray-600 font-serif" style="font-family: 'EB Garamond'">{{ $kadData->nama_ibu_pengantin_lelaki }}</p>
                            </div>
                            <div data-aos="fade-up" data-aos-duration="1000" class="w-[70%] py-0 my-0 border-t" style="border-color: {{ $colorCode }}"></div>
                            <div data-aos="fade-up" data-aos-duration="1000" class="text-center">
                                <p class="text-lg text-center text-gray-600 font-serif" style="font-family: 'EB Garamond'">{{ $kadData->nama_bapa_pengantin_perempuan }}</p>
                                <p class="text-lg text-center text-gray-600 font-serif" style="font-family: 'EB Garamond'">&</p>
                                <p class="text-lg text-center text-gray-600 font-serif" style="font-family: 'EB Garamond'">{{ $kadData->nama_ibu_pengantin_perempuan }}</p>
                            </div>
                        @elseif ($kadData->penjemput == 4 && $kadData->dua_pasangan_is_on == true)
                            <!-- Dua Pasangan -->
                            <div data-aos="fade-up" data-aos-duration="1000" class="text-center">
                                <p class="text-lg text-center text-gray-600 font-serif" style="font-family: 'EB Garamond'">{{ $kadData->nama_bapa_pengantin }}</p>
                                <p class="text-lg text-center text-gray-600 font-serif" style="font-family: 'EB Garamond'">&</p>
                                <p class="text-lg text-center text-gray-600 font-serif" style="font-family: 'EB Garamond'">{{ $kadData->nama_ibu_pengantin }}</p>
                            </div>
                        @endif

                        <div data-aos="fade-up" data-aos-duration="1000" class="text-center">
                            <p class="text-sm text-center px-6 font-serif" style="font-family: 'EB Garamond'; color: {{ $colorCode }}">{{ $kadData->ayat_jemputan }}</p>
                        </div>

                        <!-- Separator -->
                        <div class="py-2"></div>

                        @if ($kadData->penjemput == 1 || $kadData->penjemput == 3)
                            <!-- Penjemput Pihak Lelaki -->
                            <div data-aos="fade-up" data-aos-duration="1000" class="text-center px-4">
                                <p class="text-2xl font-bold text-gray-600 mb-0 leading-tight" style="font-family: 'Dancing Script', cursive; margin-bottom: 0;">{{ $kadData->nama_penuh_lelaki }}</p>
                                <p class="text-lg font-bold text-gray-600 mb-0 leading-tight" style="font-family: 'Dancing Script', cursive; margin-bottom: 0;">&</p>
                                <p class="text-2xl font-bold text-gray-600 mb-0 leading-tight" style="font-family: 'Dancing Script', cursive; margin-bottom: 0;">{{ $kadData->nama_penuh_perempuan }}</p>
                            </div>
                        @elseif ($kadData->penjemput == 2)
                            <!-- Penjemput Pihak Perempuan -->
                            <div data-aos="fade-up" data-aos-duration="1000" class="text-center px-4">
                                <p class="text-2xl font-bold text-gray-600 mb-0 leading-tight" style="font-family: 'Dancing Script', cursive; margin-bottom: 0;">{{ $kadData->nama_penuh_perempuan }}</p>
                                <p class="text-lg font-bold text-gray-600 mb-0 leading-tight" style="font-family: 'Dancing Script', cursive; margin-bottom: 0;">&</p>
                                <p class="text-2xl font-bold text-gray-600 mb-0 leading-tight" style="font-family: 'Dancing Script', cursive; margin-bottom: 0;">{{ $kadData->nama_penuh_lelaki }}</p>
                            </div>
                        @elseif ($kadData->penjemput == 4 && $kadData->dua_pasangan_is_on == true)
                            <!-- Penjemput Dua Pihak -->
                            <div data-aos="fade-up" data-aos-duration="1000" class="text-center">
                                <p class="text-2xl font-bold text-gray-600 mb-0 leading-tight" style="font-family: 'Dancing Script', cursive; margin-bottom: 0;">{{ $kadData->nama_penuh_pasangan_pertama }}</p>
                            </div>
                            <div data-aos="fade-up" data-aos-duration="1000" class="w-[70%] py-0 my-0 border-t" style="border-color: {{ $colorCode }}"></div>
                            <div data-aos="fade-up" data-aos-duration="1000" class="text-center">
                                <p class="text-2xl font-bold text-gray-600 mb-0 leading-tight" style="font-family: 'Dancing Script', cursive; margin-bottom: 0;">{{ $kadData->nama_penuh_pasangan_kedua }}</p>
                            </div>
                        @endif

                        <div class="mt-5 flex flex-col justify-center gap-6">
                            <div data-aos="fade-up" data-aos-duration="1000">
                                <div class="flex justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="{{ $colorCode }}" class="size-12">
                                    <path d="M12.75 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM7.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM8.25 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM9.75 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM10.5 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM12.75 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM14.25 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 13.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" />
                                    <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z" clip-rule="evenodd" />
                                </svg>
                                </div>
                                <p class="text-base font-semibold text-center text-gray-600"  style="font-family: 'EB Garamond'; text-transform: uppercase;">{{ $dateTime['hari_tarikh_majlis'] }}</p>
                            </div>
                            <div data-aos="fade-up" data-aos-duration="1000"v>
                                <div class="flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="{{ $colorCode }}" class="size-12">
                                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 0 0 0-1.5h-3.75V6Z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <p class="text-base font-semibold text-center text-gray-600" style="font-family: 'EB Garamond'; text-transform: uppercase;">{{ $dateTime['masa_mula_majlis'] }} ~ {{ $dateTime['masa_tamat_majlis'] }}</p>
                            </div>

                            <div data-aos="fade-up" data-aos-duration="1000">
                                <div class="flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="{{ $colorCode }}" class="size-12">
                                        <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <p class="text-base font-semibold text-center text-gray-600 px-14" style="font-family: 'EB Garamond'; text-transform: uppercase;">{!! nl2br(e($kadData->alamat_majlis)) !!}</p>
                            </div>

                            @if ($kadData->package_id == 2 || $kadData->package_id ==3)
                                <div class="mt-2" data-aos="fade-up" data-aos-duration="1000"v>
                                    <!-- Aturcara Majlis List -->
                                    <ul class="space-y-2">
                                        @php
                                            $firstEntry = collect($kadData->aturcara_majlis)->first();
                                        @endphp
                                        @if(!empty($firstEntry['masa_acara']) || !empty($firstEntry['acara']))
                                        <!-- Centered Icon -->
                                        <div class="flex justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="{{ $colorCode }}" class="size-12">
                                                <path fill-rule="evenodd" d="M2.625 6.75a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875 0A.75.75 0 0 1 8.25 6h12a.75.75 0 0 1 0 1.5h-12a.75.75 0 0 1-.75-.75ZM2.625 12a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0ZM7.5 12a.75.75 0 0 1 .75-.75h12a.75.75 0 0 1 0 1.5h-12A.75.75 0 0 1 7.5 12Zm-4.875 5.25a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875 0a.75.75 0 0 1 .75-.75h12a.75.75 0 0 1 0 1.5h-12a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        @endif
                                        @foreach($kadData->aturcara_majlis as $entry)
                                            <!-- Check if both 'masa_acara' and 'acara' are not null or empty -->
                                            @if(!empty($entry['masa_acara']) || !empty($entry['acara']))
                                                <li class="grid grid-cols-3 gap-8 items-center px-6">
                                                    <!-- Show 'masa_acara' if not empty -->
                                                    @if(!empty($entry['masa_acara']))
                                                        <p class="col-span-1 text-base font-semibold text-end text-gray-600" style="font-family: 'EB Garamond'">{{ \Carbon\Carbon::parse($entry['masa_acara'])->format('g:i A') }}</p>
                                                    @endif
                                                    <!-- Show 'acara' if not empty -->
                                                    @if(!empty($entry['acara']))
                                                        <p class="col-span-2 text-base italic text-start text-gray-600" style="font-family: 'EB Garamond'">{{ $entry['acara'] }}</p>
                                                    @endif
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (!empty($kadData->info_tambahan))
                            <div data-aos="fade-up" data-aos-duration="1000" class="m-7 py-4 border rounded-lg border-gray-400">
                                <p class="mb-2 text-sm  underline text-center text-gray-600 font-serif px-14">Info Tambahan</p>
                                <p class="text-xs text-center text-gray-600 font-serif px-14">{!! nl2br(e($kadData->info_tambahan)) !!}</p>
                            </div>
                            @endif
                            
                        </div>
                    </div>

            @if ($kadData->package_id == 2 || $kadData->package_id == 3)
            <div>
                <img class="w-full px-3 h-18 mt-3 pb-6" src="/images/Curly-Border-Top.png" alt=""> 
            </div>
            <!-- Fetures Section -->

            <div">
                <div class="flex flex-col justify-center gap-5 items-center h-full px-6 pb-0 mb-0">


                    <!-- Countdown Timer -->
                    <div class="items-center w-full h-auto mb-6 rounded-xl p-4" style="background-color: {{ $colorCode }};">
                        <p class="text-2xl text-white text-center mb-2" style="font-family: 'EB Garamond'">{{ $kadData->is_english ? 'Counting Days' : 'Menanti Hari' }}</p>

                        <!-- Countdown Container -->
                        <div id="countdown" class="text-center flex justify-center gap-4">
                            <div class="flex flex-col items-center">
                                <span id="days" class="text-4xl font-semibold text-white" style="font-family: 'EB Garamond'"></span>
                                <span class="text-sm text-white" style="font-family: 'EB Garamond'">{{ $kadData->is_english ? 'Day' : 'Hari' }}</span>
                            </div>
                            <div class="flex flex-col items-center">
                                <span id="hours" class="text-4xl font-semibold text-white" style="font-family: 'EB Garamond'"></span>
                                <span class="text-sm text-white" style="font-family: 'EB Garamond'">{{ $kadData->is_english ? 'Hour' : 'Jam' }}</span>
                            </div>
                            <div class="flex flex-col items-center">
                                <span id="minutes" class="text-4xl font-semibold text-white" style="font-family: 'EB Garamond'"></span>
                                <span class="text-sm text-white" style="font-family: 'EB Garamond'">{{ $kadData->is_english ? 'Min' : 'Minit' }}</span>
                            </div>
                            <div class="flex flex-col items-center">
                                <span id="seconds" class="text-4xl font-semibold text-white" style="font-family: 'EB Garamond'"></span>
                                <span class="text-sm text-white" style="font-family: 'EB Garamond'">{{ $kadData->is_english ? 'Sec' : 'Saat' }}</span>
                            </div>
                        </div>

                        <script>
                            // Set the target date and time
                            const targetDate = new Date("{{ \Carbon\Carbon::parse($kadData->tarikh_majlis)->format('Y-m-d') }} {{ $kadData->masa_mula_majlis }}").getTime();

                            // Update the countdown every second
                            const countdown = setInterval(() => {
                                // Get the current date and time
                                const now = new Date().getTime();

                                // Calculate the remaining time
                                const distance = targetDate - now;

                                // Time calculations for days, hours, minutes, and seconds
                                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                // Update the countdown display
                                document.getElementById("days").innerHTML = days;
                                document.getElementById("hours").innerHTML = hours;
                                document.getElementById("minutes").innerHTML = minutes;
                                document.getElementById("seconds").innerHTML = seconds;

                                // If the countdown is over, stop the timer and show a message
                                if (distance < 0) {
                                    clearInterval(countdown);
                                    document.getElementById("countdown").innerHTML = 
                                    `<span class="text-2xl font-bold text-white">Majlis Sudah Berlangsung</span>`;
                                }
                            }, 1000);
                        </script>
                    </div>
                    
                   <!-- Slider -->
                        @if ($kadData->slideshow_is_on == 1)
                        <div class="main-slider size-80 w-full max-h-[400px] mx-auto overflow-hidden rounded-xl">
                            @foreach($imageUrls as $url)
                                @if (!empty($url))  <!-- Check if $url is not null or empty -->
                                    <div class="slide">
                                        <img src="{{ asset($url) }}" alt="Slide Image" class="slide-image">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        @endif
                    <!-- End of Slider -->

                    <!-- Doa Pengantin -->
                        <div class="items-center w-full h-auto mb-6 rounded-xl p-4">
                            @if ($kadData->is_english)
                                <p class="mb-5 text-center text-2xl underline" style="font-family: 'EB Garamond'">WEDDING PRAYERS</p>
                            @else
                                <p class="mb-5 text-center text-2xl underline" style="font-family: 'EB Garamond'">DOA PENGANTIN</p>
                            @endif
                            <p class="text-center text-lg" style="font-family: 'EB Garamond'">{{ $kadData->doa_pengantin }}</p>
                        </div>

                    <!-- Guestbook -->
                        @if ($kadData->guestbook_is_on == 1)
                        <div class="mt-7 w-full rounded-xl border-[1px] py-6 px-3 mb-16 bg-white bg-opacity-30" id="guestbook-wishes" style="border-color: {{ $colorCode }};">
                            <livewire:guestbook-wishes :kad_id="$kadData->id" />
                        </div>
                        @endif
                    <!-- End of Guestbook -->

                </div>
            <img class="w-full px-3 h-18 mb-16 pt-0 mt-0" src="/images/Curly-Border-Bottom.png" alt=""> 
            @endif

            <!-- Bottom Credit -->
            @if ($kadData->package_id == 1)
            <div class="pb-8 fixed bottom-0 w-full bg-white bg-opacity-70 z-10 items-center lg:w-[400px]">
                <ul class="mt-1 py-2 bg-white bg-opacity-80">
                    <li class="flex justify-center text-center">
                        <p class="text-gray-700 text-sm italic">Dapatkan Kad Digital percuma anda</p>
                    </li>
                    <li class="flex justify-center text-center h-8 w-auto">
                        <a href="{{ route('/') }}" wire:navigate>
                            <x-application-logo class="block !h-12 !w-auto fill-current text-gray-8000" />
                        </a>
                    </li>
                    <li class="flex justify-center pt-3">
                        <p class="text-sm text-gray-700 font-bold">Follow Us</p>
                    </li>
                    <li class="flex justify-center">
                        <div class="flex justify-center gap-2">
                            <a target="_blank" href="https://www.facebook.com/share/19VEyuUUNV/">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 48 48">
                                    <path fill="#3F51B5" d="M42,37c0,2.762-2.238,5-5,5H11c-2.761,0-5-2.238-5-5V11c0-2.762,2.239-5,5-5h26c2.762,0,5,2.238,5,5V37z"></path><path fill="#FFF" d="M34.368,25H31v13h-5V25h-3v-4h3v-2.41c0.002-3.508,1.459-5.59,5.592-5.59H35v4h-2.287C31.104,17,31,17.6,31,18.723V21h4L34.368,25z"></path>
                                </svg>
                            </a>
                            <a target="_blank" href="https://www.instagram.com/onlinekad_">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 48 48">
                                    <radialGradient id="yOrnnhliCrdS2gy~4tD8ma_Xy10Jcu1L2Su_gr1" cx="19.38" cy="42.035" r="44.899" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#fd5"></stop><stop offset=".328" stop-color="#ff543f"></stop><stop offset=".348" stop-color="#fc5245"></stop><stop offset=".504" stop-color="#e64771"></stop><stop offset=".643" stop-color="#d53e91"></stop><stop offset=".761" stop-color="#cc39a4"></stop><stop offset=".841" stop-color="#c837ab"></stop></radialGradient><path fill="url(#yOrnnhliCrdS2gy~4tD8ma_Xy10Jcu1L2Su_gr1)" d="M34.017,41.99l-20,0.019c-4.4,0.004-8.003-3.592-8.008-7.992l-0.019-20	c-0.004-4.4,3.592-8.003,7.992-8.008l20-0.019c4.4-0.004,8.003,3.592,8.008,7.992l0.019,20	C42.014,38.383,38.417,41.986,34.017,41.99z"></path><radialGradient id="yOrnnhliCrdS2gy~4tD8mb_Xy10Jcu1L2Su_gr2" cx="11.786" cy="5.54" r="29.813" gradientTransform="matrix(1 0 0 .6663 0 1.849)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#4168c9"></stop><stop offset=".999" stop-color="#4168c9" stop-opacity="0"></stop></radialGradient><path fill="url(#yOrnnhliCrdS2gy~4tD8mb_Xy10Jcu1L2Su_gr2)" d="M34.017,41.99l-20,0.019c-4.4,0.004-8.003-3.592-8.008-7.992l-0.019-20	c-0.004-4.4,3.592-8.003,7.992-8.008l20-0.019c4.4-0.004,8.003,3.592,8.008,7.992l0.019,20	C42.014,38.383,38.417,41.986,34.017,41.99z"></path><path fill="#fff" d="M24,31c-3.859,0-7-3.14-7-7s3.141-7,7-7s7,3.14,7,7S27.859,31,24,31z M24,19c-2.757,0-5,2.243-5,5	s2.243,5,5,5s5-2.243,5-5S26.757,19,24,19z"></path><circle cx="31.5" cy="16.5" r="1.5" fill="#fff"></circle><path fill="#fff" d="M30,37H18c-3.859,0-7-3.14-7-7V18c0-3.86,3.141-7,7-7h12c3.859,0,7,3.14,7,7v12	C37,33.86,33.859,37,30,37z M18,13c-2.757,0-5,2.243-5,5v12c0,2.757,2.243,5,5,5h12c2.757,0,5-2.243,5-5V18c0-2.757-2.243-5-5-5H18z"></path>
                                </svg>
                            </a>
                        </div>
                    </li>
                </ul>    
            </div>
            @endif

            <!-- Footer Section -->
            @if ($kadData->package_id == 2 || $kadData->package_id == 3)
            <footer class="w-full mx-auto lg:w-[400px] flex justify-center items-center]">
                <div class="fixed bottom-0 z-50 w-full lg:w-[400px] mx-auto h-18 border-t" style="background-color: {{ $colorFooter }};">
                    <div class="flex justify-center items-center my-1 w-[97%] gap-2 max-w-lg mx-auto font-medium">
                        @if (($kadData->package_id == 2 || $kadData->package_id == 3) && $kadData->rsvp_is_on)
                            <button type="button" @click="form_rsvp = true" class="flex-1 flex-col items-center justify-center px-1 pb-1 rounded-md border border-white" style="background-color: {{ $colorCode }};">
                                <h1 class="text-lg text-white"><i class="fa-solid fa-list"></i></h1>
                                <span class="text-xs text-white">RSVP</span>
                            </button>
                        @endif
                        <button type="button" @click="reminder_modal = true" class="flex-1 flex-col items-center justify-center px-1 pb-1 rounded-md border border-white" style="background-color: {{ $colorCode }};">
                            <h1 class="text-lg text-white"><i class="fa-regular fa-calendar"></i></h1>
                            <span class="text-xs text-white">{{ $kadData->is_english ? 'REMINDER' : 'KALENDAR' }}</span>
                        </button>
                        @if ($kadData->package_id == 3 && $kadData->gift_is_on)
                                <h1 @click="gift_modal = true" class="text-4xl outline-white" style="color: {{ $colorCode }}; text-shadow: 1px 1px 0 #fff, -1px 1px 0 #fff, 1px -1px 0 #fff, -1px -1px 0 #fff;"><i class="fa-solid fa fa-gift"></i></h1>
                        @endif
                        @if ($kadData->package_id == 2 || $kadData->package_id == 3)
                            <button type="button" @click="contact_modal = true" class="flex-1 flex-col items-center justify-center px-1 pb-1 rounded-md border border-white" style="background-color: {{ $colorCode }};">
                                <h1 class="text-lg text-white"><i class="fa-solid fa-phone"></i></h1>
                                <span class="text-xs text-white">{{ $kadData->is_english ? 'CONTACTS' : 'TELEFON' }}</span>
                            </button>
                        @endif
                        @if ($kadData->package_id == 2 || $kadData->package_id == 3)
                            <button type="button" @click="location_modal = true" class="flex-1 flex-col items-center justify-center px-1 pb-1 rounded-md border border-white" style="background-color: {{ $colorCode }};">
                                <h1 class="text-lg text-white"><i class="fa-solid fa-location-dot"></i></h1>
                                <span class="text-xs text-white">{{ $kadData->is_english ? 'LOCATIONS' : 'LOKASI' }}</span>
                            </button>
                        @endif
                    </div>
                </div>
            </footer>
            @endif


        <!-- Form Rsvp -->
        <form action="{{ route('create-rsvp') }}" method="POST">
            @csrf
            <input type="hidden" name="kad_id" value="{{ $kadData->id }}">
            <div x-cloak x-show="form_rsvp"
                @click.away="form_rsvp = false" 
                x-transition:enter="ease-out duration-300" 
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
                x-transition:leave="ease-in duration-200" 
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                class="fixed inset-0 z-50 flex items-center justify-center p-4"
                aria-labelledby="modal-title" 
                role="dialog" 
                aria-modal="true">
                
                <!-- Background backdrop -->
                <div class="absolute inset-0 bg-gray-500 bg-opacity-75" @click="form_rsvp = false"></div>

                <!-- Modal Content -->
                <div class="relative z-10 w-full max-w-md p-6 pb-0 rounded-xl mx-auto" style="background-color: {{ $colorCode }};">
                    <h1 class="text-center font-bold text-xl text-[white] open-sans">RSVP</h1>
                    @if (!$kadData->dua_pasangan_is_on)
                        <h1 class="text-center pb-4 font-bold text-xl text-[white] open-sans">{{ $kadData['nama_panggilan_lelaki'] }} & {{ $kadData['nama_panggilan_perempuan'] }}</h1>
                    @endif
                    <!-- Form -->
                    <div x-data="{ kehadiran: 'Hadir' }" class="md:p-10 p-0 flex flex-col gap-4">
                        
                        <!-- Name Field -->
                        <div class="text-[white] flex flex-col gap-2">
                            <h3>{{ $kadData->is_english ? 'Name' : 'Nama' }} (Required)</h3>
                            <input required type="text" class="py-2 px-3 text-black focus:to-blue-600 rounded-[4px]" name="nama" id="nama">
                        </div>
                        
                        <!-- Phone Number Field -->
                        <div class="text-[white] flex flex-col gap-2">
                            <h3>{{ $kadData->is_english ? 'Phone' : 'Telefon' }} (Required)</h3>
                            <input required type="text" class="py-2 px-3 text-black focus:to-blue-600 rounded-[4px]" name="nombor_telefon" id="nombor_telefon">
                        </div>

                        <!-- Kehadiran Field -->
                        <div class="text-[white] flex flex-col gap-2">
                            <h3>{{ $kadData->is_english ? 'Attendance' : 'Kehadiran' }} (Required)</h3>
                            <select x-model="kehadiran" class="w-full text-black py-2 px-3 focus:to-blue-600 rounded-[4px]" name="kehadiran" id="kehadiran">
                                <option value="Hadir">{{ $kadData->is_english ? 'Yes' : 'Hadir' }}</option>
                                <option value="Tidak Hadir">{{ $kadData->is_english ? 'No' : 'Tidak Hadir' }}</option>
                            </select>
                        </div>

                        <!-- Jumlah Kehadiran Field (Shown only if "Hadir" is selected) -->
                        <div x-show="kehadiran === 'Hadir'" class="text-[white] flex flex-col gap-2">
                            <h3>{{ $kadData->is_english ? 'Number of Attendees' : 'Jumlah Kehadiran' }}</h3>
                            <input type="number" class="py-2 px-3 text-black focus:to-blue-600 rounded-[4px]" name="jumlah_kehadiran" id="jumlah_kehadiran">
                        </div>

                        <!-- Action Buttons -->
                        <div class="py-3">
                            <x-primary-button type="submit">Submit</x-primary-button>
                            <x-primary-button class="bg-red-500 hover:bg-red-300" @click="form_rsvp = false">{{ $kadData->is_english ? 'Close' : 'Tutup' }}</x-primary-button>
                        </div>

                        <!-- Credit Link -->
                        <div class="flex justify-center mb-2">
                            <a class="text-xs underline text-white" href="{{ Route('/') }}">Created by onlinekad.com</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- End Form Rsvp -->

        <!-- Gift Modal Popup -->
        <div x-data="{ text: 'Copy', accountNumber: '{{ $kadData->account_number }}'} " x-cloak x-show="gift_modal"
            @click.away="gift_modal = false, text = 'Copy'" 
            x-transition:enter="ease-out duration-300" 
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
            x-transition:leave="ease-in duration-200" 
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
            class="fixed inset-0 z-50 flex items-center justify-center p-4"
            aria-labelledby="modal-title" 
            role="dialog" 
            aria-modal="true">
            
            <!-- Background backdrop -->
            <div class="absolute inset-0 bg-gray-500 bg-opacity-75" @click="gift_modal = false, text = 'Copy'"></div>

            <!-- Modal Content -->
            <div class="relative z-10 w-full max-w-md pt-3 rounded-xl mx-auto bg-white">
                <div class="mt-5">
                    <div class="bg-white mx-8 mb-5 p-5 rounded-lg">
                        <!-- QR Code Image -->
                        <img src="{{ asset($kadData->qr_image)}}" class="h-auto w-full mb-4 rounded-lg border border-spacing-2 shadow-lg border-gray-200 object-cover aspect-square"/> 

                        <!-- Bank Name -->
                        <div class="grid grid-cols-1 items-center pb-8">
                            <label class="text-sm underline flex items-center justify-center font-semibold text-gray-900">{{ $kadData->is_english ? 'Bank Name' : 'Nama Bank'}}</label>
                            <label class="bg-gray-200 p-1 mt-1 text-xl flex items-center justify-center rounded-lg text-gray-700">{{ $kadData->bank_name }}</label>
                        </div>

                        <!-- Account Number -->
                        <div class="grid grid-cols-1 items-center pb-8">
                            <label class="text-sm underline flex items-center justify-center font-semibold text-gray-900">{{ $kadData->is_english ? 'Account Number' : 'Nombor Akaun'}}</label>
                            <label class="bg-gray-200 p-1 mt-1 text-xl flex items-center justify-center rounded-lg text-gray-700"><span x-text="accountNumber"></span></label>
                        </div>

                        <!-- Button -->
                        <div class="flex justify-center gap-3">
                            <x-primary-button class="h-8 w-24 flex justify-center items-center" @click="navigator.clipboard.writeText(accountNumber).then(() => text = 'Copied!' )"><span x-text="text"></span></x-primary-button>
                            <x-primary-button href="{{ $kadData->qr_image }}" download class="h-8 w-24 flex items-center">Download</x-primary-button>
                        </div>
                    </div>
                </div>
                <!-- Credit Link -->
                <div class="flex justify-center mb-2">
                    <a class="text-xs underline text-white" href="{{ Route('/') }}">Created by onlinekad.com</a>
                </div>
            </div>
        </div> 
        <!-- End of Gift Modal Popup -->

        <!-- Location Modal Popup -->
        <div x-cloak x-show="location_modal"
            @click.away="location_modal = false" 
            x-transition:enter="ease-out duration-300" 
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
            x-transition:leave="ease-in duration-200" 
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
            class="fixed inset-0 z-50 flex items-center justify-center p-4"
            aria-labelledby="modal-title" 
            role="dialog" 
            aria-modal="true">
            
            <!-- Background backdrop -->
            <div class="absolute inset-0 bg-gray-500 bg-opacity-75" @click="location_modal = false"></div>

            <!-- Modal Content -->
            <div class="relative z-10 w-full max-w-md pt-6 rounded-xl mx-auto" style="background-color: {{ $colorCode }};">
                <div class="flex justify-center space-x-20 py-10">
                    <!-- Google Maps Icon and Text -->
                    <div class="flex flex-col items-center">
                        <a href="{{ $kadData->google_url }}" target="_blank" class="transition-transform transform hover:scale-105">
                            <img src="{{ asset('images/icons/google-maps-64.png') }}" alt="Google Maps" class="h-16 w-16 rounded-lg border-2 border-white hover:border-gray-300 hover:bg-white p-2 shadow-md">
                        </a>
                        <p class="text-white mt-2">Google Maps</p>
                    </div>
            
                    <!-- Waze Icon and Text -->
                    <div class="flex flex-col items-center">
                        <a href="{{ $kadData->waze_url }}" target="_blank" class="transition-transform transform hover:scale-105">
                            <img src="{{ asset('images/icons/waze-100.png') }}" alt="Waze" class="h-16 w-16 rounded-lg border-2 border-white hover:border-gray-300 hover:bg-white p-2 shadow-md">
                        </a>
                        <p class="text-white mt-2">Waze</p>
                    </div>
                </div>
                <!-- Credit Link -->
                <div class="flex justify-center mb-2">
                    <a class="text-xs underline text-white" href="{{ Route('/') }}">Created by onlinekad.com</a>
                </div>
            </div>
        </div> 
        <!-- End of Location Modal Popup -->

        <!-- Reminder Modal Popup -->
        <div x-cloak x-show="reminder_modal"
            @click.away="reminder_modal = false" 
            x-transition:enter="ease-out duration-300" 
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
            x-transition:leave="ease-in duration-200" 
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
            class="fixed inset-0 z-50 flex items-center justify-center p-4"
            aria-labelledby="modal-title" 
            role="dialog" 
            aria-modal="true">
            
            <!-- Background backdrop -->
            <div class="absolute inset-0 bg-gray-500 bg-opacity-75" @click="reminder_modal = false"></div>

            <!-- Modal Content -->
            <div class="relative z-10 w-full max-w-md p-6 pb-0 rounded-xl mx-auto" style="background-color: {{ $colorCode }};">
                <div class="flex justify-center space-x-20 py-10">
                    <!-- Google Calendar Icon and Text -->
                    <div class="flex flex-col items-center">
                        <a href="{{ $kadData->google_calendar_url }}" target="_blank" class="transition-transform transform hover:scale-105">
                            <img src="{{ asset('images/icons/google-calendar-100.png') }}" alt="Google Calendar" class="h-16 w-16 rounded-lg border-2 border-white hover:border-gray-300 hover:bg-white p-2 shadow-md">
                        </a>
                        <p class="text-white mt-2 text-center">Google Calendar</p>
                    </div>
            
                    <!-- Apple Calendar Icon and Text -->
                    <div class="flex flex-col items-center">
                        <a href="{{ $kadData->apple_calendar_url }}" target="_blank" class="transition-transform transform hover:scale-105">
                            <img src="{{ asset('images/icons/apple-calendar-100.png') }}" alt="Apple Calendar" class="h-16 w-16 rounded-lg border-2 border-white hover:border-gray-300 hover:bg-white p-2 shadow-md">
                        </a>
                        <p class="text-white mt-2 text-center">Apple Calendar</p>
                    </div>
                </div>
                <!-- Credit Link -->
                <div class="flex justify-center mb-2">
                    <a class="text-xs underline text-white" href="{{ Route('/') }}">Created by onlinekad.com</a>
                </div>
            </div>
        </div> 
        <!-- End of Reminder Modal Popup -->

        <!-- Contacts Modal Popup -->
        <div x-cloak x-show="contact_modal"
            @click.away="contact_modal = false" 
            x-transition:enter="ease-out duration-300" 
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
            x-transition:leave="ease-in duration-200" 
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
            class="fixed inset-0 z-50 flex items-center justify-center p-4"
            aria-labelledby="modal-title" 
            role="dialog" 
            aria-modal="true">
            
            <!-- Background backdrop -->
            <div class="absolute inset-0 bg-gray-500 bg-opacity-75" @click="contact_modal = false"></div>

            <!-- Modal Content -->
            <div class="relative z-10 w-full max-w-md p-6 pb-0 rounded-xl mx-auto" style="background-color: {{ $colorCode }};">
                <div class="flex flex-col space-y-6 py-10">
                    @foreach($kadData->nombor_telefon as $entry)
                        @if(!empty($entry['nama']) && !empty($entry['nombor_telefon']))
                            <div class="flex justify-between items-center">
                                <!-- Text on the left -->
                                <div>
                                    <p class="text-white font-bold">{{ $entry['nama'] }}</p>
                                </div>
                                
                                <!-- Icons on the right -->
                                <div class="flex space-x-4">
                                    <a href="https://api.whatsapp.com/send?phone=6{{ $entry['nombor_telefon'] }}" target="_blank" class="transition-transform transform hover:scale-105">
                                        <img src="{{ asset('images/icons/whatsapp-100.png') }}" alt="Whatsapp" class="h-8 w-8 rounded-lg border-2 border-white hover:border-gray-300 hover:bg-white shadow-md">
                                    </a>
                                    <a href="tel:{{ $entry['nombor_telefon'] }}" target="_blank" class="transition-transform transform hover:scale-105">
                                        <img src="{{ asset('images/icons/call-100.png') }}" alt="Call" class="h-8 w-8 rounded-lg border-2 border-white hover:border-gray-300 hover:bg-white shadow-md">
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <!-- Credit Link -->
                <div class="flex justify-center mb-2">
                    <a class="text-xs underline text-white" href="{{ Route('/') }}">Created by onlinekad.com</a>
                </div>
            </div>
        </div> 
        <!-- End of Contacts Modal Popup -->


    @livewireScripts
    <script>
        const canvas = document.querySelector('canvas')
        canvas.height = window.innerHeight
        canvas.width = window.innerWidth
        const ctx = canvas.getContext('2d')

        const TOTAL = 35 
        const petalArray = []

        const petalImg = new Image()
        petalImg.src = 'https://image.ibb.co/kyUHab/rose.png'
        petalImg.addEventListener('load', () => {
        for (let i = 0; i < TOTAL; i++) {
            petalArray.push(new Petal())
        }
        render()
        })

        function render() {
        ctx.clearRect(0, 0, canvas.width, canvas.height)
        petalArray.forEach(petal => petal.animate())
        window.requestAnimationFrame(render)
        }

        window.addEventListener('resize', () => {
        canvas.width = window.innerWidth
        canvas.height = window.innerHeight
        })

        let mouseX = 0
        function touchHandler(e) {
        mouseX = (e.clientX || e.touches[0].clientX) / window.innerWidth
        }
        window.addEventListener('mousemove', touchHandler)
        window.addEventListener('touchmove', touchHandler)

        // Petal class with CSS shape (ellipse)
        class Petal {
            constructor() {
                this.x = Math.random() * canvas.width;
                this.y = (Math.random() * canvas.height * 2) - canvas.height;
                this.w = 25 + Math.random() * 15;
                this.h = 20 + Math.random() * 10;
                this.opacity = this.w / 40;
                this.color = '#9CB59D';
                this.flip = Math.random();

                this.xSpeed = 1.5 + Math.random() * 0.4;
                this.ySpeed = 1 + Math.random() * 0.2;
                this.flipSpeed = Math.random() * 0.03;
            }

            draw() {
                if (this.y > canvas.height || this.x > canvas.width) {
                this.x = -this.w;
                this.y = (Math.random() * canvas.height * 2) - canvas.height;
                this.xSpeed = 1.5 + Math.random() * 0.4;
                this.ySpeed = 1 + Math.random() * 0.2;
                this.flip = Math.random();
                }
                ctx.globalAlpha = this.opacity;

                // Drawing an ellipse (petal shape)
                ctx.beginPath();
                ctx.ellipse(this.x, this.y, this.w * 0.6, this.h * 0.8, this.flip, 0, 2 * Math.PI);
                ctx.fillStyle = this.color;
                ctx.fill();
                ctx.closePath();
            }

            animate() {
                this.x += this.xSpeed;
                this.y += this.ySpeed;
                this.flip += this.flipSpeed;
                this.draw();
            }
        }

    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        document.querySelector("#autoScroll").addEventListener("click", () => {
            const targetPosition = document.body.scrollHeight; // Scroll target
            const startPosition = window.scrollY; // Current position
            const duration = 200000; // Duration in milliseconds
            const startTime = performance.now();
            let isUserScrolling = false; // Detect manual scrolling
    
            // Function to detect user scrolling
            const onUserScroll = () => {
                isUserScrolling = true;
            };
    
            // Attach the scroll event listener
            window.addEventListener("wheel", onUserScroll, { passive: true }); // Detects mouse wheel movement
            window.addEventListener("touchmove", onUserScroll, { passive: true }); // Detects touch screen scrolling
    
            function smoothScroll(currentTime) {
                if (isUserScrolling) {
                    // User scrolled manually; stop animation
                    window.removeEventListener("wheel", onUserScroll);
                    window.removeEventListener("touchmove", onUserScroll);
                    return;
                }
    
                const elapsedTime = currentTime - startTime;
                const progress = Math.min(elapsedTime / duration, 1); // Progress between 0 and 1
                const ease = progress * (2 - progress); // Ease-out function
    
                // Perform smooth scrolling
                window.scrollTo(0, startPosition + (targetPosition - startPosition) * ease);
    
                if (progress < 1) {
                    requestAnimationFrame(smoothScroll);
                } else {
                    // Clean up listeners when animation completes
                    window.removeEventListener("wheel", onUserScroll);
                    window.removeEventListener("touchmove", onUserScroll);
                }
            }
    
            requestAnimationFrame(smoothScroll);
        });
    </script>
    
    
    
    </body>
</html>
