<x-app-layout>
	<x-slot name="header">
		<h2 class="mb-5 font-semibold text-gray-800 leading-tight">
			{{ __('Edit Kad') }}
		</h2>
        <div>
            {{ Breadcrumbs::render('kad-edit', $kadData->id) }}
        </div>
	</x-slot>

	<div class="relative isolate mt-12 sm:mt-10 sm:pt-12">
		<!-- Background Pattern and Gradient -->
		<svg class="absolute inset-0 -z-10 hidden h-full w-full stroke-gray-200 sm:block" aria-hidden="true">
			<defs>
				<pattern id="55d3d46d-692e-45f2-becd-d8bdc9344f45" width="200" height="200" x="50%" y="0" patternUnits="userSpaceOnUse">
					<path d="M.5 200V.5H200" fill="none" />
				</pattern>
			</defs>
			<rect width="100%" height="100%" stroke-width="0" fill="url(#55d3d46d-692e-45f2-becd-d8bdc9344f45)" />
		</svg>
		<div class="absolute inset-x-0 top-1/2 -z-10 transform-gpu opacity-30 blur-3xl"></div>
		<div class="absolute inset-x-0 top-0 -z-10 transform-gpu opacity-25 blur-3xl"></div>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
					<div x-data="{
						selectedFont: '{{ $kadData->font_id }}', 
						fonts: {
                        @foreach($fonts as $font)
                            '{{ $font->id }}': '{{ $font->font_name }}',
                        @endforeach
                    	},
						openSection: 'maklumatPengantin',
						 packageId: '{{ $kadData->package_id }}',
						 namaLelaki: '{{ $kadData->nama_panggilan_lelaki }}',
						 namaPerempuan: '{{ $kadData->nama_panggilan_perempuan }}',
						 namaPasanganPertama: '{{ $kadData->nama_panggilan_pasangan_pertama }}',
						 namaPasanganKedua: '{{ $kadData->nama_panggilan_pasangan_kedua }}'
					}" class="max-w-7xl mx-auto p-8">
					
					<!-- Form starts -->
					<form action="/kad-update/{{ $kadData->id }}" method="POST" enctype="multipart/form-data">
						@csrf
						@method('PATCH')

						<!-- Accordion Section 1: Maklumat Pengantin -->
						<div class="border rounded-md p-4 mb-4">
							<h2 @click="openSection = openSection === 'maklumatPengantin' ? '' : 'maklumatPengantin'" class="text-lg underline font-bold cursor-pointer flex justify-between items-center">
								Maklumat Pengantin
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" :class="openSection === 'maklumatPengantin' ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
									<path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
								</svg>
							</h2>
							<div x-show="openSection === 'maklumatPengantin'" x-data="{ penjemput: '{{ $kadData->penjemput }}', duaPasanganIsOn: {{ $kadData->dua_pasangan_is_on }} }" class="mt-8 grid grid-cols-1 gap-x-6 gap-y-8 lg:grid-cols-6 sm:grid-cols-1">
								<input type="hidden" name="design-id" id="design-id" value="{{ $kadData->design->id }}">

                                <!-- Radio Button Bahasa -->
                                <fieldset class="lg:col-span-6">
                                    <div x-data="{ bahasa: '{{ $kadData->is_english }}' }" class="mb-4 space-y-2 lg:flex lg:items-center lg:space-x-10 lg:space-y-0">
                                        <div class="flex items-center">
                                            <input id="malay" name="bahasa" type="radio" value="0" x-model="bahasa" class="relative size-4 appearance-none rounded-full border border-gray-300 bg-white before:absolute before:inset-1 before:rounded-full before:bg-white checked:border-indigo-600 checked:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:before:bg-gray-400 forced-colors:appearance-auto forced-colors:before:hidden [&:not(:checked)]:before:hidden">
                                            <label for="malay" class="ml-3 block text-sm/6 font-medium text-gray-900">Bahasa Malaysia</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="english" name="bahasa" type="radio" value="1" x-model="bahasa" class="relative size-4 appearance-none rounded-full border border-gray-300 bg-white before:absolute before:inset-1 before:rounded-full before:bg-white checked:border-indigo-600 checked:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:before:bg-gray-400 forced-colors:appearance-auto forced-colors:before:hidden [&:not(:checked)]:before:hidden">
                                            <label for="english" class="ml-3 block text-sm/6 font-medium text-gray-900">English</label>
                                        </div>
                                    </div>
                                </fieldset>

								<!-- Dua Pasangan Toggle -->
								<div x-show="packageId == 3" x-cloak x-data="{ enabled: {{ $kadData->dua_pasangan_is_on }} }" class="lg:col-span-6">
									<!-- Button Element -->
									<button 
										@click="enabled = !enabled, duaPasanganIsOn = enabled, penjemput = enabled ? '4' : '1'" 
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

								<!-- Nama Penuh Pengantin Lelaki -->
								<div x-show="duaPasanganIsOn == true"  class="lg:col-span-3 sm:col-span-1">
									<label for="nama-penuh-pasangan-pertama" class="block text-sm font-medium text-gray-900">Nama Penuh Pasangan Pertama</label>
									<div class="mt-2">
										<input type="text" name="nama-penuh-pasangan-pertama" id="nama-penuh-pasangan-pertama" value="{{ $kadData->nama_penuh_pasangan_pertama }}" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
									</div>
								</div>
								<div x-show="duaPasanganIsOn == false" class="lg:col-span-3 sm:col-span-1">
									<label for="nama-penuh-lelaki" class="block text-sm font-medium text-gray-900">Nama Penuh Pengantin Lelaki</label>
									<div class="mt-2">
										<input type="text" name="nama-penuh-lelaki" id="nama-penuh-lelaki" value="{{ $kadData->nama_penuh_lelaki }}" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
									</div>
								</div>


								<!-- Nama Panggilan Pengantin Lelaki -->
								<div x-show="duaPasanganIsOn == true"  class="lg:col-span-3 sm:col-span-1">
									<label for="nama-panggilan-pasangan-pertama" class="block text-sm font-medium text-gray-900">Nama Panggilan Pasangan Pertama</label>
									<div class="mt-2">
										<input x-model="namaPasanganPertama" type="text" name="nama-panggilan-pasangan-pertama" id="nama-panggilan-pasangan-pertama" maxlength="24" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
									</div>
								</div>
								<div x-show="duaPasanganIsOn == false" class="lg:col-span-3 sm:col-span-1">
									<label for="nama-panggilan-lelaki" class="block text-sm font-medium text-gray-900">Nama Panggilan Pengantin Lelaki</label>
									<div class="mt-2">
										<input x-model="namaLelaki" type="text" name="nama-panggilan-lelaki" id="nama-panggilan-lelaki" maxlength="12" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
									</div>
								</div>

								<!-- Nama Penuh Pengantin Perempuan -->
								<div x-show="duaPasanganIsOn == true"  class="lg:col-span-3 sm:col-span-1">
									<label for="nama-penuh-pasangan-kedua" class="block text-sm font-medium text-gray-900">Nama Penuh Pasangan Kedua</label>
									<div class="mt-2">
										<input type="text" name="nama-penuh-pasangan-kedua" id="nama-penuh-pasangan-kedua" value="{{ $kadData->nama_penuh_pasangan_kedua }}" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
									</div>
								</div>
								<div x-show="duaPasanganIsOn == false" class="lg:col-span-3 sm:col-span-1">
									<label for="nama-penuh-perempuan" class="block text-sm font-medium text-gray-900">Nama Penuh Pengantin Perempuan</label>
									<div class="mt-2">
										<input type="text" name="nama-penuh-perempuan" id="nama-penuh-perempuan" value="{{ $kadData->nama_penuh_perempuan }}" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
									</div>
								</div>

								<!-- Nama Panggilan Pengantin Perempuan -->
								<div x-show="duaPasanganIsOn == true" class="lg:col-span-3 sm:col-span-1">
									<label for="nama-panggilan-pasangan-kedua" class="block text-sm font-medium text-gray-900">Nama Panggilan Pasangan Kedua</label>
									<div class="mt-2">
										<input x-model="namaPasanganKedua" type="text" name="nama-panggilan-pasangan-kedua" id="nama-panggilan-pasangan-kedua" maxlength="24" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
									</div>
								</div>
								<div x-show="duaPasanganIsOn == false" class="lg:col-span-3 sm:col-span-1">
									<label for="nama-panggilan-perempuan" class="block text-sm font-medium text-gray-900">Nama Panggilan Pengantin Perempuan</label>
									<div class="mt-2">
										<input x-model="namaPerempuan" type="text" name="nama-panggilan-perempuan" id="nama-panggilan-perempuan" maxlength="12" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
									</div>
								</div>


								<!-- Preview Box for Nama Pengantin -->
								<template x-if="duaPasanganIsOn == true">
									<div class="lg:col-span-6 sm:col-span-1 mt-4">
										<div class="text-center">
											<p class="text-4xl" :style="{ fontFamily: fonts[selectedFont] }">
												<span x-text="namaPasanganPertama"></span>
											</p>
											<p class="text-2xl" :style="{ fontFamily: fonts[selectedFont] }">Bersama</p>
											<p class="text-4xl" :style="{ fontFamily: fonts[selectedFont] }">
												<span x-text="namaPasanganKedua"></span>
											</p>
										</div>
									</div>
								</template>
								<template x-if="duaPasanganIsOn == false">
									<div class="lg:col-span-6 sm:col-span-1 mt-4">
										<div class="text-center">
											<p class="text-4xl" :style="{ fontFamily: fonts[selectedFont] }">
												<span x-text="namaLelaki"></span>
											</p>
											<p class="text-4xl" :style="{ fontFamily: fonts[selectedFont] }">&</p>
											<p class="text-4xl" :style="{ fontFamily: fonts[selectedFont] }">
												<span x-text="namaPerempuan"></span>
											</p>
										</div>
									</div>
								</template>

								<!-- Font Selection -->
								<div class="lg:col-span-4 sm:col-span-1">
									<label for="font" class="block text-sm font-medium text-gray-900">Font</label>
									<div class="mt-2">
										@livewire('font-dropdown', ['$currentSelectedFont' => $kadData->font_id])
									</div>
								</div>

								<!-- Penjemput -->
								<template x-if="duaPasanganIsOn == false">
									<div class="lg:col-span-4 sm:col-span-1">
										<label for="penjemput" class="block text-sm font-medium text-gray-900">Penjemput</label>
										<div class="mt-2">
											<select x-model="penjemput" id="penjemput" name="penjemput" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:max-w-xs sm:text-sm">
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

								<!-- Show fields when duaPasanganIsOn == true -->
								<div x-show="duaPasanganIsOn == true" class="lg:col-span-6 grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-8">
									<div class="sm:col-span-1">
										<label for="nama-bapa-pengantin" class="block text-sm font-medium text-gray-900">Nama Bapa Pengantin (Pihak Majlis)</label>
										<div class="mt-2">
											<input type="text" name="nama-bapa-pengantin" id="nama-bapa-pengantin" value="{{ $kadData->nama_bapa_pengantin }}" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
										</div>
									</div>
									<div class="sm:col-span-1">
										<label for="nama-ibu-pengantin" class="block text-sm font-medium text-gray-900">Nama Ibu Pengantin (Pihak Majlis)</label>
										<div class="mt-2">
											<input type="text" name="nama-ibu-pengantin" id="nama-ibu-pengantin" value="{{ $kadData->nama_ibu_pengantin }}" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
										</div>
									</div>
								</div>
								<!-- Show fields when penjemput is 1 or 3 -->
								<div x-show="penjemput === '3' || penjemput === '1'" class="lg:col-span-6 grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-8">
									<div class="sm:col-span-1">
										<label for="nama-bapa-pengantin-lelaki" class="block text-sm font-medium text-gray-900">Nama Bapa Pengantin Lelaki</label>
										<div class="mt-2">
											<input type="text" name="nama-bapa-pengantin-lelaki" id="nama-bapa-pengantin-lelaki" value="{{ $kadData->nama_bapa_pengantin_lelaki }}" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
										</div>
									</div>
									<div class="sm:col-span-1">
										<label for="nama-ibu-pengantin-lelaki" class="block text-sm font-medium text-gray-900">Nama Ibu Pengantin Lelaki</label>
										<div class="mt-2">
											<input type="text" name="nama-ibu-pengantin-lelaki" id="nama-ibu-pengantin-lelaki" value="{{ $kadData->nama_ibu_pengantin_lelaki }}" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
										</div>
									</div>
								</div>

								<!-- Show fields when penjemput is 2 or 3 -->
								<div x-show="penjemput === '3' || penjemput === '2'" class="lg:col-span-6 grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-8">
									<div class="sm:col-span-1">
										<label for="nama-bapa-pengantin-perempuan" class="block text-sm font-medium text-gray-900">Nama Bapa Pengantin Perempuan</label>
										<div class="mt-2">
											<input type="text" name="nama-bapa-pengantin-perempuan" id="nama-bapa-pengantin-perempuan" value="{{ $kadData->nama_bapa_pengantin_perempuan }}" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
										</div>
									</div>
									<div class="sm:col-span-1">
										<label for="nama-ibu-pengantin-perempuan" class="block text-sm font-medium text-gray-900">Nama Ibu Pengantin Perempuan</label>
										<div class="mt-2">
											<input type="text" name="nama-ibu-pengantin-perempuan" id="nama-ibu-pengantin-perempuan" value="{{ $kadData->nama_ibu_pengantin_perempuan }}" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Accordion Section 2: Maklumat Majlis -->
						<div class="border rounded-md p-4 mb-4">
							<h2 @click="openSection = openSection === 'maklumatMajlis' ? '' : 'maklumatMajlis'" class="text-lg underline font-bold cursor-pointer flex justify-between items-center">
								Maklumat Majlis
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" :class="openSection === 'maklumatMajlis' ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
									<path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
								</svg>
							</h2>
							<div x-show="openSection === 'maklumatMajlis'" class="mt-8 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

								<!-- Tajuk Kad -->
								<div class="sm:col-span-full">
									<label for="tajuk-kad" class="block text-sm font-medium text-gray-900">Tajuk Kad</label>
									<div class="mt-2">
										<input type="text" name="tajuk-kad" id="tajuk-kad" value="{{ $kadData->tajuk_kad }}" spellcheck="false" maxlength="20" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
									</div>
								</div>

								<!-- Ayat Jemputan -->
								<div class="sm:col-span-3">
									<label for="ayat-jemputan" class="block text-sm font-medium text-gray-900">Ayat Jemputan</label>
									<div class="mt-2">
										<textarea name="ayat-jemputan" id="ayat-jemputan" rows="4" style="text-transform: uppercase;" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">{{ $kadData->ayat_jemputan }}</textarea>
									</div>
								</div>

								<!-- Doa Pengantin -->
								<div x-show="packageId == 2 || packageId == 3" class="sm:col-span-3">
									<label for="doa-pengantin" class="block text-sm font-medium text-gray-900">Doa Pengantin</label>
									<div class="mt-2">
										<textarea name="doa-pengantin" id="doa-pengantin" rows="4" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">{{ $kadData->doa_pengantin }}</textarea>
									</div>
								</div>

								<!-- Alamat Majlis -->
								<div class="sm:col-span-3">
									<label for="alamat-majlis" class="block text-sm font-medium text-gray-900">Alamat Majlis</label>
									<div class="mt-2">
										<textarea name="alamat-majlis" id="alamat-majlis" rows="4" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">{{ $kadData->alamat_majlis }}</textarea>
									</div>
								</div>

								<!-- Google Maps URL -->
								<div x-show="packageId == 2 || packageId == 3" class="sm:grid-cols-1 sm:col-span-3">
									<div>
										<label for="google-url" class="block text-sm font-medium text-gray-900">URL Google Maps</label>
										<div class="mt-2">
											<input type="text" name="google-url" id="google-url" value="{{ $kadData->google_url }}" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
										</div>
									</div>

									<!-- Waze URL -->
									<div>
										<label for="waze-url" class="mt-2 block text-sm font-medium text-gray-900">URL Waze</label>
										<div class="mt-1">
											<input type="text" name="waze-url" id="waze-url" value="{{ $kadData->waze_url }}" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
										</div>
									</div>
								</div>

								<!-- Tarikh Majlis -->
								<div class="sm:col-span-2">
									<label for="tarikh-majlis" class="block text-sm font-medium text-gray-900">Tarikh Majlis</label>
									<div class="mt-2">
										<input type="date" name="tarikh-majlis" id="tarikh-majlis" value="{{ \Carbon\Carbon::parse($kadData->tarikh_majlis)->format('Y-m-d') }}" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
									</div>
								</div>

								<!-- Masa Mula -->
								<div class="sm:col-span-2">
									<label for="masa-mula-majlis" class="block text-sm font-medium text-gray-900">Masa Mula</label>
									<div class="mt-2">
										<input type="time" name="masa-mula-majlis" id="masa-mula-majlis" value="{{ $kadData->masa_mula_majlis }}" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
									</div>
								</div>

								<!-- Masa Tamat -->
								<div class="sm:col-span-2">
									<label for="masa-tamat-majlis" class="block text-sm font-medium text-gray-900">Masa Tamat</label>
									<div class="mt-2">
										<input type="time" name="masa-tamat-majlis" id="masa-tamat-majlis" value="{{ $kadData->masa_tamat_majlis }}" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
									</div>
								</div>

								<!-- Nombor Telefon Waris -->
								<div x-show="packageId == 2 || packageId == 3" class="sm:col-span-6">
									<label class="block text-sm font-medium text-gray-900">Nombor Telefon Waris</label>
									<div class="mt-2 space-y-4">
										@for ($i = 0; $i < 5; $i++)
										<div class="flex space-x-4">
											<input type="text" name="nama-{{ $i + 1 }}" id="nama-{{ $i + 1 }}" value="{{ $kadData->nombor_telefon[$i]['nama'] ?? '' }}" placeholder="Nama" maxlength="20" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
											<input type="text" name="nombor-telefon-{{ $i + 1 }}" id="nombor-telefon-{{ $i + 1 }}" value="{{ $kadData->nombor_telefon[$i]['nombor_telefon'] ?? '' }}" placeholder="Nombor Telefon" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
										</div>
										@endfor
									</div>
								</div>

								<!-- Aturcara Majlis -->
								<div x-show="packageId == 2 || packageId == 3" class="sm:col-span-6">
									<label class="block text-sm font-medium text-gray-900">Aturcara Majlis</label>
									<div class="mt-2 space-y-4">
										@for ($i = 0; $i < 6; $i++)
										<div class="flex space-x-4">
											<input type="time" name="masa-acara-{{ $i + 1 }}" id="masa-acara-{{ $i + 1 }}" value="{{ $kadData->aturcara_majlis[$i]['masa_acara'] ?? '' }}" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
											<input type="text" name="acara-{{ $i + 1 }}" id="acara-{{ $i + 1 }}" spellcheck="false" value="{{ $kadData->aturcara_majlis[$i]['acara'] ?? '' }}" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
										</div>
										@endfor
									</div>
								</div>
							</div>
						</div>

						<!-- Accordion Section 3: Others Information -->
						<div x-show="packageId == 2 || packageId == 3" x class="border rounded-md p-4 mb-4">
							<h2 @click="openSection = openSection === 'others' ? '' : 'others'" class="text-lg underline font-bold cursor-pointer flex justify-between items-center">
								Lain-lain 
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" :class="openSection === 'others' ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
									<path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
								</svg>
							</h2>

							<div x-data="{ giftEnabled: {{ $kadData->gift_is_on }} }" x-show="openSection === 'others'" class="mt-8">
                                <div>
                                    <label class="block text-sm font-medium text-gray-900">Fungsi</label>

									<!-- Fungsi Active -->
                                    <div class="mt-2 mb-4 sm:flex sm:items-center sm:justify-between sm:px-20">
                                        <!-- RSVP Toggle -->
                                        <div x-data="{ enabled: {{ $kadData->rsvp_is_on }} }" class="flex items-center">
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
                                        <div x-data="{ enabled: {{ $kadData->guestbook_is_on }} }" class="flex items-center">
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
                                        <div x-data="{ enabled: {{ $kadData->slideshow_is_on }} }" class="flex items-center">
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
                                        <div x-show="packageId == 3" class="flex items-center">
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
											<label for="bg-song-id" class="block text-sm font-medium text-gray-900">Lagu Latar Belakang</label>
											<div class="mt-2">
												@livewire('bg-song-dropdown', ['selectedSong' => $kadData->bg_song_id])
											</div>
										</div>

										<!-- Account Detail Upload -->
										<div x-show="giftEnabled" x-cloak class="mt-8 lg:col-span-1">
											<div class="lg:flex lg:gap-6">
												<div>
													<label for="bank-name" class="block text-sm font-semibold text-gray-900">Nama Bank</label>
													<div class="mt-2">
														<input type="text" name="bank-name" id="bank-name" placeholder="cth: Maybank" value="{{ $kadData->bank_name }}" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 lg:text-sm">
													</div>
												</div>
												<div class="mt-2 lg:mt-0">
													<label for="account-number" class="block text-sm font-semibold text-gray-900">Nombor Account</label>
													<div class="mt-2">
														<input type="text" name="account-number" id="account-number" placeholder="cth: 71038294829" value="{{ $kadData->account_number }}" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 lg:text-sm">
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


									<!-- Gallery Upload -->
									<div x-data="{ sliderImage: {{ $kadData->slider_image ?? 1 }} }">
										<fieldset>
                                            <legend class="pt-6 text-sm font-semibold text-gray-900">Galeri Slideshow</legend>
                                            <div class="mt-2 mb-4 space-y-2 sm:flex sm:items-center sm:space-x-10 sm:space-y-0">
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
                									<img src="{{ asset($slider->image_url_1) }}" id="picture_1_img" alt="Photo" class="w-14 h-14 object-cover border border-gray-300 rounded-md" /> 
												<div class="flex-1 relative">
													<input 
														class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none" 
														type="file"
														name="picture_1" 
														id="picture_1" 
														accept="image/png, image/jpeg, image/heic"
													>
													<input type="hidden" name="picture_1_delete_flag" id="picture_1_delete_flag" value="0"> <!-- Flag to track deletion -->
													<button 
														type="button" 
														class="p-1 mt-1 bg-red-500 text-white rounded-md {{ $slider->image_url_1 ? '' : 'hidden' }}" 
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
													<img src="{{ asset($slider->image_url_2) }}" id="picture_2_img" alt="Photo" class="w-14 h-14 object-cover border border-gray-300 rounded-md" /> 
												<div class="flex-1 relative">
													<input 
														class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none" 
														type="file"
														name="picture_2" 
														id="picture_2" 
														accept="image/png, image/jpeg, image/heic"
													>
													<input type="hidden" name="picture_2_delete_flag" id="picture_2_delete_flag" value="0">
													<button 
														type="button" 
														class="p-1 mt-1 bg-red-500 text-white rounded-md {{ $slider->image_url_2 ? '' : 'hidden' }}" 
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
													<img src="{{ asset($slider->image_url_3) }}" id="picture_3_img" alt="Photo" class="w-14 h-14 object-cover border border-gray-300 rounded-md" /> 
												<div class="flex-1 relative">
													<input 
														class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none" 
														type="file"
														name="picture_3" 
														id="picture_3" 
														accept="image/png, image/jpeg, image/heic"
													>
													<input type="hidden" name="picture_3_delete_flag" id="picture_3_delete_flag" value="0">
													<button 
														type="button" 
														class="p-1 mt-1 bg-red-500 text-white rounded-md {{ $slider->image_url_3 ? '' : 'hidden' }}" 
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
										function setupImageUpload(inputId, imgId, deleteBtnId, deleteFlagId, existingImg) {
											const inputFile = document.getElementById(inputId);
											const imgElement = document.getElementById(imgId);
											const deleteButton = document.getElementById(deleteBtnId);
											const deleteFlag = document.getElementById(deleteFlagId);
											
											// If there is an existing image, show the delete button and image
											if (existingImg) {
												imgElement.src = existingImg;
												imgElement.classList.remove('hidden');
												deleteButton.classList.remove('hidden');
											}
									
											// Show image preview and delete button when a file is selected
											inputFile.addEventListener('change', function(event) {
												const file = event.target.files[0];
												if (file) {
													const reader = new FileReader();
													reader.onload = function(e) {
														imgElement.src = e.target.result;
														imgElement.classList.remove('hidden'); // Show the image
														deleteButton.classList.remove('hidden'); // Show the delete button
														deleteFlag.value = "0"; // Reset delete flag
													};
													reader.readAsDataURL(file);
												}
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

									
										// Setup for each input with existing images
										setupImageUpload('picture_1', 'picture_1_img', 'picture_1_delete', 'picture_1_delete_flag', '{{ asset($slider->image_url_1) }}');
										setupImageUpload('picture_2', 'picture_2_img', 'picture_2_delete', 'picture_2_delete_flag', '{{ asset($slider->image_url_2) }}');
										setupImageUpload('picture_3', 'picture_3_img', 'picture_3_delete', 'picture_3_delete_flag', '{{ asset($slider->image_url_3) }}');
									</script>
									<!-- End Gallery Upload -->
									
									
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
