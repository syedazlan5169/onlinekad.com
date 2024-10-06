<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold  text-gray-800 leading-tight">
            {{ __('Senarai Kad') }}
        </h2>
    </x-slot>

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
                class="pointer-events-none fixed inset-0 flex items-start px-4 py-6 sm:items-start sm:p-6"
            >
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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- List Section -->
            <ul role="list" class=" px-4 grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach($kads as $kad)
                <li class="col-span-1 flex flex-col divide-y divide-gray-200 rounded-lg bg-white text-center shadow">
                    <div class="flex flex-1 flex-col p-8">
                    <img class="mx-auto h-32 w-32 flex-shrink-0 rounded-full" src="{{ asset($kad->design->product_image_url) }}" alt="">
                    <h3 class="mt-6 text-sm font-medium text-gray-900">{{ $kad->nama_panggilan_lelaki }} & {{ $kad->nama_panggilan_perempuan }}</h3>
                    <dl class="mt-1 flex flex-grow flex-col justify-between">
                        <dt class="sr-only">Nama Panggilan</dt>
                        <dd class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($kad->tarikh_majlis)->format('d-F-Y') }}</dd>
                        <dt class="sr-only">Tarikh Majlis</dt>
                        <dd class="text-sm text-gray-500">{{ $kad->package->name }}  RM{{ $kad->package->price }}</dd>
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
                            <a href="mailto:janecooper@example.com" class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-bl-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
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
                            <a href="/kad-details/{{ $kad->id }}" class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-bl-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                                <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                                </svg>
                                Details
                            </a>
                            </div>
                            <div class="-ml-px flex w-0 flex-1">
                            <a href="/kad-edit/{{ $kad->id }}" class="relative inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-br-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                                <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                    <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                </svg>
                                Edit
                            </a>
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
                        </div>
                    </div>
                </li>
                @endforeach
                
            <!-- More people... -->
            </ul>

        </div>
    </div>
</x-app-layout>
