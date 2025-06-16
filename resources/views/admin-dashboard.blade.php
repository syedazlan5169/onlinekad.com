<x-app-layout>
    <x-slot name="header">
        <h2 class="mb-5 font-semibold  text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
        <div class="mb-0 pb-0">
            {{ Breadcrumbs::render('admin') }}
        </div>
    </x-slot>

    <div  x-data="{ selectedTab: 'revenue'}" class="relative isolate mt-12 sm:mt-10 sm:pt-12">
        
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

        <div class="flex justify-center mb-10">
            <span class="isolate inline-flex rounded-md shadow-sm">
                <button type="button" @click="selectedTab = 'revenue'"
                    class="relative inline-flex items-center rounded-l-md px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-10"
                    :class="selectedTab === 'revenue' ? 'text-white bg-indigo-500 ring-indigo-500 hover:bg-indigo-500' : 'bg-white text-gray-900 hover:bg-gray-50'"
                    >Revenue</button>
                <button type="button" @click="selectedTab = 'visitor'"
                     class="relative -ml-px inline-flex items-center rounded-r-md px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-10"
                     :class="selectedTab === 'visitor' ? 'text-white bg-indigo-500 ring-indigo-500 hover:bg-indigo-500' : 'bg-white text-gray-900 hover:bg-gray-50'"
                     >Visitor</button>
            </span>
        </div>

        <!-- Visitor -->
        <div x-show="selectedTab === 'visitor'" x-cloak>
            <!-- Visitor Panel -->
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <dl class="mx-auto grid grid-cols-1 gap-px bg-gray-900/5 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 bg-white px-4 py-10 sm:px-6 xl:px-8">
                        <dt class="text-sm/6 font-medium text-gray-500">Total Visitor</dt>
                        <dd class="w-full flex-none text-3xl/10 font-medium tracking-tight text-gray-900">{{ $totalVisitor }}</dd>
                    </div>
                    <div class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 bg-white px-4 py-10 sm:px-6 xl:px-8">
                        <dt class="text-sm/6 font-medium text-gray-500">This Month</dt>
                        <dd class="text-xs font-medium {{ $monthVisitorChange > 0 ? 'text-green-600' : ($monthVisitorChange < 0 ? 'text-rose-600' : 'text-gray-600') }}">{{ $monthVisitorChange }}</dd>
                        <dd class="w-full flex-none text-3xl/10 font-medium tracking-tight text-gray-900">{{ number_format($thisMonthVisitor) }}</dd>
                    </div>
                    <div class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 bg-white px-4 py-10 sm:px-6 xl:px-8">
                        <dt class="text-sm/6 font-medium text-gray-500">This Week</dt>
                        <dd class="text-xs font-medium {{ $weekVisitorChange > 0 ? 'text-green-600' : ($weekVisitorChange < 0 ? 'text-rose-600' : 'text-gray-600') }}">{{ $weekVisitorChange }}</dd>
                        <dd class="w-full flex-none text-3xl/10 font-medium tracking-tight text-gray-900">{{ number_format($thisWeekVisitor) }}</dd>
                    </div>
                    <div class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 bg-white px-4 py-10 sm:px-6 xl:px-8">
                        <dt class="text-sm/6 font-medium text-gray-500">Today</dt>
                        <dd class="text-xs font-medium {{ $dayVisitorChange > 0 ? 'text-green-600' : ($dayVisitorChange < 0 ? 'text-rose-600' : 'text-gray-600') }}">{{ $dayVisitorChange }}</dd>
                        <dd class="w-full flex-none text-3xl/10 font-medium tracking-tight text-gray-900">{{ number_format($todayVisitor) }}</dd>
                    </div>
                </dl>
            </div>
            <!-- End of visitor panel -->

            <!-- Visitor Source -->
            <div class="mt-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow sm:rounded-lg overflow-hidden">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-semibold leading-6 text-gray-900 mb-6 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            Visitor Source Analytics
                        </h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-blue-500 mr-3" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/>
                                    </svg>
                                    <span class="font-medium text-gray-700">Google</span>
                                </div>
                                <span class="text-lg font-semibold text-gray-900">{{ number_format($googleVisitor) }}</span>
                            </div>
                            
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-pink-500 mr-3" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                    </svg>
                                    <span class="font-medium text-gray-700">Instagram</span>
                                </div>
                                <span class="text-lg font-semibold text-gray-900">{{ number_format($instagramVisitor) }}</span>
                            </div>
                            
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-indigo-500 mr-3" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/>
                                    </svg>
                                    <span class="font-medium text-gray-700">Onlinekad</span>
                                </div>
                                <span class="text-lg font-semibold text-gray-900">{{ number_format($onlinekadVisitor) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Revenue -->
        <div x-show="selectedTab === 'revenue'" x-cloak>
            <!-- Statistic Panel -->
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <dl class="mx-auto grid grid-cols-1 gap-px bg-gray-900/5 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 bg-white px-4 py-10 sm:px-6 xl:px-8">
                        <dt class="text-sm/6 font-medium text-gray-500">Total Revenue</dt>
                        <dd class="w-full flex-none text-3xl/10 font-medium tracking-tight text-gray-900">RM{{ number_format($totalRevenue, 2) }}</dd>
                    </div>
                    <div class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 bg-white px-4 py-10 sm:px-6 xl:px-8">
                        <dt class="text-sm/6 font-medium text-gray-500">This Month</dt>
                        <dd class="text-xs font-medium {{ $monthChange > 0 ? 'text-green-600' : ($monthChange < 0 ? 'text-rose-600' : 'text-gray-600') }}">{{ $monthChange }}</dd>
                        <dd class="w-full flex-none text-3xl/10 font-medium tracking-tight text-gray-900">RM{{ number_format($thisMonthRevenue, 2) }}</dd>
                    </div>
                    <div class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 bg-white px-4 py-10 sm:px-6 xl:px-8">
                        <dt class="text-sm/6 font-medium text-gray-500">This Week</dt>
                        <dd class="text-xs font-medium {{ $weekChange > 0 ? 'text-green-600' : ($weekChange < 0 ? 'text-rose-600' : 'text-gray-600') }}">{{ $weekChange }}</dd>
                        <dd class="w-full flex-none text-3xl/10 font-medium tracking-tight text-gray-900">RM{{ number_format($thisWeekRevenue, 2) }}</dd>
                    </div>
                    <div class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 bg-white px-4 py-10 sm:px-6 xl:px-8">
                        <dt class="text-sm/6 font-medium text-gray-500">Today</dt>
                        <dd class="text-xs font-medium {{ $dayChange > 0 ? 'text-green-600' : ($dayChange < 0 ? 'text-rose-600' : 'text-gray-600') }}">{{ $dayChange }}</dd>
                        <dd class="w-full flex-none text-3xl/10 font-medium tracking-tight text-gray-900">RM{{ number_format($todayRevenue, 2) }}</dd>
                    </div>
                </dl>
            </div>
            <!-- End of statistic panel -->
                
            <!-- Statistic table -->
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
                
                <livewire:kad-table />
            </div>
            <!-- End of Statistic table -->
        </div>

        

    </div>
</x-app-layout>
