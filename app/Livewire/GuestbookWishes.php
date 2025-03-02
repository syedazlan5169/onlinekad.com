<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Guestbook;
use App\Models\Kad;
use Livewire\WithPagination;

class GuestbookWishes extends Component
{
    use WithPagination;

    public $kad_id;
    public $author;
    public $wish;

    protected $listeners = ['resetForm'];

    public function mount($kad_id)
    {
        $this->kad_id = $kad_id;
    }

    public function updatingPage()
    {
        $this->dispatch('pageChanged'); // This emits the event when the page changes
    }

    public function submitForm()
    {
        Guestbook::create([
            'kad_id' => $this->kad_id,
            'author' => $this->author,
            'wish' => $this->wish, 
        ]);

        $this->resetForm();
        $this->dispatch('close');
    }

    public function resetForm()
    {
        $this->reset(['author', 'wish']);
    }


    public function render()
    {
        $wishes = Guestbook::where('kad_id', $this->kad_id)->latest()->paginate(6);
        $kadData = Kad::findOrFail($this->kad_id);

        return view('livewire.guestbook-wishes', compact('wishes', 'kadData'));
    }
}
