<x-app-layout>
    <x-slot name="header">
        <h2 class="mb-5 font-semibold  text-gray-800 leading-tight">
            {{ __('Tutorial') }}
        </h2>
        <div class="mb-0 pb-0">
            {{ Breadcrumbs::render('tutorial') }}
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 text-gray-900">
                    {{ __("View from tutorial page") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
