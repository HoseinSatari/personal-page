<?php

namespace App\Http\Livewire\Component;

use App\Models\Work_experience;
use Livewire\Component;

class WorkExperianc extends Component
{
    public $works;

    public function mount()
    {
        $this->works = Work_experience::OrderBy('order_number')->get();
    }
    public function render()
    {
        return view('livewire.component.work-experianc');
    }
}
