<x-app-layout>
    <x-slot:header>
        Edit Promotion
    </x-slot>

    <div class="container mx-auto p-6">
        <form action="{{ route('admin.promotions.update', $promotion) }}" method="POST">
            @csrf
            @method('PUT')

            <label class="block mt-4">Promotion Name:</label>
            <input type="text" name="name" value="{{ $promotion->name }}" class="w-full p-2 border rounded" required>

            <label class="block mt-4">Discount Type:</label>
            <select name="discount_type" class="w-full p-2 border rounded">
                <option value="fixed" {{ $promotion->discount_type == 'fixed' ? 'selected' : '' }}>Fixed (RM)</option>
                <option value="percentage" {{ $promotion->discount_type == 'percentage' ? 'selected' : '' }}>Percentage (%)</option>
            </select>

            <label class="block mt-4">Discount Amount:</label>
            <input type="number" name="discount_amount" value="{{ $promotion->discount_amount }}" class="w-full p-2 border rounded" required>

            <label class="block mt-4">Start Date:</label>
            <input type="datetime-local" name="start_date" value="{{ $promotion->start_date }}" class="w-full p-2 border rounded" required>

            <label class="block mt-4">End Date:</label>
            <input type="datetime-local" name="end_date" value="{{ $promotion->end_date }}" class="w-full p-2 border rounded" required>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-4 rounded">Update Promotion</button>
        </form>
    </div>
</x-app-layout>
