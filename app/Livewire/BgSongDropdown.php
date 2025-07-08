<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BgSong;
use Illuminate\Support\Facades\Log;

class BgSongDropdown extends Component
{
    public $bgSongs;
    public $selectedSong;
    public $selectedSongUrl;

    public function mount($selectedSong = 2)
    {
        // Fetch all background songs
        $this->bgSongs = BgSong::all();

        // Set the initial selected song
        $this->selectedSong = $selectedSong;
        
        // Update the selected song URL based on the selected song
        $this->updateSelectedSongUrl();
    }

    public function triggerUpdatedSelectedSong()
    {
        $this->updatedSelectedSong();
    }

    public function updatedSelectedSong()
    {
        // Update the song URL when selected song changes
        $this->updateSelectedSongUrl();
    }

    public function updateSelectedSongUrl()
    {
        // Fetch the URL of the selected song
        $this->selectedSongUrl = BgSong::where('id', $this->selectedSong)->value('song_url'); 
    }

    public function render()
    {
        return view('livewire.bg-song-dropdown');
    }
}
