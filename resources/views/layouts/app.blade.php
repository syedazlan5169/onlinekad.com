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
          gtag('config', 'AW-11521579076');
        </script>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- SEO Meta Tags -->
        <meta name="description" content="Kad kahwin digital percuma. Jemputan Digital Yang Memukau, Cepat dan Mudah. Pelbagai fungsi yang menarik. Dapatkan sekarang!">
        <meta name="keywords" content="kad kahwin, kad kawin, digital wedding card, kad kahwin digital, kad kawin digital, kad jemputan digital, kad kahwin murah, kad jemputan kahwin, kahwinnow, kad digital kahwinnow, kahwinnow digital card, digital kad, digital invitation, jemputan, contoh kad kahwin, kad undangan digital, kad kahwin digital percuma">
        <meta name="author" content="OnlineKad">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Load all font url -->
        @foreach ($fonts as $font)
            <link href="{{ $font->font_url }}" rel="stylesheet">
        @endforeach

        <!-- Scripts -->
        @vite('resources/css/app.css')
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <livewire:layout.navigation />

            <!-- Page Heading -->
            @if (isset($header))
            <header class="relative bg-white shadow">
                <div class="absolute inset-0 bg-cover bg-center opacity-40 blur-sm" style="background-image: url('{{ asset('images/header_bg.webp') }}');"></div>
                <div class="relative max-w-7xl mx-auto text-center text-4xl pt-14 pb-4 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            @endif
        

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        @livewireScripts
    </body>
</html>
