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
        <link href="{{ $font['font_url2'] }}" rel="stylesheet">

        <!-- Styles -->
        @vite(['resources/css/app.css','resources/js/app.js'])

        <!-- font-awesome icon here -->
        <script src="https://kit.fontawesome.com/5a63289656.js" crossorigin="anonymous"></script>
    </head>
    <body x-data="{ form_ucapan: false, form_rsvp: false }">
        <div class="h-full w-full bg-cover bg-center" style="background-image: url('{{ asset('images/N005.2.webp') }}'); background-attachment: fixed">
            <!-- Kad Section -->
            <div class="h-screen w-full bg-cover bg-center" style="background-image: url('{{ asset('images/N005.1.webp') }}');">
                <div class="absolute inset-0 bg-white bg-opacity-20">
                    <div class="flex flex-col justify-center gap-20 items-center h-full">
                        <h1 class="text-2xl font-bold text-center text-gray-600" style="font-family: 'Safadi One', cursive; margin-bottom: 0;">{{ $kadData->tajuk_kad }}</h1>
                        <div class="text-center">
                            <p class="text-5xl font-bold text-gray-600 mb-0 leading-tight" style="font-family: '{{ $font['font_name2'] }}', cursive; margin-bottom: 0;">{{ $kadData->nama_panggilan_lelaki }}</p>
                            <p class="text-5xl font-bold text-gray-600 mb-0 leading-tight" style="font-family: '{{ $font['font_name2'] }}', cursive; margin-bottom: 0;">&</p>
                            <p class="text-5xl font-bold text-gray-600 mb-0 leading-tight" style="font-family: '{{ $font['font_name2'] }}', cursive; margin-bottom: 0;">{{ $kadData->nama_panggilan_perempuan }}</p>
                        </div>
                        <div class="text-center">
                            <p class="text-2xl font-bold text-gray-600 leading-tight" style="font-family: 'Safadi One', cursive; margin-bottom: 0;">{{ $dateTime['hari_majlis'] }}</p>
                            <p class="text-2xl font-bold text-gray-600 leading-tight" style="font-family: 'Safadi One', cursive;">{{ $dateTime['tarikh_majlis'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
        
            <!-- Details Section -->
            <div class="border-b border-gray-300 my-10 py-8">
                <div class="relative top-0 bg-white bg-opacity-20">
                    <div class="flex flex-col justify-center gap-5 items-center h-full">
                        <h1 class="text-2xl text-center font-serif" style="color: #DAA520">Assalamualaikum</h1>
                        <div class="text-center">
                            <p class="text-xl text-center text-gray-600 font-serif">{{ $kadData->nama_bapa_pengantin_lelaki }}</p>
                            <p class="text-xl text-center text-gray-600 font-serif">&</p>
                            <p class="text-xl text-center text-gray-600 font-serif">{{ $kadData->nama_ibu_pengantin_lelaki }}</p>
                        </div>
                        <div class="text-center">
                            <p class="text-sm text-center px-4 font-serif" style="color: #DAA520">{{ $kadData->ayat_jemputan }}</p>
                        </div>
                        <div class="text-center">
                            <p class="text-xl font-bold text-gray-600 mb-0 leading-tight" style="font-family: '{{ $font['font_name2'] }}', cursive; margin-bottom: 0;">{{ $kadData->nama_penuh_lelaki }}</p>
                            <p class="text-xl font-bold text-gray-600 mb-0 leading-tight" style="font-family: '{{ $font['font_name2'] }}', cursive; margin-bottom: 0;">&</p>
                            <p class="text-xl font-bold text-gray-600 mb-0 leading-tight" style="font-family: '{{ $font['font_name2'] }}', cursive; margin-bottom: 0;">{{ $kadData->nama_penuh_perempuan }}</p>
                        </div>
                        <div class="flex flex-col justify-center gap-5">
                            <div>
                                <div class="flex justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#DAA520" class="size-12">
                                    <path d="M12.75 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM7.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM8.25 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM9.75 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM10.5 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM12.75 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM14.25 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 13.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" />
                                    <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z" clip-rule="evenodd" />
                                </svg>
                                </div>
                                <p class="text-l font-semibold text-center text-gray-600 font-serif">{{ $dateTime['hari_tarikh_majlis'] }}</p>
                            </div>
                            <div>
                                <div class="flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#DAA520" class="size-12">
                                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 0 0 0-1.5h-3.75V6Z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <p class="text-l font-semibold text-center text-gray-600 font-serif">{{ $dateTime['masa_mula_majlis'] }} ~ {{ $dateTime['masa_tamat_majlis'] }}</p>
                            </div>
                            <div>
                                <div class="flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#DAA520" class="size-12">
                                        <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <p class="text-l font-semibold text-center text-gray-600 font-serif px-14">{{ $kadData->alamat_majlis }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fetures Section -->
            <div>
                <div class="flex flex-col justify-center gap-5 items-center h-full px-6">

                    <!-- Countdown Timer -->
                    <div class="items-center w-full h-auto mb-6 rounded-xl bg-[#DAA520] p-4">
                        <p class="text-2xl text-white text-center mb-2">Menanti Hari</p>

                        <!-- Countdown Container -->
                        <div id="countdown" class="text-center flex justify-center gap-4">
                            <div class="flex flex-col items-center">
                                <span id="days" class="text-4xl font-semibold text-white"></span>
                                <span class="text-sm text-white">Hari</span>
                            </div>
                            <div class="flex flex-col items-center">
                                <span id="hours" class="text-4xl font-semibold text-white"></span>
                                <span class="text-sm text-white">Jam</span>
                            </div>
                            <div class="flex flex-col items-center">
                                <span id="minutes" class="text-4xl font-semibold text-white"></span>
                                <span class="text-sm text-white">Minit</span>
                            </div>
                            <div class="flex flex-col items-center">
                                <span id="seconds" class="text-4xl font-semibold text-white"></span>
                                <span class="text-sm text-white">Saat</span>
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
                    <div class="main-slider size-80 w-full max-h-[400px] mx-auto overflow-hidden rounded-xl">
                        @foreach($imageUrls as $url)
                            <div class="w-full h-full">
                                <img src="{{ asset($url) }}" alt="Slide Image" class="w-full h-full object-cover rounded-xl border border-gray-800">
                            </div>
                        @endforeach
                    </div>

                    <!-- Guestbook -->
                    <div class="mt-7 w-full rounded-xl border-[#DAA520] border-[1px] py-6 px-3 mb-32">
                        <div>
                            <div class="flex justify-center items-center mb-5">
                                <div>
                                    <!-- Open the modal using ID.showModal() method -->
                                    <x-primary-button @click="form_ucapan = true">Tulis Ucapan</x-primary-button>
                                </div>
                            </div>
                        </div>
                        <livewire:guestbook-wishes :kad_id="$kadData->id" />
                    </div>     
                    <!-- Move to wishes section after paginate -->
                    <script>
                        document.addEventListener('livewire:load', function () {
                            Livewire.on('pageChanged', () => {
                                const section = document.getElementById('wishes-section');
                                section.scrollIntoView({ behavior: 'smooth' });
                            });
                        });
                    </script> 

                </div>
            </div>
        </div>

        <!-- Doa -->
        <div class="items-center w-full h-auto mb-6 rounded-xl bg-[#DAA520] p-4">

        </div>

        <!-- Form Tulis Ucapan -->
        <form  action="{{ route('tulis-ucapan') }}" method="POST">
            @csrf
            <input type="hidden" name="kad_id" value="{{ $kadData->id }}">
            <div x-cloak x-show="form_ucapan" 
                @click.away="form_ucapan = false"
                x-transition:enter="ease-out duration-300" 
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
                x-transition:leave="ease-in duration-200" 
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                class="fixed inset-0 z-50 flex items-center justify-center p-4">
            
                <!-- Modal backdrop -->
                <div class="absolute inset-0 bg-gray-500 bg-opacity-75" @click="form_ucapan = false"></div>
            
                <!-- Modal content -->
                <div class="relative z-10 bg-[#DAA520] rounded-lg shadow-lg w-full max-w-md p-6">
                    <div class="md:p-10 p-0 flex flex-col gap-4">
                        <!-- Form fields -->
                        <div class="text-[white] flex flex-col gap-2">
                            <h3>Nama</h3>
                            <input required type="text" class="py-2 px-3 text-black focus:to-blue-600 rounded-[4px]" name="author" id="author">
                        </div>
                        <div class="text-[white] flex flex-col gap-2">
                            <h3>Ucapan</h3>
                            <textarea required class="py-2 px-3 text-black focus:to-blue-600 rounded-[4px]" name="wish" id="wish"></textarea>
                        </div>
            
                        <!-- Buttons -->
                        <div class="py-3 sm:flex sm:flex-row-reverse sm:px-6">
                            <x-primary-button type="submit">Submit</x-primary-button>
                            <x-primary-button class="bg-red-500 hover:bg-red-300" @click="form_ucapan = false">Tutup</x-primary-button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- End Form Tulis Ucapan -->

        <!-- Form Rsvp -->
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
            <div class="relative z-10 w-full max-w-md p-6 rounded-xl bg-[#DAA520] mx-auto">
                <h1 class="text-center font-bold text-xl text-[white] open-sans">RSVP</h1>
                <h1 class="text-center pb-4 font-bold text-xl text-[white] open-sans">{{ $kadData['nama_panggilan_lelaki'] }} & {{ $kadData['nama_panggilan_perempuan'] }}</h1>
                
                <!-- Form -->
                <div x-data="{ kehadiran: 'hadir' }" class="md:p-10 p-0 flex flex-col gap-4">
                    
                    <!-- Name Field -->
                    <div class="text-[white] flex flex-col gap-2">
                        <h3>Nama (Required)</h3>
                        <input required type="text" class="py-2 px-3 text-black focus:to-blue-600 rounded-[4px]" name="nama" id="nama">
                    </div>
                    
                    <!-- Phone Number Field -->
                    <div class="text-[white] flex flex-col gap-2">
                        <h3>Telefon (Required)</h3>
                        <input required type="text" class="py-2 px-3 text-black focus:to-blue-600 rounded-[4px]" name="telefon" id="telefon">
                    </div>

                    <!-- Kehadiran Field -->
                    <div class="text-[white] flex flex-col gap-2">
                        <h3>Kehadiran (Required)</h3>
                        <select x-model="kehadiran" class="w-full text-black py-2 px-3 focus:to-blue-600 rounded-[4px]" name="kehadiran" id="kehadiran">
                            <option value="hadir">Hadir</option>
                            <option value="tidak_hadir">Tidak Hadir</option>
                        </select>
                    </div>

                    <!-- Jumlah Kehadiran Field (Shown only if "Hadir" is selected) -->
                    <div x-show="kehadiran === 'hadir'" class="text-[white] flex flex-col gap-2">
                        <h3>Jumlah Kehadiran</h3>
                        <input type="number" class="py-2 px-3 text-black focus:to-blue-600 rounded-[4px]" name="jumlah_kehadiran" id="jumlah_kehadiran">
                    </div>

                    <!-- Action Buttons -->
                    <div class="py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <x-primary-button form="delete-form">Submit</x-primary-button>
                        <x-primary-button class="bg-red-500 hover:bg-red-300" @click="form_rsvp = false">Tutup</x-primary-button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Form Rsvp -->

        <!-- Footer Section -->
        <footer class="lg:w-1/4 w-full mx-auto bg-[#ebbc47] flex justify-center items-center]">
            <div class="fixed bottom-0 z-50 lg:w-1/4 w-full mx-auto h-16 bg-[#ebbc47] border-t">
                <div class="grid mt-2 w-[97%]  gap-1 max-w-lg grid-cols-4 mx-auto font-medium">
                    <button type="button" @click="form_rsvp = true" class="inline-flex flex-col items-center justify-center px-1 pb-1 rounded-md border border-white bg-[#DAA520] ">
                        <h1 class="text-[20px] text-white"><i class="fa-solid fa-list"></i></h1>
                        <span class="text-xs text-white">RSVP</span>
                    </button>
                    <button type="button" class="inline-flex flex-col items-center justify-center px-1 pb-1 rounded-md border border-white bg-[#DAA520]  ">
                        <h1 class="text-[20px] text-white"><i class="fa-regular fa-calendar"></i></h1>
                        <span class="text-xs text-white">REMINDER</span>
                    </button>
                    <button type="button" class="inline-flex flex-col items-center justify-center px-1 pb-1 rounded-md border border-white bg-[#DAA520] ">
                        <h1 class="text-[20px] text-white"><i class="fa-solid fa-phone"></i></h1>
                        <span class="text-xs text-white">TELEFON</span>
                    </button>
                    <button type="button" class="inline-flex flex-col items-center justify-center px-1 pb-1 rounded-md border border-white bg-[#DAA520]  ">
                        <h1 class="text-[20px] text-white"><i class="fa-solid fa-location-dot"></i></h1>
                        <span class="text-xs text-white dark:text-white-400">LOKASI</span>
                    </button>
                    <button type="button" class="inline-flex flex-col items-center justify-center px-1 pb-1 rounded-md border border-white bg-[#DAA520]  ">
                        <h1 class="text-[20px] text-white"><i class="fa-solid fa-location-dot"></i></h1>
                        <span class="text-xs text-white dark:text-white-400">LOCATION</span>
                    </button>
                </div>
            </div>
        </footer>
    @livewireScripts
    </body>
</html>
