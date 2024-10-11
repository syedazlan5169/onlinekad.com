<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-gray-800 leading-tight">
			{{ __('Edit Kad') }}
		</h2>
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
						'1': 'Great Vibes',
						'2': 'Dancing Script',
						'3': 'Alex Brush',
						'4': 'Parisienne',
						},
						openSection: 'maklumat_pengantin', namaLelaki: '{{ $kadData->nama_panggilan_lelaki }}', namaPerempuan: '{{ $kadData->nama_panggilan_perempuan }}'
					}" class="max-w-7xl mx-auto p-8">
					
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
							<div x-show="openSection === 'maklumat_pengantin'" x-data="{ penjemput: '{{ $kadData->penjemput }}' }" class="mt-8 grid grid-cols-1 gap-x-6 gap-y-8 lg:grid-cols-6 sm:grid-cols-1">
								<input type="hidden" name="design_id" id="design_id" value="{{ $kadData->design->id }}">

								<!-- Nama Penuh Pengantin Lelaki -->
								<div class="lg:col-span-3 sm:col-span-1">
									<label for="nama_penuh_lelaki" class="block text-sm font-medium text-gray-900">Nama Penuh Pengantin Lelaki</label>
									<div class="mt-2">
										<input type="text" name="nama_penuh_lelaki" id="nama_penuh_lelaki" value="{{ $kadData->nama_penuh_lelaki }}" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
									</div>
								</div>

								<!-- Nama Panggilan Pengantin Lelaki -->
								<div class="lg:col-span-3 sm:col-span-1">
									<label for="nama_panggilan_lelaki" class="block text-sm font-medium text-gray-900">Nama Panggilan Pengantin Lelaki</label>
									<div class="mt-2">
										<input x-model="namaLelaki" type="text" name="nama_panggilan_lelaki" id="nama_panggilan_lelaki" maxlength="12" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
									</div>
								</div>

								<!-- Nama Penuh Pengantin Perempuan -->
								<div class="lg:col-span-3 sm:col-span-1">
									<label for="nama_penuh_perempuan" class="block text-sm font-medium text-gray-900">Nama Penuh Pengantin Perempuan</label>
									<div class="mt-2">
										<input type="text" name="nama_penuh_perempuan" id="nama_penuh_perempuan" value="{{ $kadData->nama_penuh_perempuan }}" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
									</div>
								</div>

								<!-- Nama Panggilan Pengantin Perempuan -->
								<div class="lg:col-span-3 sm:col-span-1">
									<label for="nama_panggilan_perempuan" class="block text-sm font-medium text-gray-900">Nama Panggilan Pengantin Perempuan</label>
									<div class="mt-2">
										<input x-model="namaPerempuan" type="text" name="nama_panggilan_perempuan" id="nama_panggilan_perempuan" maxlength="12" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
									</div>
								</div>

								<!-- Preview Box for Nama Pengantin -->
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

								<!-- Font Selection -->
								<div class="lg:col-span-4 sm:col-span-1">
									<label for="font" class="block text-sm font-medium text-gray-900">Font</label>
									<div class="mt-2">
										<select id="font" name="font" x-model="selectedFont" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:max-w-xs sm:text-sm">
											<option value="1">Great Vibes</option>
											<option value="2">Dancing Script</option>
											<option value="3">Alex Brush</option>
											<option value="4">Parisienne</option>
										</select>
									</div>
								</div>

								<!-- Penjemput -->
								<div class="lg:col-span-4 sm:col-span-1">
									<label for="penjemput" class="block text-sm font-medium text-gray-900">Penjemput</label>
									<div class="mt-2">
										<select x-model="penjemput" id="penjemput" name="penjemput" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:max-w-xs sm:text-sm">
											<option value="1">Pihak Lelaki</option>
											<option value="2">Pihak Perempuan</option>
											<option value="3">Dua Belah Pihak</option>
										</select>
									</div>
								</div>

								<!-- Conditional Fields for Nama Bapa/Ibu -->
								<!-- Show fields when penjemput is 1 or 3 -->
								<div x-show="penjemput === '3' || penjemput === '1'" class="lg:col-span-6 grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-8">
									<div class="sm:col-span-1">
										<label for="nama_bapa_pengantin_lelaki" class="block text-sm font-medium text-gray-900">Nama Bapa Pengantin Lelaki</label>
										<div class="mt-2">
											<input type="text" name="nama_bapa_pengantin_lelaki" id="nama_bapa_pengantin_lelaki" value="{{ $kadData->nama_bapa_pengantin_lelaki }}" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
										</div>
									</div>
									<div class="sm:col-span-1">
										<label for="nama_ibu_pengantin_lelaki" class="block text-sm font-medium text-gray-900">Nama Ibu Pengantin Lelaki</label>
										<div class="mt-2">
											<input type="text" name="nama_ibu_pengantin_lelaki" id="nama_ibu_pengantin_lelaki" value="{{ $kadData->nama_ibu_pengantin_lelaki }}" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
										</div>
									</div>
								</div>

								<!-- Show fields when penjemput is 2 or 3 -->
								<div x-show="penjemput === '3' || penjemput === '2'" class="lg:col-span-6 grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-8">
									<div class="sm:col-span-1">
										<label for="nama_bapa_pengantin_perempuan" class="block text-sm font-medium text-gray-900">Nama Bapa Pengantin Perempuan</label>
										<div class="mt-2">
											<input type="text" name="nama_bapa_pengantin_perempuan" id="nama_bapa_pengantin_perempuan" value="{{ $kadData->nama_bapa_pengantin_perempuan }}" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
										</div>
									</div>
									<div class="sm:col-span-1">
										<label for="nama_ibu_pengantin_perempuan" class="block text-sm font-medium text-gray-900">Nama Ibu Pengantin Perempuan</label>
										<div class="mt-2">
											<input type="text" name="nama_ibu_pengantin_perempuan" id="nama_ibu_pengantin_perempuan" value="{{ $kadData->nama_ibu_pengantin_perempuan }}" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
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
							<div x-show="openSection === 'maklumat_majlis'" class="mt-8 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

								<!-- Tajuk Kad -->
								<div class="sm:col-span-full">
									<label for="tajuk_kad" class="block text-sm font-medium text-gray-900">Tajuk Kad</label>
									<div class="mt-2">
										<input type="text" name="tajuk_kad" id="tajuk_kad" value="{{ $kadData->tajuk_kad }}" spellcheck="false" maxlength="20" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
									</div>
								</div>

								<!-- Ayat Jemputan -->
								<div class="sm:col-span-3">
									<label for="ayat_jemputan" class="block text-sm font-medium text-gray-900">Ayat Jemputan</label>
									<div class="mt-2">
										<textarea name="ayat_jemputan" id="ayat_jemputan" rows="4" style="text-transform: uppercase;" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">{{ $kadData->ayat_jemputan }}</textarea>
									</div>
								</div>

								<!-- Doa Pengantin -->
								<div class="sm:col-span-3">
									<label for="doa_pengantin" class="block text-sm font-medium text-gray-900">Doa Pengantin</label>
									<div class="mt-2">
										<textarea name="doa_pengantin" id="doa_pengantin" rows="4" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">{{ $kadData->doa_pengantin }}</textarea>
									</div>
								</div>

								<!-- Tarikh Majlis -->
								<div class="sm:col-span-2">
									<label for="tarikh_majlis" class="block text-sm font-medium text-gray-900">Tarikh Majlis</label>
									<div class="mt-2">
										<input type="date" name="tarikh_majlis" id="tarikh_majlis" value="{{ \Carbon\Carbon::parse($kadData->tarikh_majlis)->format('Y-m-d') }}" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
									</div>
								</div>

								<!-- Masa Mula -->
								<div class="sm:col-span-2">
									<label for="masa_mula_majlis" class="block text-sm font-medium text-gray-900">Masa Mula</label>
									<div class="mt-2">
										<input type="time" name="masa_mula_majlis" id="masa_mula_majlis" value="{{ $kadData->masa_mula_majlis }}" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
									</div>
								</div>

								<!-- Masa Tamat -->
								<div class="sm:col-span-2">
									<label for="masa_tamat_majlis" class="block text-sm font-medium text-gray-900">Masa Tamat</label>
									<div class="mt-2">
										<input type="time" name="masa_tamat_majlis" id="masa_tamat_majlis" value="{{ $kadData->masa_tamat_majlis }}" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
									</div>
								</div>

								<!-- Alamat Majlis -->
								<div class="sm:col-span-3">
									<label for="alamat_majlis" class="block text-sm font-medium text-gray-900">Alamat Majlis</label>
									<div class="mt-2">
										<textarea name="alamat_majlis" id="alamat_majlis" rows="4" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">{{ $kadData->alamat_majlis }}</textarea>
									</div>
								</div>

								<!-- Google Maps URL -->
								<div class="sm:grid-cols-1 sm:col-span-3">
									<div>
										<label for="google_url" class="block text-sm font-medium text-gray-900">URL Google Maps</label>
										<div class="mt-2">
											<input type="text" name="google_url" id="google_url" value="{{ $kadData->google_url }}" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
										</div>
									</div>

									<!-- Waze URL -->
									<div>
										<label for="waze_url" class="mt-2 block text-sm font-medium text-gray-900">URL Waze</label>
										<div class="mt-1">
											<input type="text" name="waze_url" id="waze_url" value="{{ $kadData->waze_url }}" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
										</div>
									</div>
								</div>

								<!-- Nombor Telefon Waris -->
								<div class="sm:col-span-6">
									<label class="block text-sm font-medium text-gray-900">Nombor Telefon Waris</label>
									<div class="mt-2 space-y-4">
										@for ($i = 0; $i < 5; $i++)
										<div class="flex space-x-4">
											<input type="text" name="nama_{{ $i + 1 }}" id="nama_{{ $i + 1 }}" value="{{ $kadData->nombor_telefon[$i]['nama'] ?? '' }}" placeholder="Nama" maxlength="20" spellcheck="false" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
											<input type="text" name="nombor_telefon_{{ $i + 1 }}" id="nombor_telefon_{{ $i + 1 }}" value="{{ $kadData->nombor_telefon[$i]['nombor_telefon'] ?? '' }}" placeholder="Nombor Telefon" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
										</div>
										@endfor
									</div>
								</div>

								<!-- Aturcara Majlis -->
								<div class="sm:col-span-6">
									<label class="block text-sm font-medium text-gray-900">Aturcara Majlis</label>
									<div class="mt-2 space-y-4">
										@for ($i = 0; $i < 6; $i++)
										<div class="flex space-x-4">
											<input type="time" name="masa_acara_{{ $i + 1 }}" id="masa_acara_{{ $i + 1 }}" value="{{ $kadData->aturcara_majlis[$i]['masa_acara'] ?? '' }}" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
											<input type="text" name="acara_{{ $i + 1 }}" id="acara_{{ $i + 1 }}" spellcheck="false" value="{{ $kadData->aturcara_majlis[$i]['acara'] ?? '' }}" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
										</div>
										@endfor
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
