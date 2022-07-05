<?php

namespace App\Http\Livewire\Component;

use App\Models\Skills;
use Livewire\Component;

class Skill extends Component
{
    public $skills;

    public function mount()
    {
        $this->skills = Skills::OrderBy('order_number')->get();

    }

    public function render()
    {
        return view('livewire.component.skill');
    }
}
