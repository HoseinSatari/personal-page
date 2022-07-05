<?php

namespace App\Http\Livewire\Component;

use App\Models\info_basic;
use Livewire\Component;

class Infobasic extends Component
{

   public $info;

    public function mount()
    {
        $this->info = info_basic::find(1);
   }

    public function render()
    {
        return view('livewire.component.infobasic');
    }
}
