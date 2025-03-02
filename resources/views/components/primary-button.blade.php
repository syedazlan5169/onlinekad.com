@if (isset($href))
    <!-- Render an <a> tag if href is present -->
    <a href="{{ $href }}" {{ $attributes->merge(['class' => 'inline-block rounded-md bg-indigo-700 px-3.5 py-2.5 text-sm font-semibold text-white text-center shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600']) }}>
        {{ $slot }}
    </a>
@else
    <!-- Render a <button> tag if href is not present -->
    <button {{ $attributes->merge(['type' => 'submit', 'class' => 'rounded-md bg-indigo-700 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600']) }}>
        {{ $slot }}
    </button>
@endif
