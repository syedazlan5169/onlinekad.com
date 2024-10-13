<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 leading-tight">
            {{ __('Tempah') }}
        </h2>
    </x-slot>

    <!-- <div id="parent" class="flex gap-4 justify-center items-center h-screen px-28">
            <div id="child1" class="h-full w-[20%] rounded-lg bg-green-300 p-4">
                <div id="subchild1" class="bg-yellow-500 w-full h-24 rounded-lg mb-4"></div>
                <div id="subchild2" class="bg-yellow-500 w-full h-24 rounded-lg"></div>
            </div>
            <div id="child2" class="h-full w-[80%] rounded-lg bg-red-300"></div>
        </div> -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:flex sm:justify-center gap-3 sm:px-6 lg:px-8">
            <div class="bg-green-100 h-full w-[40%] p-4  shadow-lg sm:rounded-lg">
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
                        <x-primary-button href="{{ route('form-tempah', ['id' => $product->id]) }}" 
                            class="w-full text-center py-2 bg-indigo-600 hover:bg-indigo-500 text-white rounded-lg shadow-md">
                            Tempah
                        </x-primary-button>
                        
                        <!-- Live Preview Button -->
                        <x-primary-button href="preview/{{ $product->design_code }}" 
                            class="w-full text-center py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg shadow-md mt-2 sm:mt-0">
                            Live Preview
                        </x-primary-button>
                    </div>
                <div id="subchild2" class="bg-yellow-500 w-full h-24 rounded-lg"></div>
            </div>
            <div class="bg-red-100 h-full w-[60%] overflow-hidden shadow-lg sm:rounded-lg">
                <div x-data="{
                    selectedFont: '1', 
                    fonts: {
                        '1': 'Great Vibes',
                        '2': 'Dancing Script',
                        '3': 'Alex Brush',
                        '4': 'Parisienne',
                    },
                    openSection: 'maklumat_pengantin', 
                    namaLelaki: '', 
                    namaPerempuan: '' 
                }" class="max-w-7xl mx-auto p-8">
                    
                    <!-- Form starts -->
                    <form action="{{ route('tempah') }}" method="POST">
                        @csrf

                        <input class="hidden" name="design_id" id="design_id" value="{{ $id }}">
                        <!-- Accordion Section 1: Maklumat Pengantin -->
                        <div class="border rounded-md p-4 mb-4">
                            <h2 @click="openSection = openSection === 'maklumat_pengantin' ? '' : 'maklumat_pengantin'" class="text-lg underline font-bold cursor-pointer flex justify-between items-center">
                                Maklumat Pengantin
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" :class="openSection === 'maklumat_pengantin' ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </h2>

                            <!-- Maklumat Pengantin Fields -->
                            <div x-show="openSection === 'maklumat_pengantin'" x-data="{ penjemput: '1' }" class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-6">

                                <!-- Nama Penuh Lelaki -->
                                <div class="sm:col-span-1">
                                    <label for="nama_penuh_lelaki" class="block text-sm font-medium text-gray-900">Nama Penuh Pengantin Lelaki</label>
                                    <div class="mt-2">
                                        <input type="text" name="nama_penuh_lelaki" id="nama_penuh_lelaki" placeholder="Abdul Rahman Bin Abdul Rahim" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
                                    </div>
                                </div>

                                <!-- Nama Panggilan Lelaki -->
                                <div class="sm:col-span-1">
                                    <label for="nama_panggilan_lelaki" class="block text-sm font-medium text-gray-900">Nama Panggilan Pengantin Lelaki</label>
                                    <div class="mt-2">
                                        <input x-model="namaLelaki" type="text" name="nama_panggilan_lelaki" id="nama_panggilan_lelaki" placeholder="Rahman" maxlength="12" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
                                    </div>
                                </div>

                                <!-- Nama Penuh Perempuan -->
                                <div class="sm:col-span-1">
                                    <label for="nama_penuh_perempuan" class="block text-sm font-medium text-gray-900">Nama Penuh Pengantin Perempuan</label>
                                    <div class="mt-2">
                                        <input type="text" name="nama_penuh_perempuan" id="nama_penuh_perempuan" placeholder="Nurul Hawa Binti Mior Rahim" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
                                    </div>
                                </div>

                                <!-- Nama Panggilan Perempuan -->
                                <div class="sm:col-span-1">
                                    <label for="nama_panggilan_perempuan" class="block text-sm font-medium text-gray-900">Nama Panggilan Pengantin Perempuan</label>
                                    <div class="mt-2">
                                        <input x-model="namaPerempuan" type="text" name="nama_panggilan_perempuan" id="nama_panggilan_perempuan" placeholder="Hawa" maxlength="12" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
                                    </div>
                                </div>

                                <!-- Font Selection and Preview -->
                                <div class="sm:col-span-2">
                                    <div class="text-center">
                                        <p class="text-4xl" :style="{ fontFamily: fonts[selectedFont] }">
                                            <span x-text="namaLelaki"></span>
                                        </p>
                                        <p class="text-4xl" :style="{ fontFamily: fonts[selectedFont] }">&</p>
                                        <p class="text-4xl" :style="{ fontFamily: fonts[selectedFont] }">
                                            <span x-text="namaPerempuan"></span>
                                        </p>
                                    </div>

                                    <label for="font" class="block text-sm font-medium text-gray-900 mt-4">Font</label>
                                    <div class="mt-2">
                                        <select id="font" name="font" x-model='selectedFont' class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:max-w-xs sm:text-sm">
                                            <option value="1">Great Vibes</option>
                                            <option value="2">Dancing Script</option>
                                            <option value="3">Alex Brush</option>
                                            <option value="4">Parisienne</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Penjemput Selection -->
                                <div class="sm:col-span-2">
                                    <label for="penjemput" class="block text-sm font-medium text-gray-900">Penjemput</label>
                                    <div class="mt-2">
                                        <select x-model="penjemput" id="penjemput" name="penjemput" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:max-w-xs sm:text-sm">
                                            <option value="1">Pihak Lelaki</option>
                                            <option value="2">Pihak Perempuan</option>
                                            <option value="3">Dua Belah Pihak</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Nama Bapa/Ibu (Lelaki) -->
                                <div x-show="penjemput === '3' || penjemput === '1'" class="sm:col-span-1">
                                    <label for="nama_bapa_pengantin_lelaki" class="block text-sm font-medium text-gray-900">Nama Bapa Pengantin Lelaki</label>
                                    <div class="mt-2">
                                        <input type="text" name="nama_bapa_pengantin_lelaki" id="nama_bapa_pengantin_lelaki" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
                                    </div>
                                </div>

                                <div x-show="penjemput === '3' || penjemput === '1'" class="sm:col-span-1">
                                    <label for="nama_ibu_pengantin_lelaki" class="block text-sm font-medium text-gray-900">Nama Ibu Pengantin Lelaki</label>
                                    <div class="mt-2">
                                        <input type="text" name="nama_ibu_pengantin_lelaki" id="nama_ibu_pengantin_lelaki" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
                                    </div>
                                </div>

                                <!-- Nama Bapa/Ibu (Perempuan) -->
                                <div x-show="penjemput === '3' || penjemput === '2'" class="sm:col-span-1">
                                    <label for="nama_bapa_pengantin_perempuan" class="block text-sm font-medium text-gray-900">Nama Bapa Pengantin Perempuan</label>
                                    <div class="mt-2">
                                        <input type="text" name="nama_bapa_pengantin_perempuan" id="nama_bapa_pengantin_perempuan" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
                                    </div>
                                </div>

                                <div x-show="penjemput === '3' || penjemput === '2'" class="sm:col-span-1">
                                    <label for="nama_ibu_pengantin_perempuan" class="block text-sm font-medium text-gray-900">Nama Ibu Pengantin Perempuan</label>
                                    <div class="mt-2">
                                        <input type="text" name="nama_ibu_pengantin_perempuan" id="nama_ibu_pengantin_perempuan" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Accordion Section 2: Maklumat Majlis -->
                        <div class="border rounded-md p-4 mb-4">
                            <h2 @click="openSection = openSection === 'maklumat_majlis' ? '' : 'maklumat_majlis'" class="text-lg underline font-bold cursor-pointer flex justify-between items-center">
                                Maklumat Majlis
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" :class="openSection === 'maklumat_majlis' ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </h2>

                            <!-- Maklumat Majlis Fields -->
                            <div x-show="openSection === 'maklumat_majlis'" class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-6">
                                
                                <!-- Tajuk Kad -->
                                <div class="sm:col-span-1">
                                    <label for="tajuk_kad" class="block text-sm font-medium text-gray-900">Tajuk Kad</label>
                                    <div class="mt-2">
                                        <input type="text" name="tajuk_kad" id="tajuk_kad" spellcheck="false" value="Walimatulurus" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
                                    </div>
                                </div>

                                <!-- Ayat Jemputan -->
                                <div class="sm:col-span-1">
                                    <label for="ayat_jemputan" class="block text-sm font-medium text-gray-900">Ayat Jemputan</label>
                                    <div class="mt-2">
                                        <textarea name="ayat_jemputan" id="ayat_jemputan" rows="4" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">DENGAN SEGALA HORMATNYA MENJEMPUT DATO'/ DATIN/ TUAN/ PUAN/ ENCIK/ CIK DAN SEISI KELUARGA KE MAJLIS PERKAHWINAN PUTERA KAMI BERSAMA PASANGANNYA</textarea>
                                    </div>
                                </div>

                                <!-- Doa Pengantin -->
                                <div class="sm:col-span-1">
                                    <label for="doa_pengantin" class="block text-sm font-medium text-gray-900">Doa Pengantin</label>
                                    <div class="mt-2">
                                        <textarea name="doa_pengantin" id="doa_pengantin" rows="4" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">“Ya Allah, berkatilah majlis perkahwinan ini, limpahkan baraqah dan rahmat kepada kedua mempelai ini, Kurniakanlah mereka zuriat yang soleh dan solehah. Kekalkan jodoh mereka di dunia dan di akhirat dan sempurnakanlah agama mereka dengan berkat ikatan ini.”</textarea>
                                    </div>
                                </div>

                                <!-- Tarikh, Masa -->
                                <div class="sm:col-span-1">
                                    <label for="tarikh_majlis" class="block text-sm font-medium text-gray-900">Tarikh Majlis</label>
                                    <div class="mt-2">
                                        <input type="date" name="tarikh_majlis" id="tarikh_majlis" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
                                    </div>
                                </div>

                                <div class="sm:col-span-1">
                                    <label for="masa_mula_majlis" class="block text-sm font-medium text-gray-900">Masa Mula</label>
                                    <div class="mt-2">
                                        <input type="time" name="masa_mula_majlis" id="masa_mula_majlis" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
                                    </div>
                                </div>

                                <div class="sm:col-span-1">
                                    <label for="masa_tamat_majlis" class="block text-sm font-medium text-gray-900">Masa Tamat</label>
                                    <div class="mt-2">
                                        <input type="time" name="masa_tamat_majlis" id="masa_tamat_majlis" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
                                    </div>
                                </div>

                                <!-- Alamat, Google Maps, Waze -->
                                <div class="sm:col-span-2">
                                    <label for="alamat_majlis" class="block text-sm font-medium text-gray-900">Alamat Majlis</label>
                                    <div class="mt-2">
                                        <textarea name="alamat_majlis" id="alamat_majlis" rows="4" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm"></textarea>
                                    </div>
                                </div>

                                <div class="sm:col-span-1">
                                    <label for="google_url" class="block text-sm font-medium text-gray-900">URL Google Maps</label>
                                    <div class="mt-2">
                                        <input type="text" name="google_url" id="google_url" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
                                    </div>
                                </div>

                                <div class="sm:col-span-1">
                                    <label for="waze_url" class="block text-sm font-medium text-gray-900">URL Waze</label>
                                    <div class="mt-2">
                                        <input type="text" name="waze_url" id="waze_url" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
                                    </div>
                                </div>

                                <!-- Nombor Telefon -->
                                <div class="sm:col-span-2">
                                    <label class="block text-sm font-medium text-gray-900">Nombor Telefon Waris</label>
                                    <div class="mt-2 space-y-2">
                                        @for ($i = 1; $i <= 5; $i++)
                                        <div class="flex space-x-4">
                                            <input type="text" name="nama_{{ $i }}" id="nama_{{ $i }}" placeholder="Nama" maxlength="20" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
                                            <input type="text" name="nombor_telefon_{{ $i }}" id="nombor_telefon_{{ $i }}" placeholder="Nombor Telefon" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
                                        </div>
                                        @endfor
                                    </div>
                                </div>

                                <!-- Aturcara Majlis -->
                                <div class="sm:col-span-2">
                                    <label class="block text-sm font-medium text-gray-900">Aturcara Majlis</label>
                                    <div class="mt-2 space-y-2">
                                        @for ($i = 1; $i <= 6; $i++)
                                        <div class="flex space-x-4">
                                            <input type="time" name="masa_acara_{{ $i }}" id="masa_acara_{{ $i }}" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
                                            <input type="text" name="acara_{{ $i }}" id="acara_{{ $i }}" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
                                        </div>
                                        @endfor
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Accordion Section 3: Others -->
                        <div class="border rounded-md p-4 mb-4">
                            <h2 @click="openSection = openSection === 'others' ? '' : 'others'" class="text-lg underline font-bold cursor-pointer flex justify-between items-center">
                                Lain-lain
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" :class="openSection === 'others' ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </h2>

                            <!-- Show a summary of all sections or additional form fields here -->
                            <div x-show="openSection === 'others'" class="mt-8">
                                <!-- Bg Song Selection -->
                                <div class="sm:col-span-2">
                                    <label for="bg_song_id" class="block text-sm font-medium text-gray-900">Lagu Latar Belakang</label>
                                    <div class="mt-2">
                                        <select id="bg_song_id" name="bg_song_id" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:max-w-xs sm:text-sm">
                                            <option value="1">Irama Klasik Melayu</option>
                                            <option value="2">One Thousand Year</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Displaying all error -->
                        <div class="mt-10">
                            @if($errors->any)
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li class="text-red-500 italic">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-6">
                            <x-primary-button type="submit">Save</x-primary-button>
                        </div>
                    </form>
                    <!-- Form ends -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
