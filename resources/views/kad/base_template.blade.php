<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Sofadi+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
        <link href="{{ $data['font_url2'] }}" rel="stylesheet">

        <!-- Styles -->
        @vite('resources/css/app.css')
    </head>
    <body>
        <div class="h-full w-full bg-cover bg-center" style="background-image: url('{{ asset('images/N005.2.webp') }}'); background-attachment: fixed">
            <!-- First Section -->
            <div class="h-screen w-full bg-cover bg-center" style="background-image: url('{{ asset('images/N005.1.webp') }}');">
                <div class="absolute inset-0 bg-white bg-opacity-20">
                    <div class="flex flex-col justify-center gap-20 items-center h-full">
                        <h1 class="text-2xl font-bold text-center text-gray-600" style="font-family: 'Safadi One', cursive; margin-bottom: 0;">{{ $data['title'] }}</h1>
                        <div class="text-center">
                            <p class="text-5xl font-bold text-gray-600 mb-0 leading-tight" style="font-family: '{{ $data['font_name2'] }}', cursive; margin-bottom: 0;">{{ $data['groom_nick_name'] }}</p>
                            <p class="text-5xl font-bold text-gray-600 mb-0 leading-tight" style="font-family: '{{ $data['font_name2'] }}', cursive; margin-bottom: 0;">&</p>
                            <p class="text-5xl font-bold text-gray-600 mb-0 leading-tight" style="font-family: '{{ $data['font_name2'] }}', cursive; margin-bottom: 0;">{{ $data['bride_nick_name'] }}</p>
                        </div>
                        <div class="text-center">
                            <p class="text-2xl font-bold text-gray-600 leading-tight" style="font-family: 'Safadi One', cursive; margin-bottom: 0;">{{ $data['event_day'] }}</p>
                            <p class="text-2xl font-bold text-gray-600 leading-tight" style="font-family: 'Safadi One', cursive;">{{ $data['event_date'] }} {{ $data['event_month'] }} {{ $data['event_year'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
        
            <!-- Second Section -->
            <div>
                <div class="flex flex-col justify-center gap-5 items-center h-full">
                    <h1 class="text-2xl font-bold text-center mt-16" style="font-family: 'Safadi One', cursive; color: #DAA520">Assalamualaikum</h1>
                    <div class="text-center">
                        <p class="text-xl font-bold text-center text-gray-600" style="font-family: 'Safadi One', cursive;">{{ $data['father_name'] }}</p>
                        <p class="text-xl font-bold text-center text-gray-600" style="font-family: 'Safadi One', cursive;">&</p>
                        <p class="text-xl font-bold text-center text-gray-600" style="font-family: 'Safadi One', cursive;">{{ $data['mother_name'] }}</p>
                    </div>
                    <div class="text-center">
                        <p class="text-sm font-bold text-center" style="font-family: 'Safadi One', cursive; color: #DAA520">{{ $data['ayat_jemputan'] }}</p>
                    </div>
                    <div class="text-center">
                        <p class="text-xl font-bold text-gray-600 mb-0 leading-tight" style="font-family: '{{ $data['font_name2'] }}', cursive; margin-bottom: 0;">{{ $data['groom_name'] }}</p>
                        <p class="text-xl font-bold text-gray-600 mb-0 leading-tight" style="font-family: '{{ $data['font_name2'] }}', cursive; margin-bottom: 0;">&</p>
                        <p class="text-xl font-bold text-gray-600 mb-0 leading-tight" style="font-family: '{{ $data['font_name2'] }}', cursive; margin-bottom: 0;">{{ $data['bride_name'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
