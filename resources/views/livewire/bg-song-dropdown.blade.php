<div class="mt-2">
    <select id="bg-song-id" name="bg-song-id" wire:model="selectedSong" wire:change="triggerUpdatedSelectedSong" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:max-w-xs sm:text-sm">
        @foreach($bgSongs as $song)
            <option value="{{ $song->id }}" {{ $selectedSong == $song->id ? 'selected' : '' }}>{{ $song->song_name }}</option>
        @endforeach
    </select>

    <audio class="h-8" controls wire:key="{{ $selectedSong }}">
        <source src="{{ $selectedSongUrl }}" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
</div>