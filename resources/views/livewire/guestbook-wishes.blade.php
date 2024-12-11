<div id="wishes-section">

    <!-- Ucapan Form -->
    <div x-data="{ openUcapan:  false }">
        <div class="flex justify-center items-center mb-5">
            <div>
                <!-- Open the modal using ID.showModal() method -->
                <x-primary-button @click="openUcapan = ! openUcapan">{{ $kadData->is_english ? 'Write a wish' : 'Tulis Ucapan' }}</x-primary-button>
            </div>
        </div>

        <div x-show="openUcapan" @close.window="openUcapan = false" x-collapse.duration.300ms class="overflow-hidden transition-all duration-300 py-10 mb-4 flex flex-col border border-gray-300 gap-4">
            <!-- Form fields -->
            <form wire:submit.prevent="submitForm">
                <div class="flex flex-col gap-2">
                    <h3>{{ $kadData->is_english ? 'Name' : 'Nama' }}</h3>
                    <input required type="text" class="py-2 px-1 text-black focus:to-blue-600 rounded-[4px]" name="author" id="author" wire:model="author">
                </div>
                <div class="flex flex-col gap-2">
                    <h3>{{ $kadData->is_english ? 'Wish' : 'Ucapan' }}</h3>
                    <textarea required class="py-2 px-1 text-black focus:to-blue-600 rounded-[4px]" name="wish" id="wish" wire:model="wish"></textarea>
                </div>

                <div class="py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <x-primary-button type="submit">Submit</x-primary-button>
                </div>
            </form>
        </div>
    </div>

    <!-- List of Ucapan -->
    <ul>
        @foreach($wishes as $wish)
            <li>
                <h1 class="text-center font-medium">{{ $wish->author }}</h1>
                <h2 class="text-center italic text-gray-600">{{ $wish->wish }}</h2>
                <hr class="border w-full my-4">
            </li>
        @endforeach
    </ul>

    <!-- Pagination Links -->
    {{ $wishes->links() }}
</div>