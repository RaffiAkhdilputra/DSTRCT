<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Livewire\Attributes\Validate;

#[Layout('layouts.app')]

class Login extends Component
{
    #[Validate('required|email')]
    public $email;

    #[Validate('required')]
    public $password;

    public bool $isLoading = false;

    public function login()
    {
        $this->isLoading = true;

        $this->validate();

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {
            session()->regenerate();
            $this->isLoading = false;
            return redirect()->intended('/');
        } else {
            $this->addError('email', 'Email tidak ditemukan.');
            $this->addError('password', 'Password salah.');
            $this->isLoading = false;
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}