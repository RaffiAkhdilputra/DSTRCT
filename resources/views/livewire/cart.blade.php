<div>
    <div class="mx-40 my-10">
        <div class="flex justify-between">
            <div>
                <h1 class="text-3xl font-bold">Your Cart</h1>
                <p class="text-lg text-gray-600">Manage your cart items below.</p>
            </div>
            <div class="content-center">
                <x-search-bar></x-search-bar>
            </div>
        </div>
    </div>

    <div class="mx-40 my-20">
        <div class="flex justify-between mb-6">
            <h2 class="text-2xl font-semibold ml-6">Cart Items ({{ $cartItems->count() }})</h2>
            <div class="flex items-center gap-4">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input
                        id="selectAll-checkbox"
                        type="checkbox"
                        wire:model.live="selectAll"
                        class="w-5 h-5 text-[#16302B] bg-white border-2 rounded-sm focus:ring-[#16302B] checked:bg-[#16302B] checked:border-[#16302B] transition-all"
                        {{ $cartItems->isEmpty() ? 'disabled' : '' }}
                    >
                    <span class="text-lg font-medium">Select All</span>
                </label>
                <x-form-input-btn wire:click="removeSelected" fontColor="text-white" width="auto" inverted="true" :disabled="empty($selectedCartItems)">Remove Selected</x-form-input-btn>
            </div>
        </div>

        <div key="cart-container" class="grid grid-cols-3 gap-12 justify-items-center min-h-[40vh]">
            @forelse ($cartItems as $cartItem) {{-- $cartItem is now an App\Models\CartItem --}}
                <div wire:key="cart-item-{{ $cartItem->id }}" class="bg-white shadow-md rounded-lg p-6 flex flex-col items-start justify-center gap-3 w-full">
                    <label for="cartItem-{{ $cartItem->id }}" class="flex items-center gap-2 cursor-pointer">
                        <input
                            id="cartItem-{{ $cartItem->id }}"
                            type="checkbox"
                            value="{{ $cartItem->id }}" {{-- The value is the CartItem ID --}}
                            wire:model.live="selectedCartItems"
                            class="w-5 h-5 text-[#16302B] bg-white border-2 rounded-sm focus:ring-[#16302B] checked:bg-[#16302B] checked:border-[#16302B] transition-all"
                        >
                        <span class="text-xl font-bold">{{ $cartItem->product->brand ?? 'N/A' }}</span>
                    </label>
                    <hr class="w-full border-gray-800 mb-4">
                    <div class="flex flex-row items-center justify-center gap-6 w-[full/3]">
                        <div class="flex flex-col items-start">

                            {{-- GAMBARNYA BLM DIGANTI --}}
                            
                            <img src="{{ asset('images/image-not-found.png') }}" alt="{{ $cartItem->product->name ?? 'Product' }}" class="w-full h-48 object-cover rounded-lg mb-4">
                        </div>
                        <div class="flex flex-col items-start">
                            <h3 class="text-xl font-semibold">{{ $cartItem->product->name ?? 'N/A' }}</h3>
                            <p class="text-sm">Rp <span class="text-[#16302B] font-bold">{{ number_format($cartItem->product->price ?? 0, 0, ',', '.') }}</span></p>
                            <p class="text-sm">Color: <span class="text-[#16302B] font-bold">{{ $cartItem->color ?? 'N/A' }}</span></p>
                            <p class="text-sm">Size: <span class="text-[#16302B] font-bold">{{ $cartItem->size ?? 'N/A' }}</span></p> {{-- Added size --}}
                            <p class="text-sm">Quantity: <span class="text-[#16302B] font-bold">{{ $cartItem->quantity ?? 'N/A' }}</span></p>
                            <div class="mt-4 flex gap-2">
                                <x-form-input-btn wire:click="removeFromCart({{ $cartItem->id }})" bgColor="bg-white border border-[#16302B]" width="24" inverted="true">Remove</x-form-input-btn>
                                <x-form-input-btn wire:click="confirmSelectionSingleItem({{ $cartItem->id }})" width="24">Buy Now</x-form-input-btn>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-xl font-semibold col-span-3 text-center">No products found in your cart.</p>
            @endforelse
        </div>

        <div class="mt-10 flex flex-row gap-6 items-center justify-between p-6">
            <h2 class="text-2xl font-semibold self-start">
                Total: Rp <span class="text-[#16302B] font-bold">{{ number_format($this->totalPrice, 0, ',', '.') }}</span>
            </h2>

            <div class="flex justify-end gap-5">
                <x-form-input-btn wire:click="confirmSelection" width="32" :disabled="empty($selectedCartItems)">Checkout</x-form-input-btn>
                <x-form-input-btn wire:click="clearCart" fontColor="text-white" width="32" inverted="true" :disabled="$cartItems->isEmpty()">Clear Cart</x-form-input-btn>
            </div>
        </div>
    </div>
</div>