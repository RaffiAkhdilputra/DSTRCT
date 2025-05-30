<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class RegisterForm extends Form
{
    public RegisterForm $form; // Inject the form class

    public function register()
    {
        $this->form->register(); // Call the form's register method
    }

    public function render()
    {
        return view('livewire.register');
    }
}
