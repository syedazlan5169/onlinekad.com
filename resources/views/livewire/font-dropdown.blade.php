<div>
    <select id="font" name="font" x-model='selectedFont' class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:max-w-xs sm:text-sm">
        @foreach ($fonts as $font)
            <option value="{{ $font->id }}">{{ $font->font_name }}</option>
        @endforeach
    </select>
</div>
