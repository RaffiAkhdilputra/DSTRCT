<?php

namespace App\Livewire;

use Livewire\Component;

class Profile extends Component
{
    public function logout(){
        auth()->logout();
        session()->flush();
        session()->regenerateToken();
        return redirect('/');
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
