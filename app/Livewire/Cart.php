<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use App\Models\Cart as CartModel;
use App\Models\CartItem;

class Cart extends Component
{
    public CartModel $userCart;
    public Collection $cartItems;
    public array $selectedCartItems = [];
    public bool $selectAll = false;

    protected $listeners = ['cartUpdated' => 'loadCartItems'];

    public function mount()
    {
        $this->loadUserCart();
        $this->loadCartItems();
    }

    protected function loadUserCart()
    {
        $user = Auth::user();

        if ($user) {
            $this->userCart = CartModel::firstOrCreate(
                ['user_id' => $user->id],
                []
            );
        } else {
            $this->userCart = new CartModel();
        }
    }

    public function updatedSelectedCartItems()
    {
        $this->selectAll = count($this->selectedCartItems) === $this->cartItems->count() && $this->cartItems->isNotEmpty();
    }

    public function updatedSelectAll(bool $value)
    {
        if ($value) {
            $this->selectedCartItems = $this->cartItems->pluck('id')->toArray();
        } else {
            $this->selectedCartItems = [];
        }
    }

    public function getTotalPriceProperty(): float
    {
        return $this->cartItems
            ->filter(fn($item) => in_array($item->id, $this->selectedCartItems))
            ->sum(fn($item) => ($item->product->price ?? 0) * $item->quantity);
    }

    public function removeSelected()
    {
        CartItem::whereIn('id', $this->selectedCartItems)->delete();
        $this->loadCartItems();
        $this->selectedCartItems = [];
        $this->selectAll = false;
        session()->flash('message', 'Selected products removed successfully.');
    }

    public function removeFromCart(int $cartItemId)
    {
        CartItem::destroy($cartItemId);
        $this->loadCartItems();
        $this->selectedCartItems = array_values(array_filter($this->selectedCartItems, fn($id) => $id != $cartItemId));
        $this->updatedSelectedCartItems();
        session()->flash('message', 'Product removed from cart successfully.');
    }

    public function clearCart()
    {
        if ($this->userCart->exists) {
            $this->userCart->items()->delete();
        }
        $this->loadCartItems();
        $this->selectedCartItems = [];
        $this->totalPrice = 0;
        $this->selectAll = false;
        session()->flash('message', 'Cart cleared successfully.');
    }

    public function confirmSelection()
    {
        if (empty($this->selectedCartItems)) {
            session()->flash('message', 'Please select at least one product to continue.');
            return;
        }
        session()->put('selected_cart_item_ids', $this->selectedCartItems);
        return redirect()->route('payment');
    }

    public function confirmSelectionSingleItem(int $cartItemId)
    {
        $this->selectedCartItems = [$cartItemId];
        $this->updatedSelectedCartItems();
        $this->confirmSelection();
    }

    protected function loadCartItems()
    {
        if ($this->userCart->exists) {
            $this->cartItems = $this->userCart->items()->with('product')->get();
        } else {
            $this->cartItems = collect();
        }
        $this->updatedSelectedCartItems();
    }

    public function render()
    {
        return view('livewire.cart');
    }
}