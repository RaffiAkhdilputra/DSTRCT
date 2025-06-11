<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;

class SearchBar extends Component
{
    public string $query = '';

    public function submitSearch()
    {
        dd($this->query);
        
        $trimmedQuery = trim($this->query);

        if (empty($trimmedQuery)) {
            return Redirect::route('products.index');
        }
        return Redirect::route('products.search', ['query' => $trimmedQuery]);
    }

    public function render()
    {
        return view('livewire.search-bar');
    }
}