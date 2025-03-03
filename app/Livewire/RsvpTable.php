<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Rsvp;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class RsvpTable extends Component
{
    use WithPagination;

    public $kad_id;
    public $search = '';
    public $perPage = 10;
    public $kehadiran = '';
    public $sortBy = 'created_at';
    public $sortDir = 'DESC';

    // Initialize kad_id using the mount method
    public function mount($kad_id)
    {
        $this->kad_id = $kad_id;
    }

    public function setSortBy($sortByField)
    {
        if($this->sortBy === $sortByField)
        {
            $this->sortDir = ($this->sortDir == "ASC") ? 'DESC' : "ASC";
            return;
        }

        $this->sortBy = $sortByField;
        $this->sortDir = 'DESC';
    }

    public function updatedSearch()
    {
        $this->resetPage();  // This will reset the pagination to page 1 when the search term is updated
    }


    public function getKehadiranClass($kehadiran)
    {
        return match ($kehadiran) {
            'Hadir' => 'inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20 w-20 justify-center',
            'Tidak Hadir' => 'inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/20 w-20 justify-center',
            default => '',
        };
    }

    public function render()
    {
        // Fetch the RSVP records based on the Kad ID
        $rsvp = Rsvp::where('kad_id', $this->kad_id)
                    ->when($this->kehadiran, function ($query)
                    {
                        $query->where('kehadiran', $this->kehadiran);
                    })
                    ->orderBy($this->sortBy, $this->sortDir)
                    ->search($this->search)->paginate($this->perPage);

        return view('livewire.rsvp-table', compact('rsvp'));
    }
}
