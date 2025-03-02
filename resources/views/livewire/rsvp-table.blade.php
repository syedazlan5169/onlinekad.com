<div class="mt-8">
    <div class="flex items-center justify-between p-4">
        <div class="flex">
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500"
                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <input wire:model.live="search" type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
                    placeholder="Search" required="">
            </div>
        </div>
        <div class="flex space-x-3">
            <div class="flex space-x-3 items-center">
                <label class="w-40 ml-3 text-sm font-medium text-gray-900">Kehadiran :</label>
                <select wire:model.live.debounce.300ms="kehadiran"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option value="">All</option>
                    <option value="Hadir">Hadir</option>
                    <option value="Tidak Hadir">Tidak Hadir</option>
                </select>
            </div>
        </div>

    </div>

    <div class="px-4 sm:px-0">
        <div class="mt-0 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">Delete</span>
                                    </th>
                                    @include('components.table-header', [ 'name' => 'nama', 'displayName' => 'Name'])
                                    @include('components.table-header', [ 'name' => 'kehadiran', 'displayName' => 'Kehadiran'])
                                    @include('components.table-header', [ 'name' => 'nombor_telefon', 'displayName' => 'Telefon'])
                                    @include('components.table-header', [ 'name' => 'jumlah_kehadiran', 'displayName' => 'Jumlah Kehadiran'])
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach($rsvp as $entry)
                                <tr>
                                    <td class="relative whitespace-nowrap py-4 px-4 text-center text-sm font-medium sm:px-6">
                                        <button x-on:click="deleteModal = true; selectedRsvpId='{{ $entry->id }}'; selectedRsvpName='{{ $entry->name }}'" class="text-red-600 hover:text-red-900">
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </td>
                                    <td class="whitespace-nowrap py-4 px-4 text-sm font-medium border border-l text-gray-900 sm:px-6">{{ $entry->nama }}</td>
                                    <td class="whitespace-nowrap py-4 px-4 text-sm text-center font-medium border border-l sm:px-6">
                                        <div class="{{ $this->getKehadiranClass($entry->kehadiran) }}">{{ $entry->kehadiran }}</div>
                                    </td>
                                    <td class="whitespace-nowrap py-4 px-4 text-sm text-center font-medium border border-l text-gray-900 sm:px-6">{{ $entry->nombor_telefon }}</td>
                                    <td class="whitespace-nowrap py-4 px-4 text-sm text-center font-medium border border-l text-gray-900 sm:px-6">{{ $entry->jumlah_kehadiran }}</td>
                                </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="flex space-x-4 items-center mb-3 mt-3 ml-3">
                        <label class="w-22 text-sm font-medium text-gray-900">Per Page</label>
                        <select wire:model.live='perPage'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-20 p-2.5 ">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-between">
            <div class="mt-4">{{ $rsvp->links() }}</div>
            <div>
                <x-primary-button class="h-10" href="{{ route('export-rsvp') }}">Download</x-primary-button>
            </div>
        </div>
    </div>


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
                            <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Delete RSVP</h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">Are you sure you want to delete RSVP from <span class="font-bold text-red-500" x-text="selectedRsvpName"/>? This action cannot be undone.</p>
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
    <form method="POST" :action="`/rsvp/${selectedRsvpId}`" id="delete-form" class="hidden">
    @csrf
    @method('DELETE')    
    </form>

</div>