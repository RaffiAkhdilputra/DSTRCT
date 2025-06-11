<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class Wishlist extends Component
{
    public $wishlistItems = [];

    public function mount()
    {
        $user = Auth::user();
        $this->wishlistItems = $user ? $user->wishlist()->get() : [];
    }

    public function removeFromWishlist($productId)
    {
        if (!$user) {
            session()->flash('message', 'You need to login first.');
            return;
        }
        
        $user = Auth::user();

        $user->wishlist()->detach($productId);
        $this->wishlistItems = $user->wishlist()->get();
        session()->flash('message', 'Product removed from wishlist successfully.');
    }

    public function clearWishlist()
    {
        $user = Auth::user();
        $user->wishlist()->detach();
        $this->wishlistItems = [];
        session()->flash('message', 'Wishlist cleared successfully.');
    }

    public function render()
    {
        return view('livewire.wishlist', [
            'wishlist' => $this->wishlistItems
        ]);
    }
}
