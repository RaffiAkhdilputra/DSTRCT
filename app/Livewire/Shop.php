<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class Shop extends Component
{
    use WithPagination;

    public $search = '';
    public $category = 'all';
    public $selectedTags = [];
    public $minPrice = 0;
    public $maxPrice = 5000000;
    public $perPage = 9; // Set default number of items per page

    protected $queryString = [
        'search' => ['except' => ''], 
        'category' => ['except' => 'all'], 
        'selectedTags' => ['except' => []], 
        'minPrice' => ['except' => 0], 
        'maxPrice' => ['except' => 5000000]
    ];

    // Reset pagination only when filters affecting results change
    public function updated($property)
    {
        if (in_array($property, ['search', 'category', 'selectedTags', 'minPrice', 'maxPrice'])) {
            $this->resetPage();
        }
    }

    public function render()
    {
        $query = Product::query();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        if ($this->category !== 'all') {
            $query->where('category', $this->category);
        }

        if (!empty($this->selectedTags)) {
            $query->whereIn('tags', $this->selectedTags); // More optimized query
        }

        $query->whereBetween('price', [$this->minPrice, $this->maxPrice]);

        $products = $query->paginate(    $this->perPage);

        return view('livewire.shop', compact('products'));
    }
}