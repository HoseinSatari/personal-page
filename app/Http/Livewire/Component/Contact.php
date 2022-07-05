<?php

namespace App\Http\Livewire\Component;

use App\Models\Call_me;
use App\Models\Option;
use Livewire\Component;

class Contact extends Component
{
    public $option;
    public $name;
    public $phone;
    public $email;
    public $text;
    public $rules = [
        'name' => 'required',
        'phone' => 'nullable',
        'email' => 'nullable',
        'text' => 'required',
    ];

    public function mount()
    {
        $this->option = Option::find(1);
   }
    public function updated($name)
    {
        $this->validateOnly($name);
  }


    public function store()
    {

        $this->validate();
        Call_me::create([
            'name' => $this->name,
            'phone' => $this->phone ?? null,
            'email' => $this->email ?? null,
            'text' => $this->text,
            ]);

        $this->name = $this->phone = $this->message = $this->text = null;
        $this->emit('toast' , 'success' , 'از پیغام شما متشکرم ، در صورت نیاز با شما ارتباط خواهم گرفت.');
    }
    public function render()
    {
        return view('livewire.component.contact');
    }
}
