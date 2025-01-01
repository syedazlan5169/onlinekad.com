<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Design;
use Livewire\WithPagination;

class KatalogList extends Component
{
    use WithPagination;

    public $category = '';
    
    public function render()
    {
        // Fetch products from the database
        $products = Design::when($this->category, function ($query)
                    {
                        $query->where('category', $this->category);
                    })->paginate(12);

        return view('livewire.katalog-list', compact('products'));
    }
}
