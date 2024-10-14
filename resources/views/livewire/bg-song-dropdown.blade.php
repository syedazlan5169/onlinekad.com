<div class="mt-2">
    <select id="bg-song-id" name="bg-song-id" wire:model="selectedSong" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:max-w-xs sm:text-sm">
        <option value="">Pilih Muzik Latar</option>
        @foreach($bgSongs as $song)
            <option value="{{ $song->id }}" {{ $selectedSong == $song->id ? 'selected' : '' }}>{{ $song->song_name }}</option>
        @endforeach
    </select>
</div>
