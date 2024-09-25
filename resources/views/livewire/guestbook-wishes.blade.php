<div id="wishes-section">
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