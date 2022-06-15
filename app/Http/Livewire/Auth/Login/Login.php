<?php

namespace App\Http\Livewire\Auth\Login;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $phone;
    public $password;

    public $rules = [
        'phone' => 'required|ir_mobile:zero',
        'password' => 'required'
    ];

    public function updated($name)
    {
        $this->validateOnly($name);
    }
    public function login()
    {
        $user = User::wherephone($this->phone)->first();

        if ($user and Auth::attempt(['phone' => $this->phone, 'password' => $this->password])) {
            Auth::loginUsingId($user->id, 0);
            toastr()->success('شما وارد حساب کاربری خود شدید');
            return redirect(route('home'));
        } else {
            $this->emit('toast', 'error', 'نام کاربری یا کلمه عبور اشتباه است');
        }
    }

    public function render()
    {
        return view('livewire.auth.login.login')->layout('layouts.auth');
    }
}
