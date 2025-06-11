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
    public $selectedPromotions = [];
    public $minPrice = 200000;
    public $maxPrice = 2000000;
    public $absoluteMaxPrice = 2000000;
    public $perPage = 9;

    protected $queryString = [
        'search' => ['except' => ''],
        'category' => ['except' => 'all'],
        'selectedPromotions' => [
            'except' => ['new-arrival', 'best-seller', 'on-discount'],
            'as' => 'tags'
        ],
        'minPrice' => ['except' => 0],
        'maxPrice' => ['except' => 5000000]
    ];

    public function updated($property)
    {
        if (in_array($property, ['search', 'category', 'selectedPromotions', 'minPrice', 'maxPrice'])) {
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

        if (!empty($this->selectedPromotions)) {
            foreach ($this->selectedPromotions as $tag) {
                $query->whereRaw("FIND_IN_SET(?, tags)", [$tag]);
            }
        }

        $query->whereBetween('price', [$this->minPrice, $this->maxPrice]);

        $products = $query->paginate($this->perPage);

        $availableCategories = Product::select('category')->distinct()->pluck('category')->filter()->toArray();

        $allTags = Product::select('tags')->distinct()->pluck('tags')
                            ->filter()->flatMap(fn($tags) => explode(',', $tags))
                            ->map(fn($tag) => trim($tag))
                            ->unique()
                            ->sort()
                            ->values()
                            ->toArray();


        return view('livewire.shop', compact('products', 'availableCategories', 'allTags'));
    }
}