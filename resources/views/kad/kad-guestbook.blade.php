<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-gray-800 leading-tight">
            {{ __('Guestbook') }}
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
    
		<div x-data="{ deleteModal: false, selectedWishId: '', selectedWishAuthor: '' }" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="px-4 sm:px-6 lg:px-8">
				<h2 class="text-xl">Jumlah Ucapan: {{ $totalWishes }}</h2>
        		<!-- Guestbook Section -->
				<div class="mt-2 flow-root">
					<div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
					  <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
							<div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
								<table class="min-w-full divide-y divide-gray-300">
									<thead class="bg-gray-50">
										<tr>
                      						<th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
												<span class="sr-only">Delete</span>
											</th>
											<th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Nama</th>
											<th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Ucapan</th>
										</tr>
									</thead>
									<tbody class="divide-y divide-gray-200 bg-white">
           			         			@foreach($wishes as $wish)
										<tr>
											<td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
												<button x-on:click="deleteModal = true; selectedWishId='{{ $wish->id }}'; selectedWishAuthor='{{ $wish->author }}'" class="text-red-600 hover:text-red-900">
													<svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
													<path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
													</svg>
												</button>
											</td>
											<td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium border border-l text-gray-900 sm:pl-6">{{ $wish->author }}</td>
											<td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium border border-l text-gray-900 sm:pl-6">{{ $wish->wish }}</td>
										</tr>
             				       		@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
          		<div class="mt-4">{{ $wishes->links() }}</div>
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
										<h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Delete Wish</h3>
										<div class="mt-2">
											<p class="text-sm text-gray-500">Are you sure you want to delete wish from <span class="font-bold text-red-500" x-text="selectedWishAuthor"/>? This action cannot be undone.</p>
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
			<form method="POST" :action="`/wish/${selectedWishId}`" id="delete-form" class="hidden">
				@csrf
				@method('DELETE')    
			</form>

		</div>
	</div>
</x-app-layout>