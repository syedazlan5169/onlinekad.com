<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 leading-tight">
            {{ __('Edit Kad') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    
                <div x-data="{
                 selectedFont: '{{ $kadData->font_id }}', 
                    fonts: {
                        '1': 'Great Vibes',
                        '2': 'Dancing Script',
                        '3': 'Alex Brush',
                        '4': 'Parisienne',
                    },
                 openSection: 'maklumat_pengantin', namaLelaki: '{{ $kadData->nama_panggilan_lelaki }}', namaPerempuan: '{{ $kadData->nama_panggilan_perempuan }}' }" class="max-w-7xl mx-auto p-8">
                    <!-- Form starts -->
                    <form action="/kad-update/{{ $kadData->id }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <!-- Accordion Section 1: Maklumat Pengantin -->
                        <div class="border rounded-md p-4 mb-4">
                            <h2 @click="openSection = openSection === 'maklumat_pengantin' ? '' : 'maklumat_pengantin'" class="text-lg underline font-bold cursor-pointer flex justify-between items-center">
                                Maklumat Pengantin
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" :class="openSection === 'maklumat_pengantin' ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </h2>
                            <div x-show="openSection === 'maklumat_pengantin'" x-data="{ penjemput: '{{ $kadData->penjemput }}' }" class="mt-8 grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <input type="hidden" name="design_id" id="design_id" value="{{ $kadData->design->id }}">
                                <div>
                                    <div class="sm:col-span-3">
                                        <label for="nama_penuh_lelaki" class="block text-sm font-medium leading-6 text-gray-900">Nama Penuh Pengantin Lelaki</label>
                                        <div class="mt-2">
                                        <input type="text" name="nama_penuh_lelaki" id="nama_penuh_lelaki" value="{{ $kadData->nama_penuh_lelaki }}" spellcheck="false" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                    <div class="sm:col-span-3">
                                        <label for="nama_panggilan_lelaki" class="block text-sm font-medium leading-6 text-gray-900">Nama Panggilan Pengantin Lelaki</label>
                                        <div class="mt-2">
                                        <input x-model="namaLelaki" type="text" name="nama_panggilan_lelaki" id="nama_panggilan_lelaki" maxlength="12" spellcheck="false" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="sm:col-span-3">
                                        <label for="nama_penuh_perempuan" class="block text-sm font-medium leading-6 text-gray-900">Nama Penuh Pengantin Perempuan</label>
                                        <div class="mt-2">
                                        <input type="text" name="nama_penuh_perempuan" id="nama_penuh_perempuan" value="{{ $kadData->nama_penuh_perempuan }}" spellcheck="false" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                    <div class="sm:col-span-3">
                                        <label for="nama_panggilan_perempuan" class="block text-sm font-medium leading-6 text-gray-900">Nama Panggilan Pengantin Perempuan</label>
                                        <div class="mt-2">
                                        <input x-model="namaPerempuan" type="text" name="nama_panggilan_perempuan" id="nama_panggilan_perempuan" maxlength="12" spellcheck="false"class="block w-full rounded-md border-0 py-1.5 text-gray-900 text-l shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="sm:col-span-4">
                                    <!-- Preview Box for nama_panggilan_lelaki & nama_panggilan_perempuan -->
                                    <div class="sm:col-span-6 mt-4">
                                        <div class="text-center">
                                            <p class="text-4xl" :style="{ fontFamily: fonts[selectedFont] }">
                                                <!-- Name of the groom (stacked) -->
                                                <span x-text="namaLelaki"></span>
                                            </p>
                                            <p class="text-4xl" :style="{ fontFamily: fonts[selectedFont] }">
                                                <!-- Ampersand -->
                                                &
                                            </p>
                                            <p class="text-4xl" :style="{ fontFamily: fonts[selectedFont] }">
                                                <!-- Name of the bride (stacked) -->
                                                <span x-text="namaPerempuan"></span>
                                            </p>
                                        </div>
                                    </div>
                                    <label for="font" class="block text-sm font-medium leading-6 text-gray-900">Font</label>
                                    <div class="mt-2">
                                        <select id="font" name="font" x-model='selectedFont' class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                            <option value="1">
                                                Great Vibes
                                            </option>
                                            <option value="2">
                                                Dancing Script                                                
                                            </option>
                                            <option value="3">
                                                Alex Brush 
                                            </option>
                                            <option value="4">
                                                Parisienne 
                                            </option>
                                        </select>
                                    </div>
                                </div>                                           

                                <div class="sm:col-span-4">
                                    <label for="penjemput" class="block text-sm font-medium leading-6 text-gray-900">Penjemput</label>
                                    <div class="mt-2">
                                        <select x-model="penjemput" id="penjemput" name="penjemput" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                            <option value="1">Pihak Lelaki</option>
                                            <option value="2">Pihak Perempuan</option>
                                            <option value="3">Dua Belah Pihak</option>
                                        </select>
                                    </div>
                                </div>
                            
                                <!-- Show fields when penjemput is 1 or 3 -->
                                <div x-show="penjemput === '3' || penjemput === '1'">
                                    <div class="sm:col-span-3">
                                        <label for="nama_bapa_pengantin_lelaki" class="block text-sm font-medium leading-6 text-gray-900">Nama Bapa Pengantin Lelaki</label>
                                        <div class="mt-2">
                                            <input type="text" name="nama_bapa_pengantin_lelaki" value="{{ $kadData->nama_bapa_pengantin_lelaki }}" spellcheck="false" id="nama_bapa_pengantin_lelaki" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                            
                                    <div class="sm:col-span-3">
                                        <label for="nama_ibu_pengantin_lelaki" class="block text-sm font-medium leading-6 text-gray-900">Nama Ibu Pengantin Lelaki</label>
                                        <div class="mt-2">
                                            <input type="text" name="nama_ibu_pengantin_lelaki" id="nama_ibu_pengantin_lelaki" value="{{ $kadData->nama_ibu_pengantin_lelaki }}" spellcheck="false" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                </div>
                            
                                <!-- Show fields when penjemput is 2 or 3 -->
                                <div x-show="penjemput === '3' || penjemput === '2'">
                                    <div class="sm:col-span-3">
                                        <label for="nama_bapa_pengantin_perempuan" class="block text-sm font-medium leading-6 text-gray-900">Nama Bapa Pengantin Perempuan</label>
                                        <div class="mt-2">
                                            <input type="text" name="nama_bapa_pengantin_perempuan" id="nama_bapa_pengantin_perempuan" value="{{ $kadData->nama_bapa_pengantin_perempuan }}" spellcheck="false" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                            
                                    <div class="sm:col-span-3">
                                        <label for="nama_ibu_pengantin_perempuan" class="block text-sm font-medium leading-6 text-gray-900">Nama Ibu Pengantin Perempuan</label>
                                        <div class="mt-2">
                                            <input type="text" name="nama_ibu_pengantin_perempuan" id="nama_ibu_pengantin_perempuan" value="{{ $kadData->nama_ibu_pengantin_perempuan }}" spellcheck="false" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
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
                            <div x-show="openSection === 'maklumat_majlis'" class="mt-8 grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                <div class="sm:col-span-3">
                                    <label for="tajuk_kad" class="block text-sm font-medium leading-6 text-gray-900">Tajuk Kad</label>
                                    <div class="mt-2">
                                    <input type="text" name="tajuk_kad" id="tajuk_kad" spellcheck="false" value="Walimatulurus" value="{{ $kadData->tajuk_kad }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="ayat_jemputan" class="block text-sm font-medium leading-6 text-gray-900">Ayat Jemputan</label>
                                    <div class="mt-2">
                                    <textarea name="ayat_jemputan" id="ayat_jemputan" rows="4" spellcheck="false" style="text-transform: uppercase;" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $kadData->ayat_jemputan }}</textarea>
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="doa_pengantin" class="block text-sm font-medium leading-6 text-gray-900">Doa Pengantin</label>
                                    <div class="mt-2">
                                    <textarea name="doa_pengantin" id="doa_pengantin" rows="4" spellcheck="false" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $kadData->doa_pengantin }}</textarea>
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="tarikh_majlis" class="block text-sm font-medium leading-6 text-gray-900">Tarikh Majlis</label>
                                    <div class="mt-2">
                                    <input type="date" name="tarikh_majlis" id="tarikh_majlis" value="{{ \Carbon\Carbon::parse($kadData->tarikh_majlis)->format('Y-m-d') }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>                                          

                                <div class="sm:col-span-3">
                                    <label for="masa_mula_majlis" class="block text-sm font-medium leading-6 text-gray-900">Masa Mula</label>
                                    <div class="mt-2">
                                    <input type="time" name="masa_mula_majlis" id="masa_mula_majlis" value="{{ $kadData->masa_mula_majlis }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="masa_tamat_majlis" class="block text-sm font-medium leading-6 text-gray-900">Masa Tamat</label>
                                    <div class="mt-2">
                                    <input type="time" name="masa_tamat_majlis" id="masa_tamat_majlis" value="{{ $kadData->masa_tamat_majlis }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="alamat_majlis" class="block text-sm font-medium leading-6 text-gray-900">Alamat Majlis</label>
                                    <div class="mt-2">
                                    <textarea name="alamat_majlis" id="alamat_majlis" rows="4" spellcheck="false" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $kadData->alamat_majlis }}</textarea>
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="google_url" class="block text-sm font-medium leading-6 text-gray-900">URL Google Maps</label>
                                    <div class="mt-2">
                                    <input type="text" name="google_url" id="google_url" value="{{ $kadData->google_url }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="waze_url" class="block text-sm font-medium leading-6 text-gray-900">URL Waze</label>
                                    <div class="mt-2">
                                    <input type="text" name="waze_url" id="waze_url" value="{{ $kadData->waze_url }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label class="block text-sm font-medium leading-6 text-gray-900">Nombor Telefon Waris</label>
                                    <div class="mt-2">
                                        <!-- First Entry -->
                                        <div class="flex space-x-4 mb-1">
                                            <input type="text" name="nama_1" id="nama_1" value="{{ $kadData->nombor_telefon[0]['nama'] ?? '' }}" placeholder="Nama" maxlength="20" spellcheck="false" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <input type="text" name="nombor_telefon_1" id="nombor_telefon_1" value="{{ $kadData->nombor_telefon[0]['nombor_telefon'] ?? '' }}" placeholder="Nombor Telefon" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                
                                        <!-- Second Entry -->
                                        <div class="flex space-x-4 mb-1">
                                            <input type="text" name="nama_2" id="nama_2" value="{{ $kadData->nombor_telefon[1]['nama'] ?? '' }}" placeholder="Nama" maxlength="20" spellcheck="false" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <input type="text" name="nombor_telefon_2" id="nombor_telefon_2" value="{{ $kadData->nombor_telefon[1]['nombor_telefon'] ?? '' }}" placeholder="Nombor Telefon" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                
                                        <!-- Third Entry -->
                                        <div class="flex space-x-4 mb-1">
                                            <input type="text" name="nama_3" id="nama_3" value="{{ $kadData->nombor_telefon[2]['nama'] ?? '' }}" placeholder="Nama" maxlength="20" spellcheck="false" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <input type="text" name="nombor_telefon_3" id="nombor_telefon_3" value="{{ $kadData->nombor_telefon[2]['nombor_telefon'] ?? '' }}" placeholder="Nombor Telefon" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                
                                        <!-- Fourth Entry -->
                                        <div class="flex space-x-4 mb-1">
                                            <input type="text" name="nama_4" id="nama_4" value="{{ $kadData->nombor_telefon[3]['nama'] ?? '' }}" placeholder="Nama" maxlength="20" spellcheck="false" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <input type="text" name="nombor_telefon_4" id="nombor_telefon_4" value="{{ $kadData->nombor_telefon[3]['nombor_telefon'] ?? '' }}" placeholder="Nombor Telefon" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>

                                        <!-- Fifth Entry -->
                                        <div class="flex space-x-4 mb-1">
                                            <input type="text" name="nama_5" id="nama_5" value="{{ $kadData->nombor_telefon[4]['nama'] ?? '' }}" placeholder="Nama" maxlength="20" spellcheck="false" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <input type="text" name="nombor_telefon_5" id="nombor_telefon_5" value="{{ $kadData->nombor_telefon[4]['nombor_telefon'] ?? '' }}" placeholder="Nombor Telefon" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="sm:col-span-3">
                                    <label class="block text-sm font-medium leading-6 text-gray-900">Aturcara Majlis</label>
                                    <div class="mt-2">
                                        <!-- First Entry -->
                                        <div class="flex space-x-4 mb-1">
                                            <input type="time" name="masa_acara_1" id="masa_acara_1" value="{{ $kadData->aturcara_majlis[0]['masa_acara'] ?? '' }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <input type="text" name="acara_1" id="acara_1" spellcheck="false" value="{{ $kadData->aturcara_majlis[0]['acara'] ?? '' }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                
                                        <!-- Second Entry -->
                                        <div class="flex space-x-4 mb-1">
                                            <input type="time" name="masa_acara_2" id="masa_acara_2" value="{{ $kadData->aturcara_majlis[1]['masa_acara'] ?? '' }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <input type="text" name="acara_2" id="acara_2" spellcheck="false" value="{{ $kadData->aturcara_majlis[1]['acara'] ?? '' }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                
                                        <!-- Third Entry -->
                                        <div class="flex space-x-4 mb-1">
                                            <input type="time" name="masa_acara_3" id="masa_acara_3" value="{{ $kadData->aturcara_majlis[2]['masa_acara'] ?? '' }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <input type="text" name="acara_3" id="acara_3" spellcheck="false" value="{{ $kadData->aturcara_majlis[2]['acara'] ?? '' }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                
                                        <!-- Fourth Entry -->
                                        <div class="flex space-x-4 mb-1">
                                            <input type="time" name="masa_acara_4" id="masa_acara_4" value="{{ $kadData->aturcara_majlis[3]['masa_acara'] ?? '' }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <input type="text" name="acara_4" id="acara_4" spellcheck="false" value="{{ $kadData->aturcara_majlis[3]['acara'] ?? '' }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                
                                        <!-- Fifth Entry -->
                                        <div class="flex space-x-4 mb-1">
                                            <input type="time" name="masa_acara_5" id="masa_acara_5" value="{{ $kadData->aturcara_majlis[4]['masa_acara'] ?? '' }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <input type="text" name="acara_5" id="acara_5" spellcheck="false" value="{{ $kadData->aturcara_majlis[4]['acara'] ?? '' }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                
                                        <!-- Sixth Entry -->
                                        <div class="flex space-x-4 mb-1">
                                            <input type="time" name="masa_acara_6" id="masa_acara_6" value="{{ $kadData->aturcara_majlis[5]['masa_acara'] ?? '' }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <input type="text" name="acara_6" id="acara_6" spellcheck="false" value="{{ $kadData->aturcara_majlis[5]['acara'] ?? '' }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                </div>
                                                                        

                            </div>
                        </div>
                
                        <!-- Accordion Section 3: Review Information -->
                        <div class="border rounded-md p-4 mb-4">
                            <h2 @click="openSection = openSection === 'others' ? '' : 'others'" class="text-lg underline font-bold cursor-pointer flex justify-between items-center">
                                Lain-lain 
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" :class="openSection === 'others' ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </h2>
                            <div x-show="openSection === 'others'" class="mt-8">
                                <!-- Show a summary of all sections or additional form fields here -->
                                <input type="text">
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
