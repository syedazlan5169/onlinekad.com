<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tempah') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    
                <div x-data="{ openSection: 'personal' }" class="max-w-7xl mx-auto p-8">
                    <!-- Form starts -->
                    <form action="{{ route('tempah') }}" method="POST">
                        @csrf
                        <!-- Accordion Section 1: Maklumat Pengantin -->
                        <div class="border rounded-md p-4 mb-4">
                            <h2 @click="openSection = openSection === 'maklumat_pengantin' ? '' : 'maklumat_pengantin'" class="text-lg font-bold cursor-pointer">
                                Maklumat Pengantin
                            </h2>
                            <div x-show="openSection === 'maklumat_pengantin'" x-data="{ penjemput: '1' }" class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                <div>
                                    <div class="sm:col-span-3">
                                        <label for="nama_penuh_lelaki" class="block text-sm font-medium leading-6 text-gray-900">Nama Penuh Pengantin Lelaki</label>
                                        <div class="mt-2">
                                        <input type="text" name="nama_penuh_lelaki" id="nama_penuh_lelaki" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                    <div class="sm:col-span-3">
                                        <label for="nama_panggilan_lelaki" class="block text-sm font-medium leading-6 text-gray-900">Nama Panggilan Pengantin Lelaki</label>
                                        <div class="mt-2">
                                        <input type="text" name="nama_panggilan_lelaki" id="nama_panggilan_lelaki" maxlength="12" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="sm:col-span-3">
                                        <label for="nama_penuh_perempuan" class="block text-sm font-medium leading-6 text-gray-900">Nama Penuh Pengantin Perempuan</label>
                                        <div class="mt-2">
                                        <input type="text" name="nama_penuh_perempuan" id="nama_penuh_perempuan" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                    <div class="sm:col-span-3">
                                        <label for="nama_panggilan_perempuan" class="block text-sm font-medium leading-6 text-gray-900">Nama Panggilan Pengantin Perempuan</label>
                                        <div class="mt-2">
                                        <input type="text" name="nama_panggilan_perempuan" id="nama_panggilan_perempuan" maxlength="12" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="sm:col-span-4">
                                    <label for="font" class="block text-sm font-medium leading-6 text-gray-900">Font</label>
                                    <div class="mt-2">
                                        <select id="font" name="font" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                            <option value="1">
                                                Cinzel Decorative
                                            </option>
                                            <option value="2">
                                                Great Vibes
                                            </option>
                                            <option value="3">
                                                Marck Script
                                            </option>
                                            <option value="4">
                                                Libre Caslon Text
                                            </option>
                                            <option value="5">
                                                Kaushan Script
                                            </option>
                                            <option value="6">
                                                La-Graziela
                                            </option>
                                            <option value="7">
                                                Julietta Messie
                                            </option>
                                            <option value="8">
                                                Hearthway
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
                                            <input type="text" name="nama_bapa_pengantin_lelaki" id="nama_bapa_pengantin_lelaki" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                            
                                    <div class="sm:col-span-3">
                                        <label for="nama_ibu_pengantin_lelaki" class="block text-sm font-medium leading-6 text-gray-900">Nama Ibu Pengantin Lelaki</label>
                                        <div class="mt-2">
                                            <input type="text" name="nama_ibu_pengantin_lelaki" id="nama_ibu_pengantin_lelaki" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                </div>
                            
                                <!-- Show fields when penjemput is 2 or 3 -->
                                <div x-show="penjemput === '3' || penjemput === '2'">
                                    <div class="sm:col-span-3">
                                        <label for="nama_bapa_pengantin_perempuan" class="block text-sm font-medium leading-6 text-gray-900">Nama Bapa Pengantin Perempuan</label>
                                        <div class="mt-2">
                                            <input type="text" name="nama_bapa_pengantin_perempuan" id="nama_bapa_pengantin_perempuan" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                            
                                    <div class="sm:col-span-3">
                                        <label for="nama_ibu_pengantin_perempuan" class="block text-sm font-medium leading-6 text-gray-900">Nama Ibu Pengantin Perempuan</label>
                                        <div class="mt-2">
                                            <input type="text" name="nama_ibu_pengantin_perempuan" id="nama_ibu_pengantin_perempuan" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                
                        <!-- Accordion Section 2: Contact Information -->
                        <div class="border rounded-md p-4 mb-4">
                            <h2 @click="openSection = openSection === 'maklumat_majlis' ? '' : 'maklumat_majlis'" class="text-lg font-bold cursor-pointer">
                                Maklumat Majlis
                            </h2>
                            <div x-show="openSection === 'maklumat_majlis'" class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                <div class="sm:col-span-3">
                                    <label for="tajuk_kad" class="block text-sm font-medium leading-6 text-gray-900">Tajuk Kad</label>
                                    <div class="mt-2">
                                    <input type="text" name="tajuk_kad" id="tajuk_kad" placeholder="Walimatulurus" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="tarikh_majlis" class="block text-sm font-medium leading-6 text-gray-900">Tarikh Majlis</label>
                                    <div class="mt-2">
                                    <input type="date" name="tarikh_majlis" id="tarikh_majlis" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>                                          

                                <div class="sm:col-span-3">
                                    <label for="masa_mula_majlis" class="block text-sm font-medium leading-6 text-gray-900">Masa Mula</label>
                                    <div class="mt-2">
                                    <input type="time" name="masa_mula_majlis" id="masa_mula_majlis" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="masa_tamat_majlis" class="block text-sm font-medium leading-6 text-gray-900">Masa Tamat</label>
                                    <div class="mt-2">
                                    <input type="time" name="masa_tamat_majlis" id="masa_tamat_majlis" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="alamat_majlis" class="block text-sm font-medium leading-6 text-gray-900">Alamat Majlis</label>
                                    <div class="mt-2">
                                    <textarea name="alamat_majlis" id="alamat_majlis" rows="4" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="google_url" class="block text-sm font-medium leading-6 text-gray-900">URL Google Maps</label>
                                    <div class="mt-2">
                                    <input type="text" name="google_url" id="google_url" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="waze_url" class="block text-sm font-medium leading-6 text-gray-900">URL Waze</label>
                                    <div class="mt-2">
                                    <input type="text" name="waze_url" id="waze_url" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label class="block text-sm font-medium leading-6 text-gray-900">Nombor Telefon Waris</label>
                                    <div class="mt-2">
                                        <div class="flex space-x-4 mb-1">
                                            <input type="text" name="nama_1" id="nama_1" placeholder="Nama" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <input type="text" name="nombor_telefon_1" id="nombor_telefon_1" placeholder="Nombor Telefon" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                        <div class="flex space-x-4 mb-1">
                                            <input type="text" name="nama_2" id="nama_2" placeholder="Nama" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <input type="text" name="nombor_telefon_2" id="nombor_telefon_2" placeholder="Nombor Telefon" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                        <div class="flex space-x-4 mb-1">
                                            <input type="text" name="nama_3" id="nama_3" placeholder="Nama" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <input type="text" name="nombor_telefon_3" id="nombor_telefon_3" placeholder="Nombor Telefon" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                        <div class="flex space-x-4 mb-1">
                                            <input type="text" name="nama_4" id="nama_4" placeholder="Nama" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <input type="text" name="nombor_telefon_4" id="nombor_telefon_4" placeholder="Nombor Telefon" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                        <div class="flex space-x-4">
                                            <input type="text" name="nama_5" id="nama_5" placeholder="Nama" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <input type="text" name="nombor_telefon_5" id="nombor_telefon_5" placeholder="Nombor Telefon" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label class="block text-sm font-medium leading-6 text-gray-900">Aturcara Majlis</label>
                                    <div class="mt-2">
                                        <div class="flex space-x-4 mb-1">
                                            <input type="time" name="masa_acara_1" id="masa_acara_1" value="10:00" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <input type="text" name="acara_1" id="acara_1" value="Majlis Bermula" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                        <div class="flex space-x-4 mb-1">
                                            <input type="time" name="masa_acara_2" id="masa_acara_2" value="12:30" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <input type="text" name="acara_2" id="acara_2" value="Ketibaan Pengantin" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                        <div class="flex space-x-4 mb-1">
                                            <input type="time" name="masa_acara_3" id="masa_acara_3" value="17:00" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <input type="text" name="acara_3" id="acara_3" value="Majlis Bersurai" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                        <div class="flex space-x-4 mb-1">
                                            <input type="time" name="masa_acara_4" id="masa_acara_4" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <input type="text" name="acara_4" id="acara_4" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                        <div class="flex space-x-4 mb-1">
                                            <input type="time" name="masa_acara_5" id="masa_acara_5" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <input type="text" name="acara_5" id="acara_5" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                        <div class="flex space-x-4 mb-1">
                                            <input type="time" name="masa_acara_6" id="masa_acara_6" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <input type="text" name="acara_6" id="acara_6" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>

                                    </div>
                                </div>                                           

                            </div>
                        </div>
                
                        <!-- Accordion Section 3: Review Information -->
                        <div class="border rounded-md p-4 mb-4">
                            <h2 @click="openSection = openSection === 'review' ? '' : 'review'" class="text-lg font-bold cursor-pointer">
                                Review Your Information
                            </h2>
                            <div x-show="openSection === 'review'" class="mt-4">
                                <!-- Show a summary of all sections or additional form fields here -->
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
                            <x-primary-button type="submit">Tempah</x-primary-button>
                        </div>
                    </form>
                    <!-- Form ends -->
                </div>
                
                
                
            </div>
        </div>
    </div>
    
</x-app-layout>
