<?php

namespace App\Livewire;

use Livewire\Component;

class Pagination extends Component
{
    /**
     * Render the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('components.pagination', [
            'previousText' => '&laquo; Previous',
            'nextText' => 'Next &raquo;',
        ]);
    }
}