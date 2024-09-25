<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Guestbook;
use Livewire\WithPagination;

class GuestbookWishes extends Component
{
    use WithPagination;

    public $kad_id;

    public function mount($kad_id)
    {
        $this->kad_id = $kad_id;
    }

    public function updatingPage()
    {
        $this->dispatch('pageChanged'); // This emits the event when the page changes
    }

    public function render()
    {
        $wishes = Guestbook::where('kad_id', $this->kad_id)->latest()->paginate(6);

        return view('livewire.guestbook-wishes', compact('wishes'));
    }
}
