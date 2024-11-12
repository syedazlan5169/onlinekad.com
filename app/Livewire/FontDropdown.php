<?php

namespace App\Livewire;

use App\Models\Font;
use Livewire\Component;

class FontDropdown extends Component
{
    public $fonts;
    public $selectedFont;

    public function mount($currentSelectedFont = null)
    {
        $this->fonts = Font::all();
        $this->selectedFont = $currentSelectedFont ?? $this->fonts->first()->id;
    }
    public function render()
    {
        return view('livewire.font-dropdown');
    }
}
