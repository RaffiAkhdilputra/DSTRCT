<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;

class Payment extends Component
{
    public $cartItems;
    public $total;
    public $user;

    public function removeItem($itemId)
    {
        $user = Auth::user();
        $cart = $user->cart()->with('items')->first();

        if ($cart) {
            $cart->items()->where('id', $itemId)->delete();
            $this->mount();
        }
    }

    public function mount()
    {
        $user = Auth::user();

        $cart = $user->cart()->with('items.product')->first();
        $this->cartItems = $cart?->items ?? collect();
        $this->total = $this->cartItems->sum(fn($item) => $item->quantity * $item->product->price);
    }

    public function render()
    {
        $user = auth()->user();
        $cart = $user?->cart()->with('items.product')->first();
        $cartItems = $cart?->items ?? collect();
        $total = $cartItems->sum(fn($item) => $item->quantity * $item->product->price);

        return view('livewire.payment', [
            'user' => $user,
            'cartItems' => $cartItems,
            'total' => $total,
        ]);
    }

}
