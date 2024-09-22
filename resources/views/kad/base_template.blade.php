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
        @vite(['resources/css/app.css','resources/js/app.js'])
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
            <div class="border-b border-gray-300 my-10 py-8">
                <div class="relative top-0 bg-white bg-opacity-20">
                    <div class="flex flex-col justify-center gap-5 items-center h-full">
                        <h1 class="text-2xl text-center font-serif" style="color: #DAA520">Assalamualaikum</h1>
                        <div class="text-center">
                            <p class="text-xl text-center text-gray-600 font-serif">{{ $data['father_name'] }}</p>
                            <p class="text-xl text-center text-gray-600 font-serif">&</p>
                            <p class="text-xl text-center text-gray-600 font-serif">{{ $data['mother_name'] }}</p>
                        </div>
                        <div class="text-center">
                            <p class="text-sm text-center px-4 font-serif" style="color: #DAA520">{{ $data['ayat_jemputan'] }}</p>
                        </div>
                        <div class="text-center">
                            <p class="text-xl font-bold text-gray-600 mb-0 leading-tight" style="font-family: '{{ $data['font_name2'] }}', cursive; margin-bottom: 0;">{{ $data['groom_name'] }}</p>
                            <p class="text-xl font-bold text-gray-600 mb-0 leading-tight" style="font-family: '{{ $data['font_name2'] }}', cursive; margin-bottom: 0;">&</p>
                            <p class="text-xl font-bold text-gray-600 mb-0 leading-tight" style="font-family: '{{ $data['font_name2'] }}', cursive; margin-bottom: 0;">{{ $data['bride_name'] }}</p>
                        </div>
                        <div class="flex flex-col justify-center gap-5">
                            <div>
                                <div class="flex justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#DAA520" class="size-12">
                                    <path d="M12.75 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM7.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM8.25 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM9.75 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM10.5 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM12.75 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM14.25 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 13.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" />
                                    <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z" clip-rule="evenodd" />
                                </svg>
                                </div>
                                <p class="text-l font-semibold text-center text-gray-600 font-serif">{{ $data['event_day'] }} {{ $data['event_date'] }} {{ $data['event_month'] }} {{ $data['event_year'] }}</p>
                            </div>
                            <div>
                                <div class="flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#DAA520" class="size-12">
                                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 0 0 0-1.5h-3.75V6Z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <p class="text-l font-semibold text-center text-gray-600 font-serif">{{ $data['masa_mula'] }} ~ {{ $data['masa_tamat'] }}</p>
                            </div>
                            <div>
                                <div class="flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#DAA520" class="size-12">
                                        <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <p class="text-l font-semibold text-center text-gray-600 font-serif px-14">{{ $data['alamat'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Third Section -->
            <div>
                <div class="flex flex-col justify-center gap-5 items-center h-full">
                    <div class="items-center w-80 h-36 rounded-xl" style="background-color: #DAA520">
                        <p class="text-2xl text-white flex justify-center">Menanti Hari</p>
                    </div>
                    
                    <div class="main-slider size-80 max-w-[800px] max-h-[400px] mx-auto overflow-hidden rounded-xl">
                        @foreach($imageUrls as $url)
                            <div class="w-full h-full">
                                <img src="{{ asset($url) }}" alt="Slide Image" class="w-full h-full object-cover rounded-xl border border-gray-800">
                            </div>
                        @endforeach
                    </div>

                    <div class="items-center w-80 max-w-md p-6 rounded-xl bg-[#DAA520] mx-auto">
                        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                            <h2 class="mt-6 text-center text-2xl font-semibold leading-9 tracking-tight text-white">RSVP</h2>
                            <h2 class="mt-0 text-center text-2xl font-semibold leading-9 tracking-tight text-white">{{ $data['groom_nick_name'] }} & {{ $data['bride_nick_name'] }}</h2>
                        </div>

                        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                            <form class="space-y-6" action="#" method="POST">
                                <!-- Name Field -->
                                <div class="rounded-md px-3 pb-1.5 pt-2.5 shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-indigo-600">
                                    <label for="name" class="block text-xs font-medium text-gray-900">Nama</label>
                                    <input type="text" name="name" id="name" class="block w-full border-0 p-0 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Jane Smith">
                                </div>

                                <!-- Phone Number Field -->
                                <div class="rounded-md px-3 pb-1.5 pt-2.5 shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-indigo-600">
                                    <label for="telefon" class="block text-xs font-medium text-gray-900">Nombor Telefon</label>
                                    <input type="text" name="telefon" id="telefon" class="block w-full border-0 p-0 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Jane Smith">
                                </div>

                                <!-- Radio Buttons -->
                                <fieldset aria-label="Plan">
                                    <div class="space-y-5">
                                        <div class="relative flex items-start">
                                            <div class="flex h-6 items-center">
                                                <input id="hadir" name="attendance" type="radio" checked class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                            </div>
                                            <div class="ml-3 text-sm leading-6">
                                                <label for="hadir" class="font-medium text-gray-900">Hadir</label>
                                            </div>
                                        </div>

                                        <div class="relative flex items-start">
                                            <div class="flex h-6 items-center">
                                                <input id="tidak_hadir" name="attendance" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                            </div>
                                            <div class="ml-3 text-sm leading-6">
                                                <label for="tidak_hadir" class="font-medium text-gray-900">Tidak Hadir</label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <!-- Submit Button -->
                                <div>
                                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="items-center w-80 h-36 rounded-xl" style="background-color: #DAA520">
                        <p class="text-2xl text-white flex justify-center">Menanti Hari</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
