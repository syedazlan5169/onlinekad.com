@unless ($breadcrumbs->isEmpty())
    <nav class="container mx-auto">
        <ol class="p-2 rounded flex flex-wrap bg-gray-300 text-sm bg-opacity-75 text-gray-800">
            @foreach ($breadcrumbs as $breadcrumb)

                @if ($breadcrumb->url && !$loop->last)
                    <li>
                        <a href="{{ $breadcrumb->url }}" class="text-indigo-600 hover:text-indigo-900 hover:underline focus:text-indigo-900 focus:underline">
                            {{ $breadcrumb->title }}
                        </a>
                    </li>
                @else
                    <li>
                        {{ $breadcrumb->title }}
                    </li>
                @endif

                @unless($loop->last)
                    <li class="text-gray-500 px-2">
                        ->
                    </li>
                @endif

            @endforeach
        </ol>
    </nav>
@endunless
