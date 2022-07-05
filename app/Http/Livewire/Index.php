<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Index extends Component
{
    public $readytoload;

    public function load()
    {
        $this->readytoload = true;
    }
    public function render()
    {
        return view('livewire.index');
    }
}
