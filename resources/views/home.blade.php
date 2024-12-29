<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- SEO Meta Tags -->
        <meta name="description" content="Kad kahwin digital percuma. Jemputan Digital Yang Memukau, Cepat dan Mudah. Pelbagai fungsi yang menarik. Dapatkan sekarang!">
        <meta name="keywords" content="kad kahwin, kad kawin, digital wedding card, kad kahwin digital, kad kawin digital, kad jemputan digital, kad kahwin murah, kad jemputan kahwin, kahwinnow, kad digital kahwinnow, kahwinnow digital card, digital kad, digital invitation, jemputan, contoh kad kahwin, kad undangan digital, kad kahwin digital percuma">
        <meta name="author" content="OnlineKad">

        <!-- Open Graph Meta Tags -->
        <meta property="og:title" content="ONLINEKAD.COM">
        <meta property="og:description" content="Kad Undangan Digital">
        <meta property="og:image" content="{{ asset('/images/thumbnail-home-120x120.webp') }}">
        <meta property="og:url" content="www.onlinekad.com">
        <meta property="og:type" content="website">
        <meta property="og:locale" content="en_US"> <!-- Change this to your language -->

        <!-- Twitter Card Meta Tags -->
        <meta name="twitter:card" content="Kad Undangan Digital">
        <meta name="twitter:title" content="ONLINEKAD.COM">
        <meta name="twitter:description" content="Kad Undangan Digital">
        <meta name="twitter:image" content="{{ asset('/images/thumbnail-home-120x120.webp') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    @php
        $package1 = $packages->firstWhere('id', 1);           
        $package2 = $packages->firstWhere('id', 2);
        $package3 = $packages->firstWhere('id', 3);           
    @endphp

    <body class="antialiased font-sans">

    <div class="bg-white">
        <!-- Header -->
        <header class="sticky top-0 inset-x-0 z-50">
            <livewire:layout.navigation />
        </header>
    
        <main>
        <!-- Hero section -->
        <div class="relative isolate pt-14">
            <svg class="absolute inset-0 -z-10 h-full w-full stroke-gray-200 [mask-image:radial-gradient(100%_100%_at_top_right,white,transparent)]" aria-hidden="true">
            <defs>
                <pattern id="83fd4e5a-9d52-42fc-97b6-718e5d7ee527" width="200" height="200" x="50%" y="-1" patternUnits="userSpaceOnUse">
                <path d="M100 200V.5M.5 .5H200" fill="none" />
                </pattern>
            </defs>
            <svg x="50%" y="-1" class="overflow-visible fill-gray-50">
                <path d="M-100.5 0h201v201h-201Z M699.5 0h201v201h-201Z M499.5 400h201v201h-201Z M-300.5 600h201v201h-201Z" stroke-width="0" />
            </svg>
            <rect width="100%" height="100%" stroke-width="0" fill="url(#83fd4e5a-9d52-42fc-97b6-718e5d7ee527)" />
            </svg>
            <div class="mx-auto max-w-7xl px-6 py-8 sm:py-18 lg:flex lg:items-center lg:gap-x-10 lg:px-8 lg:py-18">
            <div class="mx-auto max-w-2xl lg:mx-0 lg:flex-auto">
                <h1 class="max-w-lg text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Jemputan Digital Yang Memukau, Mudah dan Cepat!</h1>
                <p class="mt-6 text-lg leading-8 text-gray-600">Cipta jemputan anda dengan reka bentuk unik, sesuaikan mengikut kehendak, dan kongsi terus kepada tetamu anda hanya dalam beberapa klik!</p>
                <div class="mt-10 flex items-center gap-x-6">
                <a href="{{ Route('katalog.show') }}" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Tempah Sekarang</a>
                <a href="{{ Route('katalog.show') }}" class="text-sm font-semibold leading-6 text-gray-900">Lihat Design Kami <span aria-hidden="true">→</span></a>
                </div>
            </div>
            <div class="mt-16 sm:mt-24 lg:mt-0 lg:flex-shrink-0 lg:flex-grow">
                <svg viewBox="0 0 366 729" role="img" class="mx-auto w-[22.875rem] max-w-full drop-shadow-xl">
                <title>App screenshot</title>
                <defs>
                    <clipPath id="2ade4387-9c63-4fc4-b754-10e687a0d332">
                    <rect width="316" height="684" rx="36" />
                    </clipPath>
                </defs>
                <path fill="#4B5563" d="M363.315 64.213C363.315 22.99 341.312 1 300.092 1H66.751C25.53 1 3.528 22.99 3.528 64.213v44.68l-.857.143A2 2 0 0 0 1 111.009v24.611a2 2 0 0 0 1.671 1.973l.95.158a2.26 2.26 0 0 1-.093.236v26.173c.212.1.398.296.541.643l-1.398.233A2 2 0 0 0 1 167.009v47.611a2 2 0 0 0 1.671 1.973l1.368.228c-.139.319-.314.533-.511.653v16.637c.221.104.414.313.56.689l-1.417.236A2 2 0 0 0 1 237.009v47.611a2 2 0 0 0 1.671 1.973l1.347.225c-.135.294-.302.493-.49.607v377.681c0 41.213 22 63.208 63.223 63.208h95.074c.947-.504 2.717-.843 4.745-.843l.141.001h.194l.086-.001 33.704.005c1.849.043 3.442.37 4.323.838h95.074c41.222 0 63.223-21.999 63.223-63.212v-394.63c-.259-.275-.48-.796-.63-1.47l-.011-.133 1.655-.276A2 2 0 0 0 366 266.62v-77.611a2 2 0 0 0-1.671-1.973l-1.712-.285c.148-.839.396-1.491.698-1.811V64.213Z" />
                <path fill="#343E4E" d="M16 59c0-23.748 19.252-43 43-43h246c23.748 0 43 19.252 43 43v615c0 23.196-18.804 42-42 42H58c-23.196 0-42-18.804-42-42V59Z" />
                <foreignObject width="316" height="684" transform="translate(24 24)" clip-path="url(#2ade4387-9c63-4fc4-b754-10e687a0d332)">
                    <img src="{{ asset('images/home-feature-image.webp') }}" alt="" />
                </foreignObject>
                </svg>
            </div>
        </div>
    
        <!-- Feature section -->
        <div class="mx-auto mt-32 max-w-7xl sm:mt-56 sm:px-6 lg:px-8">
            <div class="relative isolate overflow-hidden bg-gray-900 px-6 py-20 sm:rounded-3xl sm:px-10 sm:py-24 lg:py-24 xl:px-24">
                <div class="text-center pb-8">
                <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Semua yang Anda Perlukan untuk Jemputan Digital Sempurna</h2>
                <p class="mt-6 text-lg leading-8 text-gray-300">Ciri-ciri eksklusif kami direka untuk memastikan jemputan anda lebih mudah, lengkap, dan bermakna:</p>
                </div>
            <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-2 lg:items-center lg:border-t lg:border-white/10 lg:gap-y-0">
                <div class="lg:row-span-4 flex justify-center">
                    <video playinline autoplay muted loop controlslist="nodownload" class="h-[35rem] rounded-lg" src="/images/features.mp4"></video>
                </div>
                <div class="max-w-xl lg:row-start-3 lg:mt-10 lg:max-w-md lg:pt-10">
                <dl class="max-w-xl space-y-8 text-base leading-7 text-gray-300 lg:max-w-none">
                    <div class="relative">
                    <dt class="ml-9 inline-block font-semibold text-white">
                        <svg class="absolute left-1 top-1 h-6 w-6 text-indigo-500" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z" clip-rule="evenodd" />
                            <path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375ZM6 12a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V12Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM6 15a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V15Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM6 18a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V18Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                          </svg>
                        RSVP - 
                    </dt>
                    <dd class="inline">Jejaki kehadiran tetamu dengan sistem RSVP pintar.</dd>
                    </div>
                    <div class="relative">
                    <dt class="ml-9 inline-block font-semibold text-white">
                        <svg class="absolute left-1 top-1 h-6 w-6 text-indigo-500" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M2.625 6.75a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875 0A.75.75 0 0 1 8.25 6h12a.75.75 0 0 1 0 1.5h-12a.75.75 0 0 1-.75-.75ZM2.625 12a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0ZM7.5 12a.75.75 0 0 1 .75-.75h12a.75.75 0 0 1 0 1.5h-12A.75.75 0 0 1 7.5 12Zm-4.875 5.25a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875 0a.75.75 0 0 1 .75-.75h12a.75.75 0 0 1 0 1.5h-12a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                          </svg>
                        Aturcara Majlis - 
                    </dt>
                    <dd class="inline">Sertakan jadual acara untuk memudahkan tetamu merancang perjalanan.</dd>
                    </div>
                    <div class="relative">
                    <dt class="ml-9 inline-block font-semibold text-white">
                        <svg class="absolute left-1 top-1 h-6 w-6 text-indigo-500" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 0 0 0-1.5h-3.75V6Z" clip-rule="evenodd" />
                          </svg>
                        Countdown Timer - 
                    </dt>
                    <dd class="inline">Tambahkan elemen keterujaan dengan memaparkan penantian hari istimewa anda.</dd>
                    </div>
                    <div class="relative">
                    <dt class="ml-9 inline-block font-semibold text-white">
                        <svg class="absolute left-1 top-1 h-6 w-6 text-indigo-500" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
                          </svg>
                        Slideshow
                    </dt>
                    <dd class="inline">Kongsi gambar-gambar kenangan atau sneak peek majlis anda.</dd>
                    </div>
                    <div class="relative">
                    <dt class="ml-9 inline-block font-semibold text-white">
                        <svg class="absolute left-1 top-1 h-6 w-6 text-indigo-500" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M19.952 1.651a.75.75 0 0 1 .298.599V16.303a3 3 0 0 1-2.176 2.884l-1.32.377a2.553 2.553 0 1 1-1.403-4.909l2.311-.66a1.5 1.5 0 0 0 1.088-1.442V6.994l-9 2.572v9.737a3 3 0 0 1-2.176 2.884l-1.32.377a2.553 2.553 0 1 1-1.402-4.909l2.31-.66a1.5 1.5 0 0 0 1.088-1.442V5.25a.75.75 0 0 1 .544-.721l10.5-3a.75.75 0 0 1 .658.122Z" clip-rule="evenodd" />
                          </svg>
                        Muzik Latar
                    </dt>
                    <dd class="inline">Hidupkan suasana jemputan anda dengan muzik latar pilihan anda.</dd>
                    </div>
                    <div class="relative">
                    <dt class="ml-9 inline-block font-semibold text-white">
                        <svg class="absolute left-1 top-1 h-6 w-6 text-indigo-500" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M12.75 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM7.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM8.25 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM9.75 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM10.5 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM12.75 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM14.25 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 13.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" />
                            <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z" clip-rule="evenodd" />
                          </svg>
                        Kalendar 
                    </dt>
                    <dd class="inline">Tetamu boleh menyimpan tarikh majlis ke kalendar mereka dengan satu klik.</dd>
                    </div>
                    <div class="relative">
                    <dt class="ml-9 inline-block font-semibold text-white">
                        <svg class="absolute left-1 top-1 h-6 w-6 text-indigo-500" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z" clip-rule="evenodd" />
                          </svg>
                        Contact 
                    </dt>
                    <dd class="inline">Memudahkan tetamu untuk menghubungi pihak majlis dengan panggilan atau whatsapp.</dd>
                    </div>
                    <div class="relative">
                    <dt class="ml-9 inline-block font-semibold text-white">
                        <svg class="absolute left-1 top-1 h-6 w-6 text-indigo-500" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
                          </svg>
                        Lokasi 
                    </dt>
                    <dd class="inline">Penunjuk arah ke lokasi majlis menggunakan Google Maps atau Waze.</dd>
                    </div>
                </dl>
                </div>
            </div>
            <div class="pointer-events-none absolute left-12 top-1/2 -z-10 -translate-y-1/2 transform-gpu blur-3xl lg:bottom-[-12rem] lg:top-auto lg:translate-y-0 lg:transform-gpu" aria-hidden="true">
                <div class="aspect-[1155/678] w-[72.1875rem] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-25" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
            </div>
            </div>
        </div>

        <!-- Best Selling Section -->
        <div class="bg-white">
            <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                <div class="md:flex md:items-center md:justify-between">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">Trending Design</h2>
                <a href="/katalog" class="hidden text-sm font-medium text-indigo-600 hover:text-indigo-500 md:block">
                    Lihat Semua Design
                    <span aria-hidden="true"> &rarr;</span>
                </a>
                </div>

                <div class="mt-6 grid grid-cols-2 gap-x-4 gap-y-10 sm:gap-x-6 md:grid-cols-4 md:gap-y-0 lg:gap-x-8">
                    @foreach($products as $product)
                        <div class="group relative mb-8 bg-white shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105">
                            <!-- Product Image -->
                            <div class="h-56 w-full overflow-hidden bg-gray-100 lg:h-72 xl:h-80">
                                <img src="{{ asset($product->product_image_url) }}" alt="{{ $product->design_code }}"
                                    class="h-full w-full object-cover object-center group-hover:opacity-90 transition-opacity duration-300">
                            </div>

                            <!-- Product Title -->
                            <h3 class="my-4 text-center font-bold text-gray-800 text-xl transition-colors duration-300 group-hover:text-indigo-600">
                                {{ $product->design_code }}
                            </h3>

                            <!-- Call-to-Action Buttons -->
                            <div class="flex flex-col items-center space-y-2 pb-4 px-4">
                                <!-- Tempah Button -->
                                <x-primary-button href="{{ route('form-tempah.show', ['id' => $product->id]) }}" 
                                    class="w-full text-center py-2 bg-indigo-600 hover:bg-indigo-500 text-white rounded-lg shadow-md">
                                    Tempah
                                </x-primary-button>
                                
                                <!-- Live Preview Button -->
                                <x-primary-button href="preview/{{ $product->design_code }}" 
                                    class="w-full text-center py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg shadow-md mt-2 sm:mt-0">
                                    Live Preview
                                </x-primary-button>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="flex justify-end">
                    <a href="/katalog" class="hidden  text-sm font-medium text-indigo-600 hover:text-indigo-500 md:block">
                        Lihat Semua Design
                        <span aria-hidden="true"> &rarr;</span>
                    </a>
                </div>

                <div class="text-sm md:hidden">
                <a href="/katalog" class="font-medium text-indigo-600 hover:text-indigo-500">
                    Lihat Semua Design
                    <span aria-hidden="true"> &rarr;</span>
                </a>
                </div>
            </div>
        </div>

        <!-- Frequently Asked Questions -->
        <div class="mx-auto mt-12 max-w-7xl sm:mt-18 sm:px-6 lg:px-8">
            <div class="relative isolate overflow-hidden bg-gray-900 px-6 py-24 shadow-2xl sm:rounded-3xl sm:px-24 xl:py-32">
                <div class="mx-auto max-w-4xl divide-y divide-white/10">
                    <h2 class="text-4xl font-semibold tracking-tight text-white sm:text-5xl">Soalan Lazim</h2>
                    <dl class="mt-10 space-y-6 divide-y divide-white/10" x-data="{ activeIndex: null }">
                        <!-- FAQ 1 -->
                        <div class="pt-6">
                            <dt>
                                <button 
                                    type="button" 
                                    class="flex w-full items-start justify-between text-left text-white" 
                                    @click="activeIndex = activeIndex === 0 ? null : 0" 
                                    aria-expanded="activeIndex === 0"
                                >
                                    <span class="text-base/7 font-semibold">Apakah Kad Undangan Digital?</span>
                                    <span class="ml-6 flex h-7 items-center">
                                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" x-show="activeIndex !== 0">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                        </svg>
                                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" x-show="activeIndex === 0">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                        </svg>
                                    </span>
                                </button>
                            </dt>
                            <dd x-show="activeIndex === 0" x-collapse class="mt-2 pr-12">
                                <p class="text-base/7 text-gray-300">Kad undangan digital adalah kad jemputan yang mempunyai pelbagai fungsi untuk memudahkan pihak majlis dan juga tetamu yang dijemput. Pelanggan akan mendapat 1 link untuk dikongsi di media social sebagai jemputan kepada para tetamu majlis.</p>
                            </dd>
                        </div>

                        <!-- FAQ 2 -->
                        <div class="pt-6">
                            <dt>
                                <button 
                                    type="button" 
                                    class="flex w-full items-start justify-between text-left text-white" 
                                    @click="activeIndex = activeIndex === 1 ? null : 1" 
                                    aria-expanded="activeIndex === 1"
                                >
                                    <span class="text-base/7 font-semibold">Berapa lama tempoh validity kad digital ini?</span>
                                    <span class="ml-6 flex h-7 items-center">
                                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" x-show="activeIndex !== 1">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                        </svg>
                                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" x-show="activeIndex === 1">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                        </svg>
                                    </span>
                                </button>
                            </dt>
                            <dd x-show="activeIndex === 1" x-collapse class="mt-2 pr-12">
                                <p class="text-base/7 text-gray-300">Kad jemputan digital kami tidak mempunyai tempoh luput. Setelah pelangan membeli kad dari website kami, kad akan kekal untuk kegunaan pelanggan.</p>
                            </dd>
                        </div>

                        <!-- FAQ 3 -->
                        <div class="pt-6">
                            <dt>
                                <button 
                                    type="button" 
                                    class="flex w-full items-start justify-between text-left text-white" 
                                    @click="activeIndex = activeIndex === 2 ? null : 2" 
                                    aria-expanded="activeIndex === 2"
                                >
                                    <span class="text-base/7 font-semibold">Berapa lama tempoh proses untuk siapkan kad digital?</span>
                                    <span class="ml-6 flex h-7 items-center">
                                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" x-show="activeIndex !== 2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                        </svg>
                                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" x-show="activeIndex === 2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                        </svg>
                                    </span>
                                </button>
                            </dt>
                            <dd x-show="activeIndex === 2" x-collapse class="mt-2 pr-12">
                                <p class="text-base/7 text-gray-300">Instant!!. Setelah pelanggan memasukkan semua maklumat majlis dan simpan kad, satu pautan untuk kad digital yang lengkap akan dihasilkan dan sedia untuk diedarkan. Namun jika pelanggan memilih pakej berbayar, bayaran perlu dibuat terlebih dahulu untuk menghilangkan watermark pada kad.</p>
                            </dd>
                        </div>

                        <!-- FAQ 4 -->
                        <div class="pt-6">
                            <dt>
                                <button 
                                    type="button" 
                                    class="flex w-full items-start justify-between text-left text-white" 
                                    @click="activeIndex = activeIndex === 3 ? null : 3" 
                                    aria-expanded="activeIndex === 3"
                                >
                                    <span class="text-base/7 font-semibold">Bolehkah maklumat pada kad ditukar setelah kad siap?</span>
                                    <span class="ml-6 flex h-7 items-center">
                                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" x-show="activeIndex !== 3">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                        </svg>
                                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" x-show="activeIndex === 3">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                        </svg>
                                    </span>
                                </button>
                            </dt>
                            <dd x-show="activeIndex === 3" x-collapse class="mt-2 pr-12">
                                <p class="text-base/7 text-gray-300">Pengguna akan dilengakapi dengan satu dashboard. Di dashboard ini pengguna boleh memantau entri guestbook, entri RSVP dan fungsi untuk mengemaskini maklumat pada kad jemputan secara live.</p>
                            </dd>
                        </div>

                        <!-- FAQ 5 -->
                        <div class="pt-6">
                            <dt>
                                <button 
                                    type="button" 
                                    class="flex w-full items-start justify-between text-left text-white" 
                                    @click="activeIndex = activeIndex === 4 ? null : 4" 
                                    aria-expanded="activeIndex === 4"
                                >
                                    <span class="text-base/7 font-semibold">Adakah sistem RSVP disertakan?</span>
                                    <span class="ml-6 flex h-7 items-center">
                                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" x-show="activeIndex !== 4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                        </svg>
                                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" x-show="activeIndex === 4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                        </svg>
                                    </span>
                                </button>
                            </dt>
                            <dd x-show="activeIndex === 4" x-collapse class="mt-2 pr-12">
                                <p class="text-base/7 text-gray-300">Pakej Kirana & Juwita dilengkapi dengan sistem RSVP automatik untuk memantau kehadiran tetamu. Fungsi ini tidak disertakan pada pakej percuma "Ratna"</p>
                            </dd>
                        </div>

                        <!-- FAQ 6 -->
                        <div class="pt-6">
                            <dt>
                                <button 
                                    type="button" 
                                    class="flex w-full items-start justify-between text-left text-white" 
                                    @click="activeIndex = activeIndex === 5 ? null : 5" 
                                    aria-expanded="activeIndex === 5"
                                >
                                    <span class="text-base/7 font-semibold">Bolehkah ucapan dalam guestbook dipadam?</span>
                                    <span class="ml-6 flex h-7 items-center">
                                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" x-show="activeIndex !== 5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                        </svg>
                                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" x-show="activeIndex === 5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                        </svg>
                                    </span>
                                </button>
                            </dt>
                            <dd x-show="activeIndex === 5" x-collapse class="mt-2 pr-12">
                                <p class="text-base/7 text-gray-300">Semua entri guestbook boleh dipadam sekiranya terdapan ucapan yang kurang menyenangkan pihak majlis.</p>
                            </dd>
                        </div>

                        <!-- FAQ 7 -->
                        <div class="pt-6">
                            <dt>
                                <button 
                                    type="button" 
                                    class="flex w-full items-start justify-between text-left text-white" 
                                    @click="activeIndex = activeIndex === 6 ? null : 6" 
                                    aria-expanded="activeIndex === 6"
                                >
                                    <span class="text-base/7 font-semibold">Adakah kad digital ini percuma?</span>
                                    <span class="ml-6 flex h-7 items-center">
                                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" x-show="activeIndex !== 6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                        </svg>
                                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" x-show="activeIndex === 6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                        </svg>
                                    </span>
                                </button>
                            </dt>
                            <dd x-show="activeIndex === 6" x-collapse class="mt-2 pr-12">
                                <p class="text-base/7 text-gray-300">Kami menawarkan pakej kad digital percuma "Ratna". Pelanggan boleh membuat kad digital dan sedia diedarkan tanpa sebarang bayaran. Pelanggan juga boleh memilih pakej berbayar untuk menikmati fungsi-fungsi yang lebih menarik.</p>
                            </dd>
                        </div>

                    </dl>
                </div>
                <svg viewBox="0 0 1024 1024" class="absolute left-1/2 top-1/2 -z-10 h-[64rem] w-[64rem] -translate-x-1/2" aria-hidden="true">
                    <circle cx="512" cy="512" r="512" fill="url(#759c1415-0410-454c-8f7c-9a820de03641)" fill-opacity="0.7" />
                    <defs>
                        <radialGradient id="759c1415-0410-454c-8f7c-9a820de03641" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(512 512) rotate(90) scale(512)">
                            <stop stop-color="#7775D6" />
                            <stop offset="1" stop-color="#E935C1" stop-opacity="0" />
                        </radialGradient>
                    </defs>
                </svg>
            </div>
        </div>

    
        <!-- Pakej section -->
                <div class="bg-white py-16 sm:py-24">
                    <div class="mx-auto max-w-7xl px-6 lg:px-8">
                      <div class="mx-auto max-w-4xl text-center">
                        <p class="mt-2 text-balance text-5xl font-semibold tracking-tight text-gray-900 sm:text-6xl">Pakej Kad Kahwin Digital</p>
                      </div>
                      <p class="mx-auto mt-6 max-w-2xl text-pretty text-center text-lg font-medium text-gray-600 sm:text-xl/8">Kami menawarkan pakej kad kahwin digital PERCUMA!!!. Anda juga boleh memilih pakej berbayar kami yang mempunyai pelbagai fungsi tambahan dengan harga yang berpatutan</p>
                      <div class="isolate mx-auto mt-10 grid max-w-md grid-cols-1 gap-8 lg:mx-0 lg:max-w-none lg:grid-cols-3">

                        <div class="rounded-3xl p-8 ring-2 ring-pink-600 xl:p-10">
                          <div class="flex items-center justify-between gap-x-4">
                            <h3 id="tier-startup" class="text-4xl/8 font-semibold text-pink-600">{{ $package1->name }}</h3>
                          </div>
                          <p class="mt-4 text-sm/6 text-gray-600">{{ $package1->description }}</p>
                          <p class="mt-6 flex items-baseline gap-x-1">
                            <!-- Price, update based on frequency toggle state -->
                            <span class="text-4xl font-semibold tracking-tight text-gray-900">Rm {{ $package1->price }}</span>
                          </p>
                          <a href="/invitation/{{ $package1->name }}" aria-describedby="tier-startup" class="mt-6 block rounded-md bg-pink-600 px-3 py-2 text-center text-sm/6 font-semibold text-white shadow-sm hover:bg-pink-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-600">Preview</a>
                          <ul role="list" class="mt-8 space-y-3 text-sm/6 text-gray-600 xl:mt-10">
                            <li class="flex gap-x-3">
                              <svg class="h-6 w-5 flex-none text-pink-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                              </svg>
                              Jemputan digital Basic
                            </li>
                            <li class="flex gap-x-3">
                              <svg class="h-6 w-5 flex-none text-pink-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                              </svg>
                              Boleh terus diedarkan kepada tetamu
                            </li>
                          </ul>
                        </div>
                        <div class="rounded-3xl p-8 ring-2 ring-purple-600 xl:p-10">
                            <div class="flex items-center justify-between gap-x-4">
                              <h3 id="tier-startup" class="text-4xl/8 font-semibold text-purple-600">{{ $package2->name }}</h3>
                              <p class="rounded-full bg-indigo-600/10 px-2.5 py-1 text-xs/5 font-semibold text-gray-600">Most popular</p>
                            </div>
                            <p class="mt-4 text-sm/6 text-gray-600">{{ $package2->description }}</p>
                            <p class="mt-6 flex items-baseline gap-x-1">
                              <!-- Price, update based on frequency toggle state -->
                              <span class="text-4xl font-semibold tracking-tight text-gray-900">Rm {{ $package2->price }}</span>
                            </p>
                            <a href="/invitation/{{ $package2->name }}" aria-describedby="tier-startup" class="mt-6 block rounded-md bg-purple-600 px-3 py-2 text-center text-sm/6 font-semibold text-white shadow-sm hover:bg-purple-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-600">Preview</a>
                            <ul role="list" class="mt-8 space-y-3 text-sm/6 text-gray-600 xl:mt-10">
                              <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-purple-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                </svg>
                                Countdown Timer
                              </li>
                              <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-purple-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                </svg>
                                Google Calendar & Apple Calendar
                              </li>
                              <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-purple-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                </svg>
                                Doa Pengantin 
                              </li>
                              <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-purple-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                </svg>
                                Panggilan & Whatsapp
                              </li>
                              <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-purple-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                </svg>
                                Google Maps & Waze
                              </li>
                              <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-purple-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                </svg>
                                Aturcara Majlis
                              </li>
                              <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-purple-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                </svg>
                                Slideshow
                              </li>
                              <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-purple-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                </svg>
                                Guestbook
                              </li>
                              <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-purple-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                </svg>
                                Muzik Latar
                              </li>
                              <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-purple-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                </svg>
                                RSVP 
                              </li>
                            </ul>
                          </div>
                          <div class="rounded-3xl p-8 ring-2 ring-green-600 xl:p-10">
                            <div class="flex items-center justify-between gap-x-4">
                              <h3 id="tier-startup" class="text-4xl/8 font-semibold text-green-600">{{ $package3->name }}</h3>
                            </div>
                            <p class="mt-4 text-sm/6 text-gray-600">{{ $package3->description }}</p>
                            <p class="mt-6 flex items-baseline gap-x-1">
                              <!-- Price, update based on frequency toggle state -->
                              <span class="text-4xl font-semibold tracking-tight text-gray-900">Rm {{ $package3->price }}</span>
                            </p>
                            <a href="/invitation/{{ $package3->name }}" aria-describedby="tier-startup" class="mt-6 block rounded-md bg-green-600 px-3 py-2 text-center text-sm/6 font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Preview</a>
                            <ul role="list" class="mt-8 space-y-3 text-sm/6 text-gray-600 xl:mt-10">
                                <li class="flex gap-x-3">
                                    <svg class="h-6 w-5 flex-none text-green-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                      <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                    </svg>
                                    Countdown Timer
                                  </li>
                                  <li class="flex gap-x-3">
                                    <svg class="h-6 w-5 flex-none text-green-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                      <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                    </svg>
                                    Google Calendar & Apple Calendar
                                  </li>
                                  <li class="flex gap-x-3">
                                    <svg class="h-6 w-5 flex-none text-green-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                      <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                    </svg>
                                    Doa Pengantin 
                                  </li>
                                  <li class="flex gap-x-3">
                                    <svg class="h-6 w-5 flex-none text-green-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                      <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                    </svg>
                                    Panggilan & Whatsapp
                                  </li>
                                  <li class="flex gap-x-3">
                                    <svg class="h-6 w-5 flex-none text-green-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                      <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                    </svg>
                                    Google Maps & Waze
                                  </li>
                                  <li class="flex gap-x-3">
                                    <svg class="h-6 w-5 flex-none text-green-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                      <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                    </svg>
                                    Aturcara Majlis
                                  </li>
                                  <li class="flex gap-x-3">
                                    <svg class="h-6 w-5 flex-none text-green-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                      <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                    </svg>
                                    Slideshow
                                  </li>
                                  <li class="flex gap-x-3">
                                    <svg class="h-6 w-5 flex-none text-green-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                      <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                    </svg>
                                    Guestbook
                                  </li>
                                  <li class="flex gap-x-3">
                                    <svg class="h-6 w-5 flex-none text-green-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                      <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                    </svg>
                                    Muzik Latar
                                  </li>
                                  <li class="flex gap-x-3">
                                    <svg class="h-6 w-5 flex-none text-green-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                      <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                    </svg>
                                    RSVP 
                                  </li>
                                  <li class="flex gap-x-3">
                                    <svg class="h-6 w-5 flex-none text-green-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                      <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                    </svg>
                                    Option Dua Pasangan 
                                  </li>
                                  <li class="flex gap-x-3">
                                    <svg class="h-6 w-5 flex-none text-green-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                      <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                    </svg>
                                    Money Gift 
                                  </li>
                                  <li class="flex gap-x-3">
                                    <svg class="h-6 w-5 flex-none text-green-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                      <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                    </svg>
                                    Upload Muzik Latar Sendiri 
                                  </li>
                            </ul>
                          </div>

                      </div>
                    </div>
                  </div>
 

        <!-- Contact section -->
        <div class="mx-auto mt-20 max-w-7xl sm:px-6 lg:px-8">
            <div class="relative isolate overflow-hidden bg-gray-900 px-6 py-24 shadow-2xl sm:rounded-3xl sm:px-24 xl:py-32">
            <h2 class="mx-auto max-w-2xl text-center text-3xl font-bold tracking-tight text-white sm:text-4xl">Masih keliru?</h2>
            <p class="mx-auto mt-2 max-w-xl text-center text-lg leading-8 text-gray-300">Anda boleh mengemukakan sebarang soalan ke talian whatsapp kami.</p>
            <div class="mt-8 flex justify-center">
                <a href="https://api.whatsapp.com/send?phone=60108323516" class="flex items-center rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Hubungi Kami
                 <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 48 48" class="ml-2">
                    <path fill="#fff" d="M4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98c-0.001,0,0,0,0,0h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303z"></path><path fill="#fff" d="M4.868,43.803c-0.132,0-0.26-0.052-0.355-0.148c-0.125-0.127-0.174-0.312-0.127-0.483l2.639-9.636c-1.636-2.906-2.499-6.206-2.497-9.556C4.532,13.238,13.273,4.5,24.014,4.5c5.21,0.002,10.105,2.031,13.784,5.713c3.679,3.683,5.704,8.577,5.702,13.781c-0.004,10.741-8.746,19.48-19.486,19.48c-3.189-0.001-6.344-0.788-9.144-2.277l-9.875,2.589C4.953,43.798,4.911,43.803,4.868,43.803z"></path><path fill="#cfd8dc" d="M24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,4C24.014,4,24.014,4,24.014,4C12.998,4,4.032,12.962,4.027,23.979c-0.001,3.367,0.849,6.685,2.461,9.622l-2.585,9.439c-0.094,0.345,0.002,0.713,0.254,0.967c0.19,0.192,0.447,0.297,0.711,0.297c0.085,0,0.17-0.011,0.254-0.033l9.687-2.54c2.828,1.468,5.998,2.243,9.197,2.244c11.024,0,19.99-8.963,19.995-19.98c0.002-5.339-2.075-10.359-5.848-14.135C34.378,6.083,29.357,4.002,24.014,4L24.014,4z"></path><path fill="#40c351" d="M35.176,12.832c-2.98-2.982-6.941-4.625-11.157-4.626c-8.704,0-15.783,7.076-15.787,15.774c-0.001,2.981,0.833,5.883,2.413,8.396l0.376,0.597l-1.595,5.821l5.973-1.566l0.577,0.342c2.422,1.438,5.2,2.198,8.032,2.199h0.006c8.698,0,15.777-7.077,15.78-15.776C39.795,19.778,38.156,15.814,35.176,12.832z"></path><path fill="#fff" fill-rule="evenodd" d="M19.268,16.045c-0.355-0.79-0.729-0.806-1.068-0.82c-0.277-0.012-0.593-0.011-0.909-0.011c-0.316,0-0.83,0.119-1.265,0.594c-0.435,0.475-1.661,1.622-1.661,3.956c0,2.334,1.7,4.59,1.937,4.906c0.237,0.316,3.282,5.259,8.104,7.161c4.007,1.58,4.823,1.266,5.693,1.187c0.87-0.079,2.807-1.147,3.202-2.255c0.395-1.108,0.395-2.057,0.277-2.255c-0.119-0.198-0.435-0.316-0.909-0.554s-2.807-1.385-3.242-1.543c-0.435-0.158-0.751-0.237-1.068,0.238c-0.316,0.474-1.225,1.543-1.502,1.859c-0.277,0.317-0.554,0.357-1.028,0.119c-0.474-0.238-2.002-0.738-3.815-2.354c-1.41-1.257-2.362-2.81-2.639-3.285c-0.277-0.474-0.03-0.731,0.208-0.968c0.213-0.213,0.474-0.554,0.712-0.831c0.237-0.277,0.316-0.475,0.474-0.791c0.158-0.317,0.079-0.594-0.04-0.831C20.612,19.329,19.69,16.983,19.268,16.045z" clip-rule="evenodd"></path>
                </svg>   
                </a>
            </div>
            <svg viewBox="0 0 1024 1024" class="absolute left-1/2 top-1/2 -z-10 h-[64rem] w-[64rem] -translate-x-1/2" aria-hidden="true">
                <circle cx="512" cy="512" r="512" fill="url(#759c1415-0410-454c-8f7c-9a820de03641)" fill-opacity="0.7" />
                <defs>
                <radialGradient id="759c1415-0410-454c-8f7c-9a820de03641" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(512 512) rotate(90) scale(512)">
                    <stop stop-color="#7775D6" />
                    <stop offset="1" stop-color="#E935C1" stop-opacity="0" />
                </radialGradient>
                </defs>
            </svg>
            </div>
        </div>
    
        <!-- Testimonials section -->
        <div class="relative isolate mt-32 sm:pt-32">
            <svg class="absolute inset-0 -z-10 hidden h-full w-full stroke-gray-200 [mask-image:radial-gradient(64rem_64rem_at_top,white,transparent)] sm:block" aria-hidden="true">
            <defs>
                <pattern id="55d3d46d-692e-45f2-becd-d8bdc9344f45" width="200" height="200" x="50%" y="0" patternUnits="userSpaceOnUse">
                <path d="M.5 200V.5H200" fill="none" />
                </pattern>
            </defs>
            <svg x="50%" y="0" class="overflow-visible fill-gray-50">
                <path d="M-200.5 0h201v201h-201Z M599.5 0h201v201h-201Z M399.5 400h201v201h-201Z M-400.5 600h201v201h-201Z" stroke-width="0" />
            </svg>
            <rect width="100%" height="100%" stroke-width="0" fill="url(#55d3d46d-692e-45f2-becd-d8bdc9344f45)" />
            </svg>
            <div class="relative">
              <div class="absolute inset-x-0 top-1/2 -z-10 -translate-y-1/2 transform-gpu overflow-hidden opacity-30 blur-3xl" aria-hidden="true">
                  <div class="ml-[max(50%,38rem)] aspect-[1313/771] w-[82.0625rem] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
              </div>
              <div class="absolute inset-x-0 top-0 -z-10 flex transform-gpu overflow-hidden pt-8 opacity-25 blur-3xl xl:justify-end" aria-hidden="true">
                  <div class="ml-[-22rem] aspect-[1313/771] w-[82.0625rem] flex-none origin-top-right rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] xl:ml-0 xl:mr-[calc(50%-12rem)]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
              </div>
              <div class="mx-auto max-w-7xl px-6 lg:px-8">
                  <div class="mx-auto max-w-xl sm:text-center">
                    <h2 class="text-2xl font-semibold leading-8 tracking-tight text-indigo-600">Apa Kata Pengguna Kami?</h2>
                    <p class="mt-2 text-xl tracking-tight text-gray-900 sm:text-2xl">Jadi Sebahagian Daripada Pengguna Kami Yang Berpuas Hati!</p>
                  </div>
              </div>
              <div class="carousel-container mx-auto w-full max-w-4xl mt-6">
                <div class="testimoni-carousel">
                    <div class="carousel-slide">
                        <img src="/images/testimoni/feedback-1.webp" alt="Slide 1" class="w-56 rounded-lg">
                    </div>
                    <div class="carousel-slide">
                        <img src="/images/testimoni/feedback-2.webp" alt="Slide 2" class="w-56 rounded-lg">
                    </div>
                    <div class="carousel-slide">
                        <img src="/images/testimoni/feedback-3.webp" alt="Slide 3" class="w-56 rounded-lg">
                    </div>
                    <div class="carousel-slide">
                        <img src="/images/testimoni/feedback-4.webp" alt="Slide 4" class="w-56 rounded-lg">
                    </div>
                    <div class="carousel-slide">
                        <img src="/images/testimoni/feedback-5.webp" alt="Slide 5" class="w-56 rounded-lg">
                    </div>
                    <div class="carousel-slide">
                        <img src="/images/testimoni/feedback-6.webp" alt="Slide 6" class="w-56 rounded-lg">
                    </div>
                    <div class="carousel-slide">
                        <img src="/images/testimoni/feedback-7.webp" alt="Slide 7" class="w-56 rounded-lg">
                    </div>
                    <div class="carousel-slide">
                        <img src="/images/testimoni/feedback-8.webp" alt="Slide 8" class="w-56 rounded-lg">
                    </div>
                    <div class="carousel-slide">
                        <img src="/images/testimoni/feedback-9.webp" alt="Slide 9" class="w-56 rounded-lg">
                    </div>
                    <div class="carousel-slide">
                        <img src="/images/testimoni/feedback-10.webp" alt="Slide 10" class="w-56 rounded-lg">
                    </div>
                </div>
              </div>
            </div>
        </div>


        </main>
    
        <!-- Footer -->
        <footer class="mt-32 bg-gray-900 sm:mt-56" aria-labelledby="footer-heading">
        <h2 id="footer-heading" class="sr-only">Footer</h2>
        <div class="mx-auto max-w-7xl px-6 pb-8 pt-8 sm:pt-12 lg:px-4 lg:pt-16">
            <div class="mt-8 border-t border-white/10 pt-8 md:flex md:items-center md:justify-between">
            <div class="flex space-x-6 md:order-2">
                <a href="https://www.facebook.com/onlinekad" class="text-gray-500 hover:text-gray-400">
                <span class="sr-only">Facebook</span>
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                </svg>
                </a>
                <a href="https://www.instagram.com/onlinekad_" class="text-gray-500 hover:text-gray-400">
                <span class="sr-only">Instagram</span>
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                </svg>
                </a>
            </div>
            <div>
                <p class="mt-1 text-xs leading-5 text-gray-400 md:order-1 md:mt-0">&copy; 2024 onlinekad.com</p>
                <p class="mt-1 text-xs leading-5 text-gray-400 md:order-2 md:mt-0">Dimiliki oleh: SY Digital Solutions</p>
                <p class="mt-1 text-xs leading-5 text-gray-400 md:order-3 md:mt-0">BRN: 003369320-V</p>
            </div>
            </div>
        </div>
        </footer>
    </div>
  
    </body>
</html>
