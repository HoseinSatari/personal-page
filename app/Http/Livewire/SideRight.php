<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SideRight extends Component
{
    public $readyToLoad  = false;

    public function load()
    {
        $this->readyToLoad = true;
    }
    public function render()
    {
            return view('livewire.side-right');
    }
}
