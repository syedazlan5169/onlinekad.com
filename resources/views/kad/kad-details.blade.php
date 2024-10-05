<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 leading-tight">
            {{ __('Kad Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>Id: {{ $kadData->id }}</p>
                    @foreach ($rsvp as $entry)
                    <p>{{ $entry->nama }}</p>
                    @endforeach
                    @foreach ($wishes as $wish)
                    <p>{{ $wish->wish }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
