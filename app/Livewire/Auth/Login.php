<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class Login extends Component
{
    public $email;
    public $password;

    #[Layout('layouts.guest')]
    public function render()
    {
        if(Auth::check()){
            return back();
        }
        return view('livewire.auth.login'); 
    }
    
    public function login()
    {
        if(Auth::check()){
            return back();
        }
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (!Auth::attempt([
            'email' => $this->email,
            'password' => $this->password,
        ])) {
            throw ValidationException::withMessages([
                'email' => 'ada kesalahan',
            ]);
        }

        return redirect()->intended('/dashboard');
    }
    
}