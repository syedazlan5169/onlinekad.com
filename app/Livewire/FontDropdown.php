<?php

namespace App\Livewire;

use App\Models\Font;
use Livewire\Component;

class FontDropdown extends Component
{
    public $fonts;
    public $selectedFont;

    public function mount($selectedFont = 1)
    {
        $this->fonts = Font::all();
        $this->selectedFont = $selectedFont;
    }
    public function render()
    {
        return view('livewire.font-dropdown');
    }
}
