<x-app-layout>
    <x-slot name="header">
        <h2 class="mb-5 font-semibold  text-gray-800 leading-tight">
            {{ __('Senarai Kad') }}
        </h2>
        <div>
            {{ Breadcrumbs::render('senarai-kad') }}
        </div>
    </x-slot>

    <div class="relative isolate mt-12 sm:mt-10 sm:pt-12">
        <!-- Background Pattern SVG -->
        <svg class="absolute inset-0 -z-10 hidden h-full w-full stroke-gray-200 [mask-image:radial-gradient(64rem_64rem_at_top,white,transparent)] sm:block" aria-hidden="true">
            <defs>
                <pattern id="55d3d46d-692e-45f2-becd-d8bdc9344f45" width="200" height="200" x="50%" y="0" patternUnits="userSpaceOnUse">
                    <path d="M.5 200V.5H200" fill="none" />
                </pattern>
            </defs>
            <rect width="100%" height="100%" stroke-width="0" fill="url(#55d3d46d-692e-45f2-becd-d8bdc9344f45)" />
        </svg>
        <!-- Background Gradients -->
        <div class="absolute inset-x-0 top-1/2 -z-10 -translate-y-1/2 transform-gpu overflow-hidden opacity-30 blur-3xl" aria-hidden="true">
            <div class="ml-[max(50%,38rem)] aspect-[1313/771] w-[82.0625rem] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div class="absolute inset-x-0 top-0 -z-10 flex transform-gpu overflow-hidden pt-8 opacity-25 blur-3xl xl:justify-end" aria-hidden="true">
            <div class="ml-[-22rem] aspect-[1313/771] w-[82.0625rem] flex-none origin-top-right rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] xl:ml-0 xl:mr-[calc(50%-12rem)]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>

        <div class="py-12">
            <!-- Notification Panel -->
            @if(session('success'))
                <!-- Global notification live region -->
                <div 
                    x-data="{ show: true }" 
                    x-init="setTimeout(() => show = false, 5000)" 
                    x-show="show" 
                    x-transition:enter="transform ease-out duration-300 transition"
                    x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                    x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
                    x-transition:leave="transition ease-in duration-100"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    aria-live="assertive" 
                    class="pointer-events-none fixed inset-0 flex items-start px-4 py-6 sm:p-6">
                    <div class="flex w-full flex-col items-center space-y-4 sm:items-end">
                        <div class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
                            <div class="p-4">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <svg class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div class="ml-3 w-0 flex-1 pt-0.5">
                                        <p class="text-sm font-medium text-gray-900">{{ session('success') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- End of Notification Panel -->
            <div x-data="{ deleteModal: false, selectedKadId: '', selectedKadTitle: '' }" class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <!-- List Section -->
                <ul role="list" class=" px-4 grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    @foreach($kads as $kad)
                    <li class="col-span-1 flex flex-col divide-y divide-gray-200 rounded-lg bg-white text-center shadow">
                        <div class="flex flex-1 flex-col p-8">
                        <img class="mx-auto h-32 w-32 flex-shrink-0 rounded-full" src="{{ asset($kad->design->product_image_url) }}" alt="">
                        @if ($kad->dua_pasangan_is_on == true)
                            <h3 class="mt-6 text-sm font-medium text-gray-900">{{ $kad->nama_panggilan_pasangan_pertama }}</h3>
                            <h3 class="mt-1 text-sm font-medium text-gray-900">{{ $kad->nama_panggilan_pasangan_kedua }}</h3>
                        @else
                            <h3 class="mt-6 text-sm font-medium text-gray-900">{{ $kad->nama_panggilan_lelaki }} & {{ $kad->nama_panggilan_perempuan }}</h3>
                        @endif
                        <dl class="mt-1 flex flex-grow flex-col justify-between">
                            <dt class="sr-only">Nama Panggilan</dt>
                            <dd class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($kad->tarikh_majlis)->format('d-F-Y') }}</dd>
                            <dt class="sr-only">Tarikh Majlis</dt>
                            <dd class="text-sm text-gray-500">{{ $kad->package->name }}  RM{{ $kad->package->final_price }}</dd>
                            <dt class="sr-only">Nama Panggilan</dt>
                            <dd class="mt-3">
                                @if($kad->is_paid)
                                    <!-- Paid Badge -->
                                    <span class="inline-flex items-center rounded-full bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">
                                        Paid
                                    </span>
                                @else
                                    <!-- Unpaid Badge -->
                                    <span class="inline-flex items-center rounded-full bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/20">
                                        Unpaid
                                    </span>
                                @endif
                            </dd>
                        </dl>
                        </div>
                        <div>
                            @if (!$kad->is_paid)
                            <div class="-mt-px flex divide-x divide-gray-200 border border-b-gray-200">
                                <div class="flex w-0 flex-1">
                                <a href="\create-bill\{{ $kad->id }}" class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-bl-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                                    <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path d="M10.464 8.746c.227-.18.497-.311.786-.394v2.795a2.252 2.252 0 0 1-.786-.393c-.394-.313-.546-.681-.546-1.004 0-.323.152-.691.546-1.004ZM12.75 15.662v-2.824c.347.085.664.228.921.421.427.32.579.686.579.991 0 .305-.152.671-.579.991a2.534 2.534 0 0 1-.921.42Z" />
                                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v.816a3.836 3.836 0 0 0-1.72.756c-.712.566-1.112 1.35-1.112 2.178 0 .829.4 1.612 1.113 2.178.502.4 1.102.647 1.719.756v2.978a2.536 2.536 0 0 1-.921-.421l-.879-.66a.75.75 0 0 0-.9 1.2l.879.66c.533.4 1.169.645 1.821.75V18a.75.75 0 0 0 1.5 0v-.81a4.124 4.124 0 0 0 1.821-.749c.745-.559 1.179-1.344 1.179-2.191 0-.847-.434-1.632-1.179-2.191a4.122 4.122 0 0 0-1.821-.75V8.354c.29.082.559.213.786.393l.415.33a.75.75 0 0 0 .933-1.175l-.415-.33a3.836 3.836 0 0 0-1.719-.755V6Z" clip-rule="evenodd" />
                                    </svg>
                                    Buat Pembayaran
                                </a>
                                </div>
                            </div>
                            @endif
                            <div class="-mt-px flex divide-x divide-gray-200 border border-b-gray-200">
                                <div class="flex w-0 flex-1">
                                @if ($kad->package_id  == 1)
                                <a class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-bl-lg border border-transparent py-4 text-sm font-semibold text-gray-500 bg-gray-100 cursor-not-allowed">
                                    <svg class="h-5 w-5 text-gray-400" :class="{'text-gray-400': {{ $kad->package_id }} == 1}" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path d="M4.913 2.658c2.075-.27 4.19-.408 6.337-.408 2.147 0 4.262.139 6.337.408 1.922.25 3.291 1.861 3.405 3.727a4.403 4.403 0 0 0-1.032-.211 50.89 50.89 0 0 0-8.42 0c-2.358.196-4.04 2.19-4.04 4.434v4.286a4.47 4.47 0 0 0 2.433 3.984L7.28 21.53A.75.75 0 0 1 6 21v-4.03a48.527 48.527 0 0 1-1.087-.128C2.905 16.58 1.5 14.833 1.5 12.862V6.638c0-1.97 1.405-3.718 3.413-3.979Z" />
                                        <path d="M15.75 7.5c-1.376 0-2.739.057-4.086.169C10.124 7.797 9 9.103 9 10.609v4.285c0 1.507 1.128 2.814 2.67 2.94 1.243.102 2.5.157 3.768.165l2.782 2.781a.75.75 0 0 0 1.28-.53v-2.39l.33-.026c1.542-.125 2.67-1.433 2.67-2.94v-4.286c0-1.505-1.125-2.811-2.664-2.94A49.392 49.392 0 0 0 15.75 7.5Z" />
                                    </svg>
                                @else
                                <a href="/kad-guestbook/{{ $kad->id }}" class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-bl-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                                    <svg class="h-5 w-5 text-green-500" :class="{'text-gray-400': {{ $kad->package_id }} == 1}" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path d="M4.913 2.658c2.075-.27 4.19-.408 6.337-.408 2.147 0 4.262.139 6.337.408 1.922.25 3.291 1.861 3.405 3.727a4.403 4.403 0 0 0-1.032-.211 50.89 50.89 0 0 0-8.42 0c-2.358.196-4.04 2.19-4.04 4.434v4.286a4.47 4.47 0 0 0 2.433 3.984L7.28 21.53A.75.75 0 0 1 6 21v-4.03a48.527 48.527 0 0 1-1.087-.128C2.905 16.58 1.5 14.833 1.5 12.862V6.638c0-1.97 1.405-3.718 3.413-3.979Z" />
                                        <path d="M15.75 7.5c-1.376 0-2.739.057-4.086.169C10.124 7.797 9 9.103 9 10.609v4.285c0 1.507 1.128 2.814 2.67 2.94 1.243.102 2.5.157 3.768.165l2.782 2.781a.75.75 0 0 0 1.28-.53v-2.39l.33-.026c1.542-.125 2.67-1.433 2.67-2.94v-4.286c0-1.505-1.125-2.811-2.664-2.94A49.392 49.392 0 0 0 15.75 7.5Z" />
                                    </svg>
                                @endif
                                    Guestbook 
                                </a>
                                </div>
                                <div class="-ml-px flex w-0 flex-1">
                                <a href="/kad-edit/{{ $kad->id }}" class="relative inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-br-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                                    <svg class="h-5 w-5 text-indigo-500" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                        <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                    </svg>
                                    Edit
                                </a>
                                </div>
                            </div>
                            <div class="-mt-px flex divide-x divide-gray-200 border border-b-gray-200">
                                <div class="flex w-0 flex-1">
                                @if ($kad->package_id == 1)
                                <a class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-bl-lg border border-transparent py-4 text-sm font-semibold text-gray-500 bg-gray-100 cursor-not-allowed">
                                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z" clip-rule="evenodd" />
                                        <path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375Zm9.586 4.594a.75.75 0 0 0-1.172-.938l-2.476 3.096-.908-.907a.75.75 0 0 0-1.06 1.06l1.5 1.5a.75.75 0 0 0 1.116-.062l3-3.75Z" clip-rule="evenodd" />
                                    </svg>
                                @else
                                <a href="/kad-rsvp/{{ $kad->id }}" class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-bl-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                                    <svg class="h-5 w-5 text-green-500" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z" clip-rule="evenodd" />
                                        <path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375Zm9.586 4.594a.75.75 0 0 0-1.172-.938l-2.476 3.096-.908-.907a.75.75 0 0 0-1.06 1.06l1.5 1.5a.75.75 0 0 0 1.116-.062l3-3.75Z" clip-rule="evenodd" />
                                    </svg>
                                @endif
                                    RSVP 
                                </a>
                                </div>
                                <div class="-ml-px flex w-0 flex-1">
                                    <button x-on:click="
                                    deleteModal = true; 
                                    selectedKadId = '{{ $kad->id }}'; 
                                    {{ $kad->dua_pasangan_is_on }} 
                                        ? selectedKadTitle = '{{ $kad->nama_panggilan_pasangan_pertama }} * {{ $kad->nama_panggilan_pasangan_kedua }}' 
                                        : selectedKadTitle = '{{ $kad->nama_panggilan_lelaki }} & {{ $kad->nama_panggilan_perempuan }}'
                                " class="relative inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-br-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                                    <svg class="h-5 w-5 text-red-500" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                    </svg>
                                    Delete 
                                </button>
                                </div>
                            </div>
                            <div class="-mt-px flex divide-x divide-gray-200 border border-b-gray-200">
                                <div class="flex w-0 flex-1">
                                <a href="/invitation/{{ $kad->slug }}" class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-bl-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                                    <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M19.902 4.098a3.75 3.75 0 0 0-5.304 0l-4.5 4.5a3.75 3.75 0 0 0 1.035 6.037.75.75 0 0 1-.646 1.353 5.25 5.25 0 0 1-1.449-8.45l4.5-4.5a5.25 5.25 0 1 1 7.424 7.424l-1.757 1.757a.75.75 0 1 1-1.06-1.06l1.757-1.757a3.75 3.75 0 0 0 0-5.304Zm-7.389 4.267a.75.75 0 0 1 1-.353 5.25 5.25 0 0 1 1.449 8.45l-4.5 4.5a5.25 5.25 0 1 1-7.424-7.424l1.757-1.757a.75.75 0 1 1 1.06 1.06l-1.757 1.757a3.75 3.75 0 1 0 5.304 5.304l4.5-4.5a3.75 3.75 0 0 0-1.035-6.037.75.75 0 0 1-.354-1Z" clip-rule="evenodd" />
                                    </svg>
                                    Link Kad Jemputan
                                </a>
                                </div>
                                <div x-data="{ copiedNotification: false, input: 'https://onlinekad.com/invitation/{{ $kad->slug }}'}" class="flex items-center justify-center w-16">
                                    <button @click="navigator.clipboard.writeText(input), copiedNotification = true, setTimeout(() => copiedNotification = false, 2000)">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" />
                                        </svg>
                                    </button>

                                    <div x-show="copiedNotification" @click.away="copiedNotification = false" class="fixed bottom-3 right-3 z-20 max-w-sm overflow-hidden bg-green-100 border border-green-300 rounded" style="display: none;"
                                        x-transition:enter="transform ease-out duration-300 transition"
                                        x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                                        x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
                                        x-transition:leave="transition ease-in duration-100"
                                        x-transition:leave-start="opacity-100"
                                        x-transition:leave-end="opacity-0"
                                        >
                                        <p class="p-3 flex items-center justify-center text-green-600">URL Copied to Clipboard</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                    
                <!-- More people... -->
                </ul>
				<!--Delete Modal-->
				<div x-cloak x-show="deleteModal"
					x-transition:enter="ease-out duration-300"
					x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
					x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
					x-transition:leave="ease-in duration-200"
					x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
					x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
					class="relative z-10"
					aria-labelledby="modal-title"
					role="dialog"
					aria-modal="true">
					
					<!-- Background backdrop -->
					<div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"/>

					<div class="fixed inset-0 z-10 w-screen overflow-y-auto">
						<div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
							<!-- Modal panel -->
							<div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
								<div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
									<div class="sm:flex sm:items-start">
										<div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
											<svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
												<path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/>
											</svg>
										</div>
										<div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
											<h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Delete Wish</h3>
											<div class="mt-2">
												<p class="text-sm text-gray-500">Are you sure you want to delete <span class="font-bold text-red-500" x-text="selectedKadTitle"/>? This action cannot be undone.</p>
											</div>
										</div>
									</div>
								</div>
								<div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
									<x-primary-button form="delete-form" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Delete</x-primary-button>
									<button type="button" @click="deleteModal = false" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-xs uppercase font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">CANCEL</button></div>
							</div>
						</div>
					</div>
				</div>
				<form method="POST" :action="`/kad/${selectedKadId}`" id="delete-form" class="hidden">
					@csrf
					@method('DELETE')    
				</form>
            </div>
        </div>
    </div>
</x-app-layout>
