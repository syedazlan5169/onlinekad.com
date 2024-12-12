<x-app-layout>
    <x-slot name="header">
        <h2 class="mb-5 font-semibold  text-gray-800 leading-tight">
            {{ __('Tutorial') }}
        </h2>
        <div class="mb-0 pb-0">
            {{ Breadcrumbs::render('tutorial') }}
        </div>
    </x-slot>

    <div class="py-12">
        <div x-data="{ selectedTab: 'tempah'}" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center">
                <span class="isolate inline-flex rounded-md shadow-sm">
                    <button type="button" @click="selectedTab = 'tempah'"
                     class="relative inline-flex items-center rounded-l-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-10"
                     :class="selectedTab === 'tempah' ? 'text-white bg-indigo-500 ring-indigo-500 hover:bg-indigo-500' : 'text-gray-900 hover:bg-gray-50'"
                     >Tempah</button>
                    <button type="button" @click="selectedTab = 'rsvp'"
                     class="relative -ml-px inline-flex items-center bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-10"
                     :class="selectedTab === 'rsvp' ? 'text-white bg-indigo-500 ring-indigo-500 hover:bg-indigo-500' : 'text-gray-900 hover:bg-gray-50'"
                     >RSVP</button>
                    <button type="button" @click="selectedTab = 'edit'"
                     class="relative -ml-px inline-flex items-center rounded-r-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-10"
                     :class="selectedTab === 'edit' ? 'text-white bg-indigo-500 ring-indigo-500 hover:bg-indigo-500' : 'text-gray-900 hover:bg-gray-50'"
                     >Kemaskini</button>
                </span>
            </div>
            
            <!-- Tempah Tutorial -->
            <div x-show="selectedTab === 'tempah'" class="p-6 text-gray-900">
                <!-- Card Container -->
                <div class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow">
                    <div class="px-4 py-5 sm:px-6">
                        <!-- Content goes here -->
                        <div class="flex gap-3">
                            <div>
                                <span class="inline-flex size-3 rounded-full bg-green-100 p-5 text-2xl font-medium text-green-700 items-center justify-center">1</span>
                            </div>
                            <div class="flex items-center">
                                <p class="text-left mb-0 tutorial-title">Klik <b>Tempah Sekarang</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-5 sm:p-6">
                        <!-- Content goes here -->
                        <img src="{{ asset('images/tempah-1.webp') }}" alt="" />
                    </div>
                </div>
                <div class="mt-5 divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow">
                    <div class="px-4 py-5 sm:px-6">
                        <!-- Content goes here -->
                        <div class="flex gap-3">
                            <div>
                                <span class="inline-flex size-3 rounded-full bg-green-100 p-5 text-2xl font-medium text-green-700 items-center justify-center">2</span>
                            </div>
                            <div class="flex items-center">
                                <p class="text-left mb-0 tutorial-title">Pilih design dan Klik <b>Tempah</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-5 sm:p-6">
                        <!-- Content goes here -->
                        <img src="{{ asset('images/tempah-2.webp') }}" alt="" />
                    </div>
                </div>
                <div class="mt-5 divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow">
                    <div class="px-4 py-5 sm:px-6">
                        <!-- Content goes here -->
                        <div class="flex gap-3">
                            <div>
                                <span class="inline-flex size-3 rounded-full bg-green-100 p-5 text-2xl font-medium text-green-700 items-center justify-center">3</span>
                            </div>
                            <div class="flex items-center">
                                <p class="text-left mb-0 tutorial-title">Isi semua maklumat majlis dan Klik <b>Save</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-5 sm:p-6">
                        <!-- Content goes here -->
                        <img src="{{ asset('images/tempah-3.webp') }}" alt="" />
                    </div>
                </div>
                <div class="mt-5 divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow">
                    <div class="px-4 py-5 sm:px-6">
                        <!-- Content goes here -->
                        <div class="flex gap-3">
                            <div>
                                <span class="inline-flex size-3 rounded-full bg-green-100 p-5 text-2xl font-medium text-green-700 items-center justify-center">4</span>
                            </div>
                            <div class="flex items-center">
                                <p class="text-left mb-0 tutorial-title">Bagi pakej Premium & Deluxe anda perlu membuat pembayaran terlebih dahulu untuk menghilangkan watermark. Klik pada <b>Buat Pembayaran</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-5 sm:p-6">
                        <!-- Content goes here -->
                        <img src="{{ asset('images/tempah-4.webp') }}" alt="" />
                    </div>
                </div>
                <div class="mt-5 divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow">
                    <div class="px-4 py-5 sm:px-6">
                        <!-- Content goes here -->
                        <div class="flex gap-3">
                            <div>
                                <span class="inline-flex size-3 rounded-full bg-green-100 p-5 text-2xl font-medium text-green-700 items-center justify-center">5</span>
                            </div>
                            <div class="flex items-center">
                                <p class="text-left mb-0 tutorial-title">Setelah pembayaran berjaya, klik <b>Senarai Kad</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-5 sm:p-6">
                        <!-- Content goes here -->
                        <img src="{{ asset('images/tempah-5.webp') }}" alt="" />
                    </div>
                </div>
            </div>
            <!-- End of Tempah Tutorial -->

            <!-- RSVP Tutorial -->
            <div x-show="selectedTab === 'rsvp'" class="p-6 text-gray-900">
                <!-- Card Container -->
                <div class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow">
                    <div class="px-4 py-5 sm:px-6">
                        <!-- Content goes here -->
                        <div class="flex gap-3">
                            <div>
                                <span class="inline-flex size-3 rounded-full bg-pink-100 p-5 text-2xl font-medium text-pink-700 items-center justify-center">1</span>
                            </div>
                            <div class="flex items-center">
                                <p class="text-left mb-0 tutorial-title">Klik <b>RSVP</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-5 sm:p-6">
                        <!-- Content goes here -->
                        <img src="{{ asset('images/rsvp-1.webp') }}" alt="" />
                    </div>
                </div>
                <div class="mt-5 divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow">
                    <div class="px-4 py-5 sm:px-6">
                        <!-- Content goes here -->
                        <div class="flex gap-3">
                            <div>
                                <span class="inline-flex size-3 rounded-full bg-pink-100 p-5 text-2xl font-medium text-pink-700 items-center justify-center">2</span>
                            </div>
                            <div class="flex items-center">
                                <p class="text-left mb-0 tutorial-title">Anda boleh mencari nama di ruangan <b>Search</b> dan memuat turun senarai RSVP dalam format Excel dengan klik pada <b>Download</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-5 sm:p-6">
                        <!-- Content goes here -->
                        <img src="{{ asset('images/rsvp-2.webp') }}" alt="" />
                    </div>
                </div>
            </div>
            <!-- End of RSVP Tutorial -->

            <!-- EditTutorial -->
            <div  x-show="selectedTab === 'edit'"class="p-6 text-gray-900">
                <!-- Card Container -->
                <div class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow">
                    <div class="px-4 py-5 sm:px-6">
                        <!-- Content goes here -->
                        <div class="flex gap-3">
                            <div>
                                <span class="inline-flex size-3 rounded-full bg-blue-100 p-5 text-2xl font-medium text-blue-700 items-center justify-center">1</span>
                            </div>
                            <div class="flex items-center">
                                <p class="text-left mb-0 tutorial-title">Klik <b>Edit</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-5 sm:p-6">
                        <!-- Content goes here -->
                        <img src="{{ asset('images/edit-1.webp') }}" alt="" />
                    </div>
                </div>
                <div class="mt-5 divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow">
                    <div class="px-4 py-5 sm:px-6">
                        <!-- Content goes here -->
                        <div class="flex gap-3">
                            <div>
                                <span class="inline-flex size-3 rounded-full bg-blue-100 p-5 text-2xl font-medium text-blue-700 items-center justify-center">2</span>
                            </div>
                            <div class="flex items-center">
                                <p class="text-left mb-0 tutorial-title">Anda boleh membuat sebarang pertukaran maklumat sebelum tarikh majlis dan Klik <b>Save</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-5 sm:p-6">
                        <!-- Content goes here -->
                        <img src="{{ asset('images/edit-2.webp') }}" alt="" />
                    </div>
                </div>
            </div>
            <!-- End of Edit Tutorial -->
        </div>
    </div>
</x-app-layout>
