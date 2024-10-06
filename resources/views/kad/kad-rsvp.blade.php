<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 leading-tight">
            {{ __('RSVP') }}
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
</x-app-layout>
