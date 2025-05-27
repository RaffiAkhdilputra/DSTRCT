<?php

namespace App\Livewire;

use Livewire\Layout;
use Livewire\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('DSTRCT | Home')]
class Index extends Component
{
    public string $name;

    public function mount()
    {
        $this->name = auth()->check() ? auth()->user()->name : 'Guest';
    }

    public function render()
    {
        return view('livewire.index');
    }
}
