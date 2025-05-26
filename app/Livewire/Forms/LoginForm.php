<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Livewire\Attributes\Validate;

#[Layout('livewire.layouts.app')]
class Register extends Component
{
    #[Validate('required|string|max:255')]
    public $name;

    #[Validate('required|email|unique:users,email|max:255')]
    public $email;

    #[Validate('required|string|min:8|confirmed')]
    public $password;

    public $password_confirmation;

    public function register()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }

    public function render()
    {
        return view('livewire.register');
    }
}