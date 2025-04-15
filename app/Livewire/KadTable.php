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
    public $paymentStatus = '';
    public $perPage = 10;
    public $sortBy = 'created_at';
    public $sortDir = 'DESC';
    
    // Declare properties to fix linter errors
    public $packages;
    public $designs;

    public function mount()
    {
        $this->packages = Package::all();
        $this->designs = Design::all();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }
    
    public function updatedPaymentStatus()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Kad::query();
        
        // Apply search if search term is provided
        if ($this->search) {
            $query->search($this->search);
        }
        
        // Apply payment status filter if selected
        if ($this->paymentStatus !== '') {
            $query->where('is_paid', $this->paymentStatus);
        }
        
        // Ensure we always have a valid collection, even if empty
        $kads = $query->orderBy($this->sortBy, $this->sortDir)
                      ->paginate($this->perPage);

        $totalKads = Kad::count();

        return view('livewire.kad-table', compact('kads', 'totalKads'));
    }
}
