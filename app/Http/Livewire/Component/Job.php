<?php

namespace App\Http\Livewire\Component;

use App\Models\Work_samples;
use Livewire\Component;

class Job extends Component
{
    public $jobs;

    public function mount()
    {
        $this->jobs = Work_samples::OrderBy('order_number')->get();
    }
    public function render()
    {
        return view('livewire.component.job');
    }
}
