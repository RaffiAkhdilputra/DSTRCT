<?php

namespace App\Livewire\Forms;

use Livewire\Layout;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

#[Layout('layouts.app')]

class LoginForm extends Form
{
    #[Validate('required|email')]
    public $email;

    #[Validate('required')] // Basic required validation for password
    public $password;

    public function login()
    {
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        } else {
            $this->addError('email', 'Email atau password salah.');
            $this->addError('password', 'Email atau password salah.');
        }
    }

}