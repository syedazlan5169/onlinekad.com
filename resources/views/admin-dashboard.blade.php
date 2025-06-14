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
        <!-- Debug info -->
        <div class="text-sm text-gray-500 mb-4">
            Current tab: <span x-text="selectedTab"></span>
        </div>
        
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
                        <dd class="text-xs font-medium text-rose-600">{{ $monthVisitorChange }}</dd>
                        <dd class="w-full flex-none text-3xl/10 font-medium tracking-tight text-gray-900">{{ $thisMonthVisitor }}</dd>
                    </div>
                    <div class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 bg-white px-4 py-10 sm:px-6 xl:px-8">
                        <dt class="text-sm/6 font-medium text-gray-500">This Week</dt>
                        <dd class="text-xs font-medium text-gray-700">{{ $weekVisitorChange }}</dd>
                        <dd class="w-full flex-none text-3xl/10 font-medium tracking-tight text-gray-900">{{ $thisWeekVisitor }}</dd>
                    </div>
                    <div class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 bg-white px-4 py-10 sm:px-6 xl:px-8">
                        <dt class="text-sm/6 font-medium text-gray-500">Today</dt>
                        <dd class="text-xs font-medium text-rose-600">{{ $dayVisitorChange }}</dd>
                        <dd class="w-full flex-none text-3xl/10 font-medium tracking-tight text-gray-900">{{ $todayVisitor }}</dd>
                    </div>
                </dl>
            </div>
            <!-- End of visitor panel -->
        </div>
        
        <!-- Revenue -->
        <div x-show="selectedTab === 'revenue'" x-cloak>
            <!-- Statistic Panel -->
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <dl class="mx-auto grid grid-cols-1 gap-px bg-gray-900/5 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 bg-white px-4 py-10 sm:px-6 xl:px-8">
                        <dt class="text-sm/6 font-medium text-gray-500">Total Revenue</dt>
                        <dd class="w-full flex-none text-3xl/10 font-medium tracking-tight text-gray-900">RM{{ $totalRevenue }}</dd>
                    </div>
                    <div class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 bg-white px-4 py-10 sm:px-6 xl:px-8">
                        <dt class="text-sm/6 font-medium text-gray-500">This Month</dt>
                        <dd class="text-xs font-medium text-rose-600">{{ $monthChange }}</dd>
                        <dd class="w-full flex-none text-3xl/10 font-medium tracking-tight text-gray-900">RM{{ $thisMonthRevenue }}</dd>
                    </div>
                    <div class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 bg-white px-4 py-10 sm:px-6 xl:px-8">
                        <dt class="text-sm/6 font-medium text-gray-500">This Week</dt>
                        <dd class="text-xs font-medium text-gray-700">{{ $weekChange }}</dd>
                        <dd class="w-full flex-none text-3xl/10 font-medium tracking-tight text-gray-900">RM{{ $thisWeekRevenue }}</dd>
                    </div>
                    <div class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 bg-white px-4 py-10 sm:px-6 xl:px-8">
                        <dt class="text-sm/6 font-medium text-gray-500">Today</dt>
                        <dd class="text-xs font-medium text-rose-600">{{ $dayChange }}</dd>
                        <dd class="w-full flex-none text-3xl/10 font-medium tracking-tight text-gray-900">RM{{ $todayRevenue }}</dd>
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
