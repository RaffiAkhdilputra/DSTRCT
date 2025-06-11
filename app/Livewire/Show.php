<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class Show extends Component
{
    public $product;
    public $selectedSize;
    public $selectedColor;
    public $quantity;
    public $user;
    public $wishlistItems = [];

    public function mount()
    {
        $this->product = Product::where('slug', request()->route('slug'))->firstOrFail();
        $this->quantity = 1;
        $this->selectedSize = $this->product->available_sizes ? explode(',', $this->product->available_sizes)[0] : null;
        $this->selectedColor = $this->product->available_colors ? explode(',', $this->product->available_colors)[0] : null;

        $this->user = Auth::user();

        if ($this->user) {
            $this->wishlistItems = $this->user->wishlist()->get();
        }
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
    }

    public function addToCart($productId)
    {
        dd($productId . ' ' . $this->selectedSize . ' ' . $this->selectedColor . ' ' . $this->quantity);
    }

    public function addToWishlist($productId)
    {
        if (!$this->user) {
            return redirect()->route('login');
        }

        if (!$this->user->wishlist()->where('product_id', $productId)->exists()) {
            $this->user->wishlist()->attach($productId);
            $this->wishlistItems = $this->user->wishlist()->get();
            session()->flash('message', 'Product added to wishlist successfully.');
        } else {
            session()->flash('message', 'Product is already in your wishlist.');
        }
    }

    public function removeFromWishlist($productId)
    {
        if (!$this->user) {
            return redirect()->route('login');
        }

        $this->user->wishlist()->detach($productId);
        $this->wishlistItems = $this->user->wishlist()->get();
        session()->flash('message', 'Product removed from wishlist successfully.');
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
            'wishlist' => $this->wishlistItems,
        ]);
    }
}
