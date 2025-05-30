<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Layout;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Livewire\Attributes\Validate;

#[Layout('layouts.app')]  // Consistent layout
class Register extends Component
{
    #[Validate('required|string|max:255')]
    public $name;

    #[Validate('required|email|unique:users,email|max:255')]
    public $email;

    #[Validate('required|string|min:8')]
    public $password;

    #[Validate('required|string|same:password')]
    public $confirm_password;

    public function register()
    {
        $this->validate();

        $this->isLoading = true;

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('success', 'Registrasi berhasil! Silakan login.');
        $this->isLoading = false;
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.register');
    }
}