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
