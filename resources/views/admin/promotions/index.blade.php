<x-app-layout>
    <x-slot:header>
       Promotions Management 
    </x-slot>
    
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold mb-4">Manage Promotions</h2>

        <a href="{{ route('admin.promotions.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ Add New Promotion</a>

        @if(session('success'))
            <div class="mt-4 p-2 bg-green-200 text-green-800 rounded">{{ session('success') }}</div>
        @endif

        <table class="w-full mt-6 border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2 border">Name</th>
                    <th class="p-2 border">Type</th>
                    <th class="p-2 border">Amount</th>
                    <th class="p-2 border">Start Date</th>
                    <th class="p-2 border">End Date</th>
                    <th class="p-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($promotions as $promotion)
                    <tr>
                        <td class="p-2 border">{{ $promotion->name }}</td>
                        <td class="p-2 border">{{ ucfirst($promotion->discount_type) }}</td>
                        <td class="p-2 border">RM {{ $promotion->discount_amount }}</td>
                        <td class="p-2 border">{{ $promotion->start_date }}</td>
                        <td class="p-2 border">{{ $promotion->end_date }}</td>
                        <td class="p-2 border">
                            <a href="{{ route('admin.promotions.edit', $promotion) }}" class="text-blue-500">Edit</a> |
                            <form action="{{ route('admin.promotions.destroy', $promotion) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500" onclick="return confirm('Are you sure?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
