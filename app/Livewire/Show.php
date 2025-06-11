<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class Show extends Component
{
    public $product;
    public $selectedSize;
    public $selectedColor;
    public $quantity;

    public function mount()
    {
        $this->product = Product::where('slug', request()->route('slug'))->firstOrFail();
        $this->quantity = 1;
        $this->selectedSize = $this->product->available_sizes ? explode(',', $this->product->available_sizes)[0] : null;
        $this->selectedColor = $this->product->available_colors ? explode(',', $this->product->available_colors)[0] : null;
    }

    public function increaseQuantity()
    {
        if ($this->quantity < $this->product->stock) {
            $this->quantity++;
        }
    }

    public function decreaseQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function buyNow($productId)
    {
        dd("Buying product: " . $productId . ' with size: ' . $this->selectedSize . ' and color: ' . $this->selectedColor . ' and quantity: ' . $this->quantity);
        // BUY NOW KAYAKNY MENDING DIGANTI KE LINK
    }

    public function addToCart($productId)
    {
        dd($productId . ' ' . $this->selectedSize . ' ' . $this->selectedColor . ' ' . $this->quantity);
        // ADD TO CART
    }

    public function addToWishlist($productId)
    {
        dd("Adding to wishlist: " . $productId);
        // ADD TO WISHLIST
    }

    public function render()
    {
        $recommendedProducts = Product::where('category', $this->product->category)
            ->where('id', '!=', $this->product->id)
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('livewire.show', [
            'product' => $this->product,
            'recommendedProducts' => $recommendedProducts,
        ]);
    }
}
