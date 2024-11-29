<x-app-layout>
    <x-slot name="header">
        <h2 class="mb-5 font-semibold text-gray-800 leading-tight">
            {{ __('RSVP ') }}{{ $kadData->nama_panggilan_lelaki }} & {{ $kadData->nama_panggilan_perempuan }}
        </h2>
        <div>
            {{ Breadcrumbs::render('kad-rsvp', $kadData->id) }}
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
        <div class="absolute inset-x-0 top-1/2 -z-10 -translate-y-1/2 transform-gpu overflow-hidden opacity-30 blur-3xl pointer-events-none" aria-hidden="true">
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
            <div x-data="{ deleteModal: false , selectedRsvpId: '', selectedRsvpName: '' }" class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div>
                    <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
                    <div class="text-center overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                        <dt class="truncate text-sm font-medium text-gray-500">Jumlah RSVP</dt>
                        <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ $totalRsvp }}</dd>
                    </div>
                    <div class="text-center overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                        <dt class="truncate text-sm font-medium text-gray-500">Jumlah Tidak Hadir</dt>
                        <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ $totalTidakHadir }}</dd>
                    </div>
                    <div class="text-center overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                        <dt class="truncate text-sm font-medium text-gray-500">Jumlah Kehadiran</dt>
                        <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ $totalKehadiran }}</dd>
                    </div>
                    </dl>
                </div>

                <!-- RSVP List -->
                <livewire:rsvp-table :kad_id="$kadData->id" />
                
            </div>
        </div>
    </div>
</x-app-layout>
