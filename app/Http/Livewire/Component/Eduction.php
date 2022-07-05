<?php

namespace App\Http\Livewire\Component;

use App\Models\education;
use App\Models\Work_experience;
use Livewire\Component;

class Eduction extends Component
{
    public $eductions;

    public function mount()
    {
        $this->eductions = education::OrderBy('order_number')->get();

    }
    public function render()
    {
        return view('livewire.component.eduction');
    }
}
