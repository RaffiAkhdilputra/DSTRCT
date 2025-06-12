<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Collection;

class Payment extends Component
{
    public Collection $cartItems;
    public float $total;

    public function mount()
    {
        $this->loadCartItems();
    }

    public function loadCartItems()
    {
        $user = Auth::user();
        $cart = $user->cart()->with('items.product')->first();

        $this->cartItems = $cart?->items ?? collect();
        $this->total = $this->cartItems->sum(fn($item) => $item->quantity * $item->product->price);
    }

    public function removeFromCart(int $cartItemId)
    {
        CartItem::destroy($cartItemId);
        $this->loadCartItems();
        session()->flash('message', 'Product removed from cart successfully.');
    }

    public function checkout()
    {
        $user = Auth::user();
        $cart = $user->cart()->with('items.product')->first();
        
        dd($cart);
        
    }

    public function render()
    {
        return view('livewire.payment', [
            'cartItems' => $this->cartItems,
            'total'     => $this->total,
            'user'      => Auth::user(),
        ]);
    }
}
