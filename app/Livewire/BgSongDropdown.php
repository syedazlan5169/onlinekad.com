<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BgSong;

class BgSongDropdown extends Component
{
    public $bgSongs; // Property to hold the list of songs
    public $selectedSong; // Property for selected song

    public function mount($selectedSong = null)
    {
        // Fetch the background songs from the database
        $this->bgSongs = BgSong::all(); // Get all records from BgSong model

        $this->selectedSong = $selectedSong;
    }
    public function render()
    {
        return view('livewire.bg-song-dropdown');
    }
}
