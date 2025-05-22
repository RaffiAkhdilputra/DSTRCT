<?php

namespace App\Livewire;

use Livewire\Layout;
use Livewire\Component;

#[Layout('layouts.app')]

class Login extends Component
{
    public function render()
    {
        return view('livewire.login');
    }
}
