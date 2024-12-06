<!-- Best Selling Section -->
<div>

    <div class="mx-auto max-w-2xl px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <div class="flex space-x-3">
                <div class="flex space-x-3 items-center">
                    <label class="w-40 ml-3 text-sm font-medium text-gray-900">Kategory:</label>
                    <select wire:model.live.debounce.300ms="category"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option value="">All</option>
                        <option value="floral">Floral</option>
                        <option value="abstract">Abstract</option>
                    </select>
                </div>
            </div>
        <div class="mt-6 grid grid-cols-2 gap-x-4 gap-y-10 sm:gap-x-6 md:grid-cols-4 md:gap-y-0 lg:gap-x-8">
            @foreach($products as $product)
                <div class="group relative mb-8 bg-white shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105">
                    <!-- Product Image -->
                    <div class="h-56 w-full overflow-hidden bg-gray-100 lg:h-72 xl:h-80">
                        <img src="{{ asset($product->product_image_url) }}" alt="{{ $product->design_code }}"
                            class="h-full w-full object-cover object-center group-hover:opacity-90 transition-opacity duration-300">
                    </div>

                    <!-- Product Title -->
                    <h3 class="my-4 text-center font-bold text-gray-800 text-xl transition-colors duration-300 group-hover:text-indigo-600">
                        {{ $product->design_code }}
                    </h3>

                    <!-- Call-to-Action Buttons -->
                    <div class="flex flex-col items-center space-y-2 pb-4 px-4">
                        <!-- Tempah Button -->
                        <x-primary-button href="{{ route('form-tempah.show', ['id' => $product->id]) }}" 
                            class="w-full text-center py-2 bg-indigo-600 hover:bg-indigo-500 text-white rounded-lg shadow-md">
                            Tempah
                        </x-primary-button>
                        
                        <!-- Live Preview Button -->
                        <x-primary-button href="preview/{{ $product->design_code }}" 
                            class="w-full text-center py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg shadow-md mt-2 sm:mt-0">
                            Live Preview
                        </x-primary-button>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-4 pb-10">{{ $products->links() }}</div>
    </div>
</div>