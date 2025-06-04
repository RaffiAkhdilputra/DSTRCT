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

    protected $queryString = ['search', 'category', 'selectedTags', 'minPrice', 'maxPrice'];

    public function updating($property)
    {
        $this->resetPage();
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
            foreach ($this->selectedTags as $tag) {
                $query->where('tags', 'like', "%{$tag}%");
            }
        }

        $query->whereBetween('price', [$this->minPrice, $this->maxPrice]);

        $products = $query->paginate(9);

        return view('livewire.shop', [
            'products' => $products
        ]);
    }
}
