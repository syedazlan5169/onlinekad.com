<x-app-layout>
    <x-slot:header>
        Create New Manual Order
    </x-slot>

    <div class="container mx-auto p-6">
        @if(session('success'))
            <div class="max-w-md mx-auto mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="max-w-md mx-auto mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif
        
        <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Create Manual Order</h2>
            
            <form action="{{ route('admin.manual-order.store') }}" method="POST">
                @csrf
                
                <div class="mb-4">
                    <label for="pakej" class="block text-sm font-medium text-gray-700 mb-2">
                        Package
                    </label>
                    <select 
                        id="pakej" 
                        name="pakej" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    >
                        <option value="">Select a package</option>
                        <option value="Premium">Premium</option>
                        <option value="Deluxe">Deluxe</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="order_date" class="block text-sm font-medium text-gray-700 mb-2">
                        Order Date
                    </label>
                    <input 
                        type="date" 
                        id="order_date" 
                        name="order_date" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        required
                        value="{{ date('Y-m-d') }}"
                    >
                </div>

                <div class="mb-6">
                    <label for="amount" class="block text-sm font-medium text-gray-700 mb-2">
                        Amount (RM)
                    </label>
                    <input 
                        type="number" 
                        id="amount" 
                        name="amount" 
                        step="0.01" 
                        min="0"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="0.00"
                        required
                    >
                </div>

                <div class="flex justify-end mt-6">
                    <button 
                        type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-md transition duration-200 shadow-lg border-2 border-blue-500"
                        onclick="return confirm('Are you sure you want to create this order?')"
                        style="min-width: 120px;"
                    >
                        Create Order
                    </button>
                </div>
            </form>
        </div>

        <!-- Kad Search and Payment Status Section -->
        <div class="max-w-md mx-auto mt-8 bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Manage Payment Status</h2>
            
            <form action="{{ route('admin.kad.search') }}" method="POST" class="mb-6">
                @csrf
                
                <div class="mb-4">
                    <label for="kad_slug" class="block text-sm font-medium text-gray-700 mb-2">
                        Kad Slug
                    </label>
                    <input 
                        type="text" 
                        id="kad_slug" 
                        name="slug" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter kad slug"
                        required
                        value="{{ old('slug') }}"
                    >
                </div>

                <div class="flex justify-end">
                    <button 
                        type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-md transition duration-200 shadow-lg border-2 border-blue-500"
                        style="min-width: 120px;"
                    >
                        Search
                    </button>
                </div>
            </form>

            @if(session('kad_search_result'))
                @php
                    $kad = session('kad_search_result');
                @endphp
                <div class="border-t pt-6 mt-6">
                    <h3 class="text-lg font-semibold mb-4 text-gray-800">Kad Information</h3>
                    
                    <div class="space-y-3 mb-4">
                        <div>
                            <span class="text-sm font-medium text-gray-600">Slug:</span>
                            <span class="text-sm text-gray-800 ml-2">{{ $kad->slug }}</span>
                        </div>
                        <div>
                            <span class="text-sm font-medium text-gray-600">Current Payment Status:</span>
                            <span class="text-sm font-semibold ml-2 {{ $kad->is_paid ? 'text-green-600' : 'text-red-600' }}">
                                {{ $kad->is_paid ? 'PAID' : 'UNPAID' }}
                            </span>
                        </div>
                        @if($kad->nama_panggilan_lelaki || $kad->nama_panggilan_perempuan)
                            <div>
                                <span class="text-sm font-medium text-gray-600">Couple:</span>
                                <span class="text-sm text-gray-800 ml-2">
                                    {{ $kad->nama_panggilan_lelaki ?? '' }} & {{ $kad->nama_panggilan_perempuan ?? '' }}
                                </span>
                            </div>
                        @endif
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3 mt-6">
                        <a 
                            href="/invitation/{{ $kad->slug }}" 
                            target="_blank"
                            class="flex-1 bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-md transition duration-200 shadow-md text-center"
                        >
                            View Kad
                        </a>

                        <form 
                            action="{{ route('admin.kad.update-payment-status', $kad->id) }}" 
                            method="POST" 
                            class="flex-1"
                        >
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="is_paid" value="{{ $kad->is_paid ? 0 : 1 }}">
                            <button 
                                type="submit" 
                                class="w-full {{ $kad->is_paid ? 'bg-red-600 hover:bg-red-700' : 'bg-green-600 hover:bg-green-700' }} text-white font-medium py-2 px-4 rounded-md transition duration-200 shadow-md"
                                onclick="return confirm('Are you sure you want to change payment status to {{ $kad->is_paid ? 'UNPAID' : 'PAID' }}?')"
                            >
                                Mark as {{ $kad->is_paid ? 'UNPAID' : 'PAID' }}
                            </button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        document.getElementById('pakej').addEventListener('change', function() {
            const amountField = document.getElementById('amount');
            const selectedPackage = this.value;
            
            if (selectedPackage === 'Premium') {
                amountField.value = '49.00';
            } else if (selectedPackage === 'Deluxe') {
                amountField.value = '69.00';
            } else {
                amountField.value = '';
            }
        });

    </script>
</x-app-layout>
