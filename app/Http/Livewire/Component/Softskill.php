<?php

namespace App\Http\Livewire\Component;

use App\Models\Soft_skills;
use Livewire\Component;

class Softskill extends Component
{
    public $skills;

    public function mount()
    {

        $this->skills =  Soft_skills::OrderBy('order_number')->get();

    }
    public function render()
    {
        return view('livewire.component.softskill');
    }
}
