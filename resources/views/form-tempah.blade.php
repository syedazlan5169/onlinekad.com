<x-app-layout>
    <x-slot name="header">
        <h2 class="mb-5 font-semibold text-gray-800 leading-tight">
            {{ __('Tempah') }}
        </h2>
        <div>
            {{ Breadcrumbs::render('form-tempah', $id) }}
        </div>
    </x-slot>

    <div class="py-12">
        <div x-data="{ selectedPackage: '{{ old('package-id', 2) }}' }" class="max-w-7xl mx-auto lg:flex lg:justify-center gap-3 lg:px-6">
            <!-- Column 1 -->
            <div class="h-full lg:w-[30%] lg:pr-4">


                <!-- Design Section -->
                <div class="mb-4 p-8 bg-white shadow-lg rounded-lg overflow-hidden">
                                    <!-- Displaying all error Mobile -->
                <div class="mb-4 lg:hidden">
                    @if($errors->any)
                        <ul>
                            @foreach($errors->all() as $error)
                                <li class="text-red-500 italic">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                    <div class="rounded-xl p-8 ring-1 ring-gray-200">
                        <!-- Product Image -->
                        <div class="h-full w-full overflow-hidden lg:h-40">
                            <img src="{{ asset($design->product_image_url) }}" alt="{{ $design->design_code }}"
                                class="h-full w-full object-cover object-center group-hover:opacity-90 transition-opacity duration-300">
                        </div>

                        <!-- Product Title -->
                        <h3 class="my-4 text-center font-bold text-gray-800 text-2xl">
                            {{ $design->design_code }}
                        </h3>

                        <div class="flex flex-col items-center space-y-2 pb-4 px-4">
                            <!-- Tukar Design -->
                            <x-primary-button href="{{ route('katalog.show') }}" 
                                class="w-full text-center py-2 bg-indigo-600 hover:bg-indigo-500 text-white rounded-lg shadow-md">
                                Tukar Design 
                            </x-primary-button>
                        </div>
                    </div>
                </div>

                <!-- Package Section -->
                <div class="mb-4 p-8 bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="rounded-xl px-6 py-3 ring-1 ring-gray-200 xl:px-8 xl:py-4">
                        <fieldset x-model="selectedPackage">
                            <div class="mt-3 flex items-center justify-center space-x-3">
                                <!-- Active and Checked: "ring ring-offset-1" -->
                                <label 
                                    aria-label="{{ $package1->name }}" 
                                    class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 text-pink-500 ring-current focus:outline-none"
                                    :class="{ 'ring ring-offset-1': selectedPackage == 1}"
                                    @click="selectedPackage = '1'">
                                    <input type="radio" name="color-choice" value="1" class="sr-only">
                                    <span aria-hidden="true" class="h-8 w-14 rounded-full border border-black border-opacity-10 bg-current flex items-center justify-center">
                                        <span class="text-sm text-white font-bold">{{ $package1->name }}</span>
                                    </span>
                                </label>
                                <!-- Active and Checked: "ring ring-offset-1" -->
                                <label 
                                    aria-label="{{ $package2->name }}" 
                                    class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 text-purple-500 ring-current focus:outline-none"
                                    :class="{ 'ring ring-offset-1': selectedPackage == 2}"
                                    @click="selectedPackage = '2'">
                                    <input type="radio" name="color-choice" value="2" class="sr-only">
                                    <span aria-hidden="true" class="h-8 w-14 rounded-full border border-black border-opacity-10 bg-current flex items-center justify-center">
                                        <span class="text-sm text-white font-bold">{{ $package2->name }}</span>
                                    </span>
                                </label>
                                <!-- Active and Checked: "ring ring-offset-1" -->
                                <label 
                                    aria-label="{{ $package3->name }}" 
                                    class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 text-green-500 ring-current focus:outline-none"
                                    :class="{ 'ring ring-offset-1': selectedPackage == 3}"
                                    @click="selectedPackage = '3'">
                                    <input type="radio" name="color-choice" value="3" class="sr-only">
                                    <span aria-hidden="true" class="h-8 w-14 rounded-full border border-black border-opacity-10 bg-current flex items-center justify-center">
                                        <span class="text-sm text-white font-bold">{{ $package3->name }}</span>
                                    </span>
                                </label>
                            </div>
                        </fieldset>
                        
                        <div x-show="selectedPackage === '1'">
                            <p class="mt-8 text-lg line-through text-center leading-6 text-gray-600">RM29</p>
                            <p class="mt-0 flex items-center justify-center gap-x-1">
                            <span class="text-xl font-semibold leading-6 text-gray-600">RM</span>
                            <span class="text-5xl font-bold tracking-tight text-pink-500">{{ $package1->price }}</span>
                            </p>
                            <ul role="list" class="mt-8 space-y-3 text-sm leading-6 text-gray-600 xl:mt-5">
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-pink-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                </svg>
                                Kad jemputan digital
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-pink-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                </svg>
                                Fungsi Guestbook
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-pink-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                </svg>
                                Fungsi Whatsapp & Panggilan 
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-pink-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                </svg>
                                Fungsi Google Calendar & Apple Calendar
                            </li>
                            </ul>
                        </div>
                         <div x-show="selectedPackage === '2'">
                            <p class="mt-8 text-lg line-through text-center leading-6 text-gray-600">RM69</p>
                            <p class="mt-0 flex items-center justify-center gap-x-1">
                            <span class="text-xl font-semibold leading-6 text-gray-600">RM</span>
                            <span class="text-5xl font-bold tracking-tight text-purple-500">{{ $package2->price }}</span>
                            </p>
                            <ul role="list" class="mt-8 space-y-3 text-sm leading-6 text-gray-600 xl:mt-5">
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-purple-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                </svg>
                                Semua fungsi pakej Ratna 
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-purple-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                </svg>
                                Fungsi Google Map & Waze
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-purple-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                </svg>
                                Fungsi RSVP
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-purple-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                </svg>
                                Gambar Slideshow
                            </li>
                            </ul>
                        </div>
                        <div x-show="selectedPackage === '3'">
                            <p class="mt-8 text-lg line-through text-center leading-6 text-gray-600">RM89</p>
                            <p class="flex items-center justify-center gap-x-1">
                            <span class="text-xl font-semibold leading-6 text-gray-600">RM</span>
                            <span class="text-5xl font-bold tracking-tight text-green-500">{{ $package3->price }}</span>
                            </p>
                            <ul role="list" class="mt-8 space-y-3 text-sm leading-6 text-gray-600 xl:mt-5">
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-green-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                </svg>
                                Semua fungsi pakej Kirana
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-green-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                </svg>
                                Fungsi Muzik Latar Belakang
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-green-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                </svg>
                                Option untuk 2 pasangan dalam 1 kad
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-green-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                </svg>
                                Fungsi Money Gift
                            </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column 2 -->
            <div class="bg-white h-full overflow-hidden shadow-lg lg:rounded-lg lg:w-[70%]">
                <div x-data="{
                    selectedFont: '1', 
                    fonts: {
                        @foreach($fonts as $font)
                            '{{ $font->id }}': '{{ $font->font_name }}',
                        @endforeach
                    },
                    openSection: 'maklumatPengantin', 
                    namaLelaki: '', 
                    namaPerempuan: '',
                    namaPasanganPertama: '',
                    namaPasanganKedua:''}" class="max-w-7xl mx-auto p-8">
                    
                    <!-- Form starts -->
                    <form action="{{ route('tempah') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input class="hidden" name="design-id" id="design-id" value="{{ $design->id }}">
                        <input class="hidden" name="package-id" id="package-id" :value="selectedPackage">
                        <!-- Accordion Section 1: Maklumat Pengantin -->
                        <div class="border rounded-md p-4 mb-4">
                            <h2 @click="openSection = openSection === 'maklumatPengantin' ? '' : 'maklumatPengantin'" class="text-lg underline font-bold cursor-pointer flex justify-between items-center">
                                Maklumat Pengantin
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" :class="openSection === 'maklumat_pengantin' ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </h2>
                            

                            <!-- Maklumat Pengantin Fields -->
                            <div x-show="openSection === 'maklumatPengantin'" x-data="{ penjemput: '1', duaPasanganIsOn: false}" class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">

                                <!-- Radio Button Bahasa -->
                                <div class="lg:col-span-2">
                                    <fieldset>
                                        <div class="mb-4 space-y-2 lg:flex lg:items-center lg:space-x-10 lg:space-y-0">
                                            <div class="flex items-center">
                                                <input id="malay" name="bahasa" type="radio" value="0" checked class="relative size-4 appearance-none rounded-full border border-gray-300 bg-white before:absolute before:inset-1 before:rounded-full before:bg-white checked:border-indigo-600 checked:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:before:bg-gray-400 forced-colors:appearance-auto forced-colors:before:hidden [&:not(:checked)]:before:hidden">
                                                <label for="malay" class="ml-3 block text-sm/6 font-medium text-gray-900">Bahasa Malaysia</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="english" name="bahasa" type="radio" value="1" class="relative size-4 appearance-none rounded-full border border-gray-300 bg-white before:absolute before:inset-1 before:rounded-full before:bg-white checked:border-indigo-600 checked:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:before:bg-gray-400 forced-colors:appearance-auto forced-colors:before:hidden [&:not(:checked)]:before:hidden">
                                                <label for="english" class="ml-3 block text-sm/6 font-medium text-gray-900">English</label>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                
                                <!-- Dua Pasangan Toggle -->
                                <div x-data="{ enabled: false }" x-show="selectedPackage === '3'" class="lg:col-span-2">
                                    <!-- Button Element -->
                                    <button 
                                        @click="enabled = !enabled; duaPasanganIsOn = enabled; penjemput = duaPasanganIsOn ? '4' : '2'" 
                                        :class="enabled ? 'bg-indigo-600' : 'bg-gray-200'" 
                                        type="button" 
                                        class="mb-2 relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2" 
                                        role="switch" 
                                        :aria-checked="enabled.toString()"
                                    >
                                        <!-- Toggle Circle -->
                                        <span 
                                            :class="enabled ? 'translate-x-5' : 'translate-x-0'" 
                                            class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"
                                            aria-hidden="true"
                                        ></span>
                                    </button>

                                    
                                    <!-- Label Text -->
                                    <span class="ml-3 text-sm" id="dua-pasangan-is-on">
                                        <span class="font-medium text-gray-900">Dua Pasangan</span>
                                    </span>
                                    <input type="hidden" name="dua-pasangan-is-on" :value="enabled ? 1 : 0">
                                </div>

                                <!-- Nama Penuh Lelaki -->
                                <template x-if="duaPasanganIsOn == false">
                                    <div class="lg:col-span-1">
                                        <label for="nama-penuh-lelaki" class="block text-sm font-medium text-gray-900">Nama Penuh Pengantin Lelaki</label>
                                        <div class="mt-2">
                                            <input type="text" name="nama-penuh-lelaki" id="nama-penuh-lelaki" placeholder="Muhammad Adam Bin Abdul Rahim" value="{{ old('nama-penuh-lelaki') }}" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 lg:text-sm">
                                        </div>
                                    </div>
                                </template>
                                <template x-if="duaPasanganIsOn == true">
                                    <div class="lg:col-span-1">
                                        <label for="nama-penuh-pasangan-pertama" class="block text-sm font-medium text-gray-900">Nama Penuh Pasangan Pertama</label>
                                        <div class="mt-2">
                                            <input type="text" name="nama-penuh-pasangan-pertama" id="nama-penuh-pasangan-pertama" placeholder="Muhammad Adam & Nurul Hawa" value="{{ old('nama-penuh-pasangan-pertama') }}" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 lg:text-sm">
                                        </div>
                                    </div>
                                </template>


                                <!-- Nama Panggilan Lelaki -->
                                <template x-if="duaPasanganIsOn == false">
                                    <div class="lg:col-span-1">
                                        <label for="nama-panggilan-lelaki" class="block text-sm font-medium text-gray-900">Nama Panggilan Pengantin Lelaki</label>
                                        <div class="mt-2">
                                            <input 
                                                x-model="namaLelaki" 
                                                x-init="namaLelaki = '{{ old('nama-panggilan-lelaki') }}'" 
                                                type="text" 
                                                name="nama-panggilan-lelaki" 
                                                id="nama-panggilan-lelaki" 
                                                maxlength="12" 
                                                spellcheck="false" 
                                                placeholder="Adam" 
                                                class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 lg:text-sm">
                                        </div>
                                    </div>
                                </template>
                                <template x-if="duaPasanganIsOn == true">
                                    <div class="lg:col-span-1">
                                        <label for="nama-panggilan-pasangan-pertama" class="block text-sm font-medium text-gray-900">Nama Panggilan Pasangan Pertama</label>
                                        <div class="mt-2">
                                            <input 
                                                x-model="namaPasanganPertama" 
                                                x-init="namaPasanganPertama = '{{ old('nama-panggilan-pasangan-pertama') }}'" 
                                                type="text" 
                                                name="nama-panggilan-pasangan-pertama" 
                                                id="nama-panggilan-pasangan-pertama" 
                                                maxlength="24" 
                                                spellcheck="false" 
                                                placeholder="Adam & Hawa" 
                                                class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 lg:text-sm">
                                        </div>
                                    </div>
                                </template>

                                <!-- Nama Penuh Perempuan -->
                                <template x-if="duaPasanganIsOn == false">
                                    <div class="lg:col-span-1">
                                        <label for="nama-penuh-perempuan" class="block text-sm font-medium text-gray-900">Nama Penuh Pengantin Perempuan</label>
                                        <div class="mt-2">
                                            <input type="text" name="nama-penuh-perempuan" id="nama-penuh-perempuan" placeholder="Nurul Hawa Binti Mior Rahim" value="{{ old('nama-penuh-perempuan') }}" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 lg:text-sm">
                                        </div>
                                    </div>
                                </template>
                                <template x-if="duaPasanganIsOn == true">
                                    <div class="lg:col-span-1">
                                        <label for="nama-penuh-pasangan-kedua" class="block text-sm font-medium text-gray-900">Nama Penuh Pasangan Kedua</label>
                                        <div class="mt-2">
                                            <input type="text" name="nama-penuh-pasangan-kedua" id="nama-penuh-pasangan-kedua" placeholder="Syed Yusuf & Sharifah Zulaikha" value="{{ old('nama-penuh-pasangan-kedua') }}" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 lg:text-sm">
                                        </div>
                                    </div>
                                </template>


                                <!-- Nama Panggilan Perempuan -->
                                <template x-if="duaPasanganIsOn == false">
                                    <div class="lg:col-span-1">
                                        <label for="nama-panggilan-perempuan" class="block text-sm font-medium text-gray-900">Nama Panggilan Pengantin Perempuan</label>
                                        <div class="mt-2">
                                            <input 
                                                x-model="namaPerempuan" 
                                                x-init="namaPerempuan = '{{ old('nama-panggilan-perempuan') }}'" 
                                                type="text" 
                                                name="nama-panggilan-perempuan" 
                                                id="nama-panggilan-perempuan" 
                                                maxlength="12" 
                                                spellcheck="false" 
                                                placeholder="Hawa" 
                                                class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 lg:text-sm">
                                        </div>
                                    </div>
                                </template>
                                <template x-if="duaPasanganIsOn == true">
                                    <div class="lg:col-span-1">
                                        <label for="nama-panggilan-pasangan-kedua" class="block text-sm font-medium text-gray-900">Nama Panggilan Pasangan Kedua</label>
                                        <div class="mt-2">
                                            <input 
                                                x-model="namaPasanganKedua" 
                                                xrinit="namaPasanganKedua = '{{ old('nama-panggilan-pasangan-kedua') }}'" 
                                                type="text" 
                                                name="nama-panggilan-pasangan-kedua" 
                                                id="nama-panggilan-pasangan-kedua" 
                                                maxlength="24" 
                                                spellcheck="false" 
                                                placeholder="Yusuf & Zulaikha" 
                                                class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 lg:text-sm">
                                        </div>
                                    </div>
                                </template>

                                

                                <!-- Font Selection and Preview -->
                                <template x-if="duaPasanganIsOn == false">
                                    <div class="lg:col-span-2">
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
                                            @livewire('font-dropdown')
                                        </div>
                                    </div>
                                </template>
                                <template x-if="duaPasanganIsOn == true">
                                    <div class="lg:col-span-2">
                                        <div class="text-center">
                                            <p class="text-4xl" :style="{ fontFamily: fonts[selectedFont] }">
                                                <span x-text="namaPasanganPertama"></span>
                                            </p>
                                            <p class="text-2xl" :style="{ fontFamily: fonts[selectedFont] }">Bersama</p>
                                            <p class="text-4xl" :style="{ fontFamily: fonts[selectedFont] }">
                                                <span x-text="namaPasanganKedua"></span>
                                            </p>
                                        </div>

                                        <label for="font" class="block text-sm font-medium text-gray-900 mt-4">Font</label>
                                        <div class="mt-2">
                                            @livewire('font-dropdown')
                                        </div>
                                    </div>
                                </template>

                                <!-- Penjemput Dropdown -->
                                <template x-if="duaPasanganIsOn == false">
                                    <div class="lg:col-span-2">
                                        <label for="penjemput" class="block text-sm font-medium text-gray-900">Penjemput</label>
                                        <div class="mt-2">
                                            <select 
                                                x-model="penjemput" 
                                                x-init="penjemput = duaPasanganIsOn ? '4' : '{{ old('penjemput', 1) }}'" 
                                                id="penjemput" 
                                                name="penjemput" 
                                                class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 lg:max-w-xs lg:text-sm">
                                                <option value="1">Pihak Lelaki</option>
                                                <option value="2">Pihak Perempuan</option>
                                                <option value="3">Dua Belah Pihak</option>
                                                <template x-if="duaPasanganIsOn == true">
                                                    <option value="4">Dua Pasangan</option>
                                                </template>
                                            </select>
                                        </div>
                                    </div>
                                </template>
                                <input type="hidden" name="penjemput" :value="penjemput">

                                <!-- Nama Bapa/Ibu Pihak Majlis show when duaPasangan is true -->
                                <div x-show="duaPasanganIsOn == true" class="lg:col-span-1">
                                    <label for="nama-bapa-pengantin" class="block text-sm font-medium text-gray-900">Nama Bapa Pengantin (Pihak Majlis)</label>
                                    <div class="mt-2">
                                        <input type="text" name="nama-bapa-pengantin" id="nama-bapa-pengantin" value="{{ old('nama-bapa-pengantin') }}" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 lg:text-sm">
                                    </div>
                                </div>

                                <div x-show="duaPasanganIsOn == true" class="lg:col-span-1">
                                    <label for="nama-ibu-pengantin" class="block text-sm font-medium text-gray-900">Nama Ibu Pengantin (Pihak Majlis)</label>
                                    <div class="mt-2">
                                        <input type="text" name="nama-ibu-pengantin" id="nama-ibu-pengantin" value="{{ old('nama-ibu-pengantin') }}" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 lg:text-sm">
                                    </div>
                                </div>

                                
                                <!-- Nama Bapa/Ibu (Lelaki) show when penjemput 1 or 3 and duaPasanganIsOn is false -->
                                <div x-show="penjemput === '3' || penjemput === '1'" class="lg:col-span-1">
                                    <label for="nama-bapa-pengantin-lelaki" class="block text-sm font-medium text-gray-900">Nama Bapa Pengantin Lelaki</label>
                                    <div class="mt-2">
                                        <input type="text" name="nama-bapa-pengantin-lelaki" id="nama-bapa-pengantin-lelaki" value="{{ old('nama-bapa-pengantin-lelaki') }}" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 lg:text-sm">
                                    </div>
                                </div>

                                <div x-show="penjemput === '3' || penjemput === '1'" class="lg:col-span-1">
                                    <label for="nama-ibu-pengantin-lelaki" class="block text-sm font-medium text-gray-900">Nama Ibu Pengantin Lelaki</label>
                                    <div class="mt-2">
                                        <input type="text" name="nama-ibu-pengantin-lelaki" id="nama-ibu-pengantin-lelaki" value="{{ old('nama-ibu-pengantin-lelaki') }}" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 lg:text-sm">
                                    </div>
                                </div>

                                <!-- Nama Bapa/Ibu (Perempuan) show when penjemput 2 or 3 and duaPasanganIsOn is false -->
                                <div x-show="penjemput === '3' || penjemput === '2'" class="lg:col-span-1">
                                    <label for="nama-bapa-pengantin-perempuan" class="block text-sm font-medium text-gray-900">Nama Bapa Pengantin Perempuan</label>
                                    <div class="mt-2">
                                        <input type="text" name="nama-bapa-pengantin-perempuan" id="nama-bapa-pengantin-perempuan" value="{{ old('nama-bapa-pengantin-perempuan') }}" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 lg:text-sm">
                                    </div>
                                </div>

                                <div x-show="penjemput === '3' || penjemput === '2'" class="lg:col-span-1">
                                    <label for="nama-ibu-pengantin-perempuan" class="block text-sm font-medium text-gray-900">Nama Ibu Pengantin Perempuan</label>
                                    <div class="mt-2">
                                        <input type="text" name="nama-ibu-pengantin-perempuan" id="nama-ibu-pengantin-perempuan" value="{{ old('nama-ibu-pengantin-perempuan') }}" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 lg:text-sm">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Accordion Section 2: Maklumat Majlis -->
                        <div class="border rounded-md p-4 mb-4">
                            <h2 @click="openSection = openSection === 'maklumatMajlis' ? '' : 'maklumatMajlis'" class="text-lg underline font-bold cursor-pointer flex justify-between items-center">
                                Maklumat Majlis
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" :class="openSection === 'maklumat_majlis' ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </h2>

                            <!-- Maklumat Majlis Fields -->
                            <div x-show="openSection === 'maklumatMajlis'" class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
                                
                                <!-- Tajuk Kad -->
                                <div class="lg:col-span-1">
                                    <label for="tajuk-kad" class="block text-sm font-medium text-gray-900">Tajuk Kad</label>
                                    <div class="mt-2">
                                        <input type="text" name="tajuk-kad" id="tajuk-kad" spellcheck="false" value="{{ old('tajuk-kad', 'Walimatulurus') }}" maxlength="20" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 lg:text-sm">
                                    </div>
                                </div>

                                <!-- Tarikh, Masa -->
                                <div class="lg:col-span-1">
                                    <label for="tarikh-majlis" class="block text-sm font-medium text-gray-900">Tarikh Majlis</label>
                                    <div class="mt-2">
                                        <input type="date" name="tarikh-majlis" id="tarikh-majlis" value="{{ old('tarikh-majlis') }}" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 lg:text-sm">
                                    </div>
                                </div>

                                <div class="lg:col-span-1">
                                    <label for="masa-mula-majlis" class="block text-sm font-medium text-gray-900">Masa Mula</label>
                                    <div class="mt-2">
                                        <input type="time" name="masa-mula-majlis" id="masa-mula-majlis" value="{{ old('masa-mula-majlis', isset($kadData->masa_mula_majelis) ? \Carbon\Carbon::parse($kadData->masa_mula_majelis)->format('H:i') : '') }}" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 lg:text-sm">
                                    </div>
                                </div>
                                
                                <div class="lg:col-span-1">
                                    <label for="masa-tamat-majlis" class="block text-sm font-medium text-gray-900">Masa Tamat</label>
                                    <div class="mt-2">
                                        <input type="time" name="masa-tamat-majlis" id="masa-tamat-majlis" value="{{ old('masa-tamat-majlis', isset($kadData->masa_tamat_majelis) ? \Carbon\Carbon::parse($kadData->masa_tamat_majelis)->format('H:i') : '') }}" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 lg:text-sm">
                                    </div>
                                </div>

                                <!-- Ayat Jemputan -->
                                <div class="lg:col-span-1">
                                    <label for="ayat-jemputan" class="block text-sm font-medium text-gray-900">Ayat Jemputan</label>
                                    <div class="mt-2">
                                        <textarea name="ayat-jemputan" id="ayat-jemputan" rows="4" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 lg:text-sm">{{ old('ayat-jemputan', 'DENGAN SEGALA HORMATNYA MENJEMPUT DATO\'/ DATIN/ TUAN/ PUAN/ ENCIK/ CIK DAN SEISI KELUARGA KE MAJLIS PERKAHWINAN PUTERA KAMI BERSAMA PASANGANNYA') }}</textarea>
                                    </div>
                                </div>

                                <!-- Doa Pengantin -->
                                <div x-show="selectedPackage == 2 || selectedPackage == 3" class="lg:col-span-1">
                                    <label for="doa-pengantin" class="block text-sm font-medium text-gray-900">Doa Pengantin</label>
                                    <div class="mt-2">
                                        <textarea name="doa-pengantin" id="doa-pengantin" rows="4" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 lg:text-sm">{{ old('doa-pengantin', '“Ya Allah, berkatilah majlis perkahwinan ini, limpahkan baraqah dan rahmat kepada kedua mempelai ini, Kurniakanlah mereka zuriat yang soleh dan solehah. Kekalkan jodoh mereka di dunia dan di akhirat dan sempurnakanlah agama mereka dengan berkat ikatan ini.”') }}</textarea>
                                    </div>
                                </div>
                                
                                <!-- Alamat, Google Maps, Waze -->
                                <div class="lg:col-span-2">
                                    <label for="alamat-majlis" class="block text-sm font-medium text-gray-900">Alamat Majlis</label>
                                    <div class="mt-2">
                                        <textarea name="alamat-majlis" id="alamat-majlis" rows="4" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 lg:text-sm">{{ old('alamat-majlis') }}</textarea>
                                    </div>
                                </div>

                                <div x-show="selectedPackage == 2 || selectedPackage == 3" class="lg:col-span-1">
                                    <label for="google-url" class="block text-sm font-medium text-gray-900">URL Google Maps</label>
                                    <div class="mt-2">
                                        <input type="text" name="google-url" id="google-url" value="{{ old('google-url') }}" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 lg:text-sm">
                                    </div>
                                </div>

                                <div x-show="selectedPackage == 2 || selectedPackage == 3" class="lg:col-span-1">
                                    <label for="waze-url" class="block text-sm font-medium text-gray-900">URL Waze</label>
                                    <div class="mt-2">
                                        <input type="text" name="waze-url" id="waze-url" value="{{ old('waze-url') }}" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 lg:text-sm">
                                    </div>
                                </div>

                                <!-- Nombor Telefon -->
                                <div x-show="selectedPackage == 2 || selectedPackage == 3" class="lg:col-span-2">
                                    <label class="block text-sm font-medium text-gray-900">Nombor Telefon Waris</label>
                                    <div x-data="{ warisCount: 2 }" class="mt-2 space-y-2">
                                        <!-- Initial input fields (2 fields) -->
                                        <template x-for="i in warisCount" :key="i">
                                            <div class="flex space-x-4">
                                                <input type="text" :name="'nama-' + i" :id="'nama-' + i" placeholder="Nama" maxlength="20" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 lg:text-sm">
                                                <input type="text" :name="'nombor-telefon-' + i" :id="'nombor-telefon-' + i" placeholder="Nombor Telefon" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 lg:text-sm">
                                            </div>
                                        </template>
                                        <!-- Tambah button -->
                                        <button type="button" @click="if (warisCount < 5) warisCount++" x-show="warisCount < 5" class="mt-2 flex items-center text-indigo-600 hover:text-indigo-800 focus:outline-none">
                                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <span class="ml-1">Tambah</span>
                                        </button>
                                    </div>
                                </div>

                                <!-- Aturcara Majlis -->
                                <div x-show="selectedPackage == 2 || selectedPackage == 3" class="lg:col-span-2">
                                    <label class="block text-sm font-medium text-gray-900">Aturcara Majlis</label>
                                    <div x-data="{ acaraCount: 3 }" class="mt-2 space-y-2">
                                        <!-- Initial input fields (2 fields) -->
                                        <template x-for="i in acaraCount" :key="i">
                                            <div class="flex space-x-4">
                                                <input type="time" :name="'masa-acara-' + i" :id="'masa-acara-' + i" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 lg:text-sm">
                                                <input type="text" :name="'acara-' + i" :id="'acara-' + i" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 lg:text-sm">
                                            </div>
                                        </template>
                                        <!-- Tambah button -->
                                        <button type="button" @click="if (acaraCount < 6) acaraCount++" x-show="acaraCount < 6" class="mt-2 flex items-center text-indigo-600 hover:text-indigo-800 focus:outline-none">
                                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <span class="ml-1">Tambah</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Accordion Section 3: Lain-lain -->
                        <div x-show="selectedPackage == 2 || selectedPackage == 3" class="border rounded-md p-4 mb-4">
                            <h2 @click="openSection = openSection === 'others' ? '' : 'others'" class="text-lg underline font-bold cursor-pointer flex justify-between items-center">
                                Lain-lain
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" :class="openSection === 'others' ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </h2>

                            <!-- Show a summary of all sections or additional form fields here -->
                            <div x-data="{ enabled: true, giftEnabled: false }" x-show="openSection === 'others'" class="mt-8">
                                <div>


                                    <!-- Fungsi Active -->
                                    <label class="mt-4 block text-sm font-semibold text-gray-900">Fungsi</label>
                                    <div class="my-2 lg:flex lg:items-center lg:justify-between">
                                        <!-- RSVP Toggle -->
                                        <div x-data="{ enabled: true }" class="flex items-center">
                                            <!-- Button Element -->
                                            <button 
                                                @click="enabled = !enabled" 
                                                :class="enabled ? 'bg-indigo-600' : 'bg-gray-200'" 
                                                type="button" 
                                                class="mb-2 relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2" 
                                                role="switch" 
                                                :aria-checked="enabled.toString()" 
                                            >
                                                <!-- Toggle Circle -->
                                                <span 
                                                    :class="enabled ? 'translate-x-5' : 'translate-x-0'" 
                                                    class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"
                                                    aria-hidden="true"
                                                ></span>
                                            </button>
                                            
                                            <!-- Label Text -->
                                            <span class="ml-3 text-sm" id="rsvp-is-on">
                                                <span class="font-medium text-gray-900">RSVP</span>
                                            </span>
                                            <input type="hidden" name="rsvp-is-on" :value="enabled ? 1 : 0">
                                        </div>
                                        <!-- Guestbook Toggle -->
                                        <div x-data="{ enabled: true }" class="flex items-center">
                                            <!-- Button Element -->
                                            <button 
                                                @click="enabled = !enabled" 
                                                :class="enabled ? 'bg-indigo-600' : 'bg-gray-200'" 
                                                type="button" 
                                                class="mb-2 relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2" 
                                                role="switch" 
                                                :aria-checked="enabled.toString()" 
                                            >
                                                <!-- Toggle Circle -->
                                                <span 
                                                    :class="enabled ? 'translate-x-5' : 'translate-x-0'" 
                                                    class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"
                                                    aria-hidden="true"
                                                ></span>
                                            </button>
                                            
                                            <!-- Label Text -->
                                            <span class="ml-3 text-sm" id="guestbook-is-on">
                                                <span class="font-medium text-gray-900">Guestbook</span>
                                            </span>
                                            <input type="hidden" name="guestbook-is-on" :value="enabled ? 1 : 0">
                                        </div>
                                        <!-- Slideshow Toggle -->
                                        <div class="flex items-center">
                                            <!-- Button Element -->
                                            <button 
                                                @click="enabled = !enabled" 
                                                :class="enabled ? 'bg-indigo-600' : 'bg-gray-200'" 
                                                type="button" 
                                                class="mb-2 relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2" 
                                                role="switch" 
                                                :aria-checked="enabled.toString()" 
                                                aria-labelledby="slideshow-is-on"
                                            >
                                                <!-- Toggle Circle -->
                                                <span 
                                                    :class="enabled ? 'translate-x-5' : 'translate-x-0'" 
                                                    class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"
                                                    aria-hidden="true"
                                                ></span>
                                            </button>
                                            
                                            <!-- Label Text -->
                                            <span class="ml-3 text-sm" id="slideshow-is-on">
                                                <span class="font-medium text-gray-900">Slideshow</span>
                                            </span>
                                            <input type="hidden" name="slideshow-is-on" :value="enabled ? 1 : 0">
                                        </div>
                                        <!-- Gift Toggle -->
                                        <div x-show="selectedPackage == 3" class="flex items-center">
                                            <!-- Button Element -->
                                            <button 
                                                @click="giftEnabled = !giftEnabled" 
                                                :class="giftEnabled ? 'bg-indigo-600' : 'bg-gray-200'" 
                                                type="button" 
                                                class="mb-2 relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2" 
                                                role="switch" 
                                                :aria-checked="giftEnabled.toString()" 
                                                aria-labelledby="slideshow-is-on"
                                            >
                                                <!-- Toggle Circle -->
                                                <span 
                                                    :class="giftEnabled ? 'translate-x-5' : 'translate-x-0'" 
                                                    class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"
                                                    aria-hidden="true"
                                                ></span>
                                            </button>
                                            
                                            <!-- Label Text -->
                                            <span class="ml-3 text-sm" id="slideshow-is-on">
                                                <span class="font-medium text-gray-900">Money Gift</span>
                                            </span>
                                            <input type="hidden" name="gift-is-on" :value="giftEnabled ? 1 : 0">
                                        </div>
                                    </div>
                                    <!-- End of Fungsi Active -->

                                    <div class="grid lg:grid-cols-2">
                                        <!-- Bg Song Selection -->
                                        <div class="mt-8 lg:col-span-1">
                                            <label for="bg-song-id" class="block text-sm font-semibold text-gray-900">Muzik Latar</label>
                                            <div class="mt-2">
                                                @livewire('bg-song-dropdown')
                                            </div>
                                        </div>
                                        <!-- End of Bg Song Selection -->

                                        <!-- Account Detail Upload -->
                                        <div x-show="giftEnabled && selectedPackage == 3" x-cloak class="mt-8 lg:col-span-1">
                                            <div class="lg:flex lg:justify-between">
                                                <div>
                                                    <label for="bank-name" class="block text-sm font-semibold text-gray-900">Nama Bank</label>
                                                    <div class="mt-2">
                                                        <input type="text" name="bank-name" id="bank-name" placeholder="cth: Maybank" value="{{ old('bank_name') }}" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 lg:text-sm">
                                                    </div>
                                                </div>
                                                <div class="mt-2 lg:mt-0">
                                                    <label for="account-number" class="block text-sm font-semibold text-gray-900">Nombor Account</label>
                                                    <div class="mt-2">
                                                        <input type="text" name="account-number" id="account-number" placeholder="cth: 71038294829" value="{{ old('account_number') }}" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 lg:text-sm">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Upload QR Code -->
                                            <div class="mt-2">
                                                <div class="flex items-center">
                                                    <img src="" id="qr_img" alt="Photo" class="hidden w-14 h-14 object-cover border border-gray-300 rounded-md" /> 
                                                    <div class="flex-1 relative">
                                                        <input 
                                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none" 
                                                            type="file"
                                                            name="qr-image" 
                                                            id="qr-image" 
                                                            accept="image/png, image/jpeg"
                                                        >
                                                        <button 
                                                            type="button" 
                                                            class="p-1 mt-1 bg-red-500 text-white rounded-md hidden" 
                                                            id="qr_img_delete">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                                                <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                                
												<label class="text-xs leading-none text-gray-500" for="qr-image">Crop bahagia QR sahaja sebelum upload untuk dapatkan paparan yang jelas</label>
                                            </div>
                                        </div>
                                        <!-- End of Account Detail Upload -->
                                    </div>

                                    <div class="lg:grid lg:grid-cols-2">
                                    <!-- Info Tambahan -->
                                    <div class="mt-6 lg:col-span-1">
                                        <label for="info-tambahan" class="block text-sm font-semibold text-gray-900">Info Tambahan</label>
                                        <div class="mt-2">
                                            <textarea name="info-tambahan" 
                                            id="info-tambahan" 
                                            rows="5" 
                                            spellcheck="false" 
                                            placeholder="Parking di tingkat 2
                                    Surau di tingkat 1" 
                                            class="block text-center w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 lg:text-sm lg:w-72">{{ old('info-tambahan') }}</textarea>

                                            <style>
                                            #info-tambahan::placeholder {
                                                white-space: pre-line;
                                            }
                                            </style>
                                        </div>
                                    </div>

                                    <!-- Gallery upload -->
                                    <div x-data="{ sliderImage: '1' }" class="mt-8 lg:col-span-1">
                                        <!--<label class="mb-2 mt-4 block text-sm font-medium text-gray-900">Galeri <span class="text-xs">(Optional)</span></label>-->
                                        <fieldset>
                                            <legend class="text-sm font-semibold text-gray-900">Galeri Slideshow</legend>
                                            <div class="mt-2 mb-4 space-y-2 lg:flex lg:items-center lg:space-x-10 lg:space-y-0">
                                                <div class="flex items-center">
                                                    <input id="default" name="slider-image" type="radio" value="1" x-model="sliderImage" checked class="relative size-4 appearance-none rounded-full border border-gray-300 bg-white before:absolute before:inset-1 before:rounded-full before:bg-white checked:border-indigo-600 checked:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:before:bg-gray-400 forced-colors:appearance-auto forced-colors:before:hidden [&:not(:checked)]:before:hidden">
                                                    <label for="default" class="ml-3 block text-sm/6 font-medium text-gray-900">Gambar Default</label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input id="own-image" name="slider-image" type="radio" value="2" x-model="sliderImage" class="relative size-4 appearance-none rounded-full border border-gray-300 bg-white before:absolute before:inset-1 before:rounded-full before:bg-white checked:border-indigo-600 checked:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:before:bg-gray-400 forced-colors:appearance-auto forced-colors:before:hidden [&:not(:checked)]:before:hidden">
                                                    <label for="own-image" class="ml-3 block text-sm/6 font-medium text-gray-900">Upload Gambar</label>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <!-- Upload Input 1 -->
                                        <div class="mb-2" x-show="sliderImage == '2'" x-cloak>
                                            <div class="flex items-center space-x-3">
                                                <img src="" id="picture_1_img" alt="Photo" class="hidden w-14 h-14 object-cover border border-gray-300 rounded-md" /> 
                                                <div class="flex-1 relative">
                                                    <input 
                                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none" 
                                                        type="file"
                                                        name="picture_1" 
                                                        id="picture_1" 
                                                        accept="image/png, image/jpeg"
                                                    >
                                                    <button 
                                                        type="button" 
                                                        class="p-1 mt-1 bg-red-500 text-white rounded-md hidden" 
                                                        id="picture_1_delete">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                                            <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                            
                                            <label class="text-sm text-gray-500" for="picture_1">Upload Gambar 1</label>
                                        </div>
                                    
                                        <!-- Upload Input 2 -->
                                        <div class="mb-2" x-show="sliderImage == '2'" x-cloak>
                                            <div class="flex items-center space-x-3">
                                                <img src="" id="picture_2_img" alt="Photo" class="hidden w-14 h-14 object-cover border border-gray-300 rounded-md" /> 
                                                <div class="flex-1 relative">
                                                    <input 
                                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none" 
                                                        type="file"
                                                        name="picture_2" 
                                                        id="picture_2" 
                                                        accept="image/png, image/jpeg"
                                                    >
                                                    <button 
                                                        type="button" 
                                                        class="p-1 mt-1 bg-red-500 text-white rounded-md hidden" 
                                                        id="picture_2_delete">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                                            <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                            <label class="text-sm text-gray-500" for="picture_2">Upload Gambar 2</label>
                                        </div>
                                    
                                        <!-- Upload Input 3 -->
                                        <div class="mb-2" x-show="sliderImage == '2'" x-cloak>
                                            <div class="flex items-center space-x-3">
                                                <img src="" id="picture_3_img" alt="Photo" class="hidden w-14 h-14 object-cover border border-gray-300 rounded-md" /> 
                                                <div class="flex-1 relative">
                                                    <input 
                                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none" 
                                                        type="file"
                                                        name="picture_3" 
                                                        id="picture_3" 
                                                        accept="image/png, image/jpeg"
                                                    >
                                                    <button 
                                                        type="button" 
                                                        class="p-1 mt-1 bg-red-500 text-white rounded-md hidden" 
                                                        id="picture_3_delete">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                                            <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                            <label class="text-sm text-gray-500" for="picture_3">Upload Gambar 3</label>
                                        </div>
                                    </div>
                                    <!-- Gallery upload script -->
                                    <script>
                                        function setupImageUpload(inputId, imgId, deleteBtnId) {
                                            const inputFile = document.getElementById(inputId);
                                            const imgElement = document.getElementById(imgId);
                                            const deleteButton = document.getElementById(deleteBtnId);
                                    
                                            // Show image preview and delete button when a file is selected
                                            inputFile.addEventListener('change', function(event) {
                                                const file = event.target.files[0];
                                                if (file) {
                                                    const reader = new FileReader();
                                                    reader.onload = function(e) {
                                                        imgElement.src = e.target.result;
                                                        imgElement.classList.remove('hidden'); // Show the image
                                                        deleteButton.classList.remove('hidden'); // Show the delete button
                                                    };
                                                    reader.readAsDataURL(file);
                                                }
                                            });
                                    
                                            // Delete the selected image
                                            deleteButton.addEventListener('click', function() {
                                                imgElement.src = ''; // Clear image preview
                                                imgElement.classList.add('hidden'); // Hide the image
                                                deleteButton.classList.add('hidden'); // Hide the delete button
                                                inputFile.value = ''; // Reset file input
                                            });
                                        }

                                        // Define allowed file size (e.g., 5MB in bytes)
										const MAX_FILE_SIZE = 5 * 1024 * 1024; // 5MB

                                        // Function to validate image file
                                        function validateImageUpload(inputFile) {
                                            const file = inputFile.files[0];
                                            const allowedTypes = ['image/jpeg', 'image/png']; // Add HEIC-related MIME types
                                            const allowedExtensions = ['jpg', 'jpeg', 'png']; // Add 'heic' for HEIC files

                                            if (file) {
                                                // Check file type or extension (for HEIC, since MIME detection might fail)
                                                const fileExtension = file.name.split('.').pop().toLowerCase();
                                                if (!allowedTypes.includes(file.type) && !allowedExtensions.includes(fileExtension)) {
                                                    alert('Invalid file type. Please upload a JPEG or PNG image.');
                                                    inputFile.value = ''; // Reset the input
                                                    return false;
                                                }

                                                // Check file size
                                                if (file.size > MAX_FILE_SIZE) {
                                                    alert('File is too large. Please upload an image smaller than 5MB.');
                                                    inputFile.value = ''; // Reset the input
                                                    return false;
                                                }
                                            }
                                            return true;
                                        }

                                        // Attach validation to each file input
                                        document.getElementById('picture_1').addEventListener('change', function() {
                                            validateImageUpload(this);
                                        });
                                        document.getElementById('picture_2').addEventListener('change', function() {
                                            validateImageUpload(this);
                                        });
                                        document.getElementById('picture_3').addEventListener('change', function() {
                                            validateImageUpload(this);
                                        });
                                    
                                        // Setup for each input
                                        setupImageUpload('picture_1', 'picture_1_img', 'picture_1_delete');
                                        setupImageUpload('picture_2', 'picture_2_img', 'picture_2_delete');
                                        setupImageUpload('picture_3', 'picture_3_img', 'picture_3_delete');
                                    </script>
                                    <!-- End Gallery Upload -->
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Displaying all error desktop -->
                        <div class="mt-10 hidden lg:block">
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
