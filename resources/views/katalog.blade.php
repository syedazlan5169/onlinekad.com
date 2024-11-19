<x-app-layout>
    <x-slot name="header">
        <h2 class="mb-5 font-semibold text-gray-800 leading-tight">
            {{ __('Katalog') }}
        </h2>
        <div>
            {{ Breadcrumbs::render('katalog') }}
        </div>
    </x-slot>

        <div class="relative isolate mt-12 sm:mt-0 sm:pt-32">

            <svg class="absolute inset-0 -z-10 hidden h-full w-full stroke-gray-200 [mask-image:radial-gradient(64rem_64rem_at_top,white,transparent)] sm:block" aria-hidden="true">
            <defs>
                <pattern id="55d3d46d-692e-45f2-becd-d8bdc9344f45" width="200" height="200" x="50%" y="0" patternUnits="userSpaceOnUse">
                <path d="M.5 200V.5H200" fill="none" />
                </pattern>
            </defs>
            <svg x="50%" y="0" class="overflow-visible fill-gray-50">
                <path d="M-200.5 0h201v201h-201Z M599.5 0h201v201h-201Z M399.5 400h201v201h-201Z M-400.5 600h201v201h-201Z" stroke-width="0" />
            </svg>
            <rect width="100%" height="100%" stroke-width="0" fill="url(#55d3d46d-692e-45f2-becd-d8bdc9344f45)" />
            </svg>
            <div class="relative">
            <div class="absolute inset-x-0 top-1/2 -z-10 -translate-y-1/2 transform-gpu overflow-hidden opacity-30 blur-3xl" aria-hidden="true">
                <div class="ml-[max(50%,38rem)] aspect-[1313/771] w-[82.0625rem] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
            </div>
            <div class="absolute inset-x-0 top-0 -z-10 flex transform-gpu overflow-hidden pt-8 opacity-25 blur-3xl xl:justify-end" aria-hidden="true">
                <div class="ml-[-22rem] aspect-[1313/771] w-[82.0625rem] flex-none origin-top-right rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] xl:ml-0 xl:mr-[calc(50%-12rem)]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
            </div>


            <!-- Best Selling Section -->
            <div>
                <div class="mx-auto max-w-2xl px-4 sm:px-6 lg:max-w-7xl lg:px-8">
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
                </div>
            </div>

        </div>
</x-app-layout>
