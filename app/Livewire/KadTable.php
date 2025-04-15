<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Kad;
use App\Models\Package;
use App\Models\Design;
use Livewire\WithPagination;

class KadTable extends Component
{
    use WithPagination;

    public $search = '';
    public $package = '';
    public $perPage = 10;
    public $sortBy = 'created_at';
    public $sortDir = 'DESC';

    public function mount()
    {
        $this->packages = Package::all();
        $this->designs = Design::all();
        $this->kads = Kad::all();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $kad = Kad::search($this->search)
                    ->orderBy($this->sortBy, $this->sortDir)
                    ->paginate($this->perPage);

        return view('livewire.kad-table', compact('kad'));
    }
}
