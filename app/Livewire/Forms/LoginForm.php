<?php

namespace App\Livewire\Forms;

use Livewire\Layout;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

#[Layout('layouts.app')]

class LoginForm extends Form
{
    public $email;
    public $password;

    public function submit()
    {
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        } else {
            // Authentication failed
            $this->addError('email', 'Email atau password salah.');
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}