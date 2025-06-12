@php
    $sizeNames = explode(',', $product->available_sizes);

    $colorNames = explode(',', $product->available_colors);
    $colorMap = [
        'Red' => '#FF0000',
        'Blue' => '#0000FF',
        'Black' => '#000000',
        'White' => '#FFFFFF',
        'Green' => '#00FF00',
    ];

    $isInWishlist = $wishlist->contains('id', $product->id);
    $isInCart = $cart->contains('id', $product->id);
@endphp

<div x-data="{ filled: false }" class="my-10">
    <div class="flex flex-row items-center justify-center mx-30">
        <div class="basis-1/2 flex justify-center items-center">
            <img class="w-auto h-150" src="{{ asset('images/home-shirts.webp') }}" alt="">
        </div>
        <div class="basis-1/2 flex flex-col items-start justify-start gap-6">
            <div class="flex flex-col items-start justify-start gap-2">
                <p class="text-sm bg-[#16302B] text-white px-6 py-1 rounded-full">{{ $product->category }}</p>
                <h3 class="text-3xl font-bold">{{ $product->name }}</h3>
                <p class="text-lg">{{ $product->brand }}</p>
            </div>

            <div class="flex flex-col items-start justify-start gap-3">
                <div class="flex items-start justify-start gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#FFD700" viewBox="0 0 24 24" class="w-5 h-5">
                        <path d="M12 .587l3.668 7.571L24 9.75l-6 5.884L19.336 24 12 19.897 4.664 24 6 15.634 0 9.75l8.332-1.592z"/>
                    </svg>
                    <p class="text-sm">{{ $product->current_rating }}</p>
                    <p class="text-sm text-gray-400">({{ $product->total_rating }})</p>
                </div>

                <div class="flex flex-row items-start gap-3">
                    <h3 class="text-3xl font-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</h3>
                    <h5 class="text-lg text-[#8c8c8c] line-through">Rp {{ number_format($product->default_price, 0, ',', '.') }}</h5>
                </div>
            </div>

            <div class="flex flex-col items-start justify-start gap-3">
                <h3 class="text-lg font-semibold">Available Color</h3>
                <div class="flex flex-row items-center justify-start gap-2">
                    @foreach ($colorNames as $color)
                        <div wire:click="$set('selectedColor', '{{ trim($color) }}')"
                             class="w-6 h-6 rounded-full border border-gray-400 cursor-pointer @if($selectedColor == trim($color)) ring-2 ring-offset-2 ring-[#16302B] @endif"
                             style="background-color: {{ $colorMap[trim($color)] ?? '#cccccc' }};">
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="w-1/2 flex flex-row items-start justify-start gap-18">
                <div class="flex flex-col items-start justify-start gap-3">
                    <h3 class="text-lg font-semibold">Available Size</h3>
                    <div class="flex flex-row items-center justify-start gap-2">
                        @foreach ($sizeNames as $size)
                            <span wire:click="$set('selectedSize', '{{ trim($size) }}')"
                                  class="px-6 py-1 rounded-full border border-gray-400 cursor-pointer @if($selectedSize == trim($size)) bg-[#16302B] text-white @endif">{{ trim($size) }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="w-full flex flex-col items-start justify-start gap-3">
                    <h3 class="text-lg font-semibold">Quantity</h3>
                    <div class="w-full">
                        <div class="flex flex-row items-start justify-between gap-2">
                            <h3 class="text-3xl">{{ $quantity }}</h3>
                            <div class="flex flex-row items-center justify-start">
                                <button wire:click="decreaseQuantity" class="bg-[#16302B] text-white px-2 py-2 rounded-l-xl">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                    </svg>
                                </button>
                                <button wire:click="increaseQuantity" class="bg-[#16302B] text-white px-2 py-2 rounded-r-xl">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>

                                </button>
                            </div>
                        </div>
                        <p class="text-sm text-[#8c8c8c]">{{ $product->stock }} pcs</p>
                    </div>
                </div>

            </div>

            <div x-data="{}" x-ref="show" class="w-full flex flex-row items-center justify-start gap-2">
                <x-form-input-btn wire:click="buyNow({{ $product->id }})" width="50">Buy Now</x-form-input-btn>
                
                @if ($isInCart)
                    <x-form-input-btn wire:click="removeFromCart({{ $product->id }})" bgColor="bg-white border border-[#16302B]" width="50" inverted="true">
                        Already in Cart
                    </x-form-input-btn>
                @else
                    <x-form-input-btn wire:click="addToCart({{ $product->id }})" width="50" bgColor="bg-white border border-[#16302B]" inverted="true">
                        Add to Cart
                    </x-form-input-btn>
                @endif
                
                {{-- <x-form-input-btn wire:click="addToCart({{ $product->id }})" width="50" inverted="true">Add to Cart</x-form-input-btn> --}}
                <x-button-secondary-icon wire:click="{{ $isInWishlist ? 'removeFromWishlist(' . $product->id . ')' : 'addToWishlist(' . $product->id . ')' }}" btnModel="true" inverted="true" borderless="true" href="#" size="12">
                    <div @click="filled = !filled">
                        @if ($isInWishlist)
                            <svg class="w-6 h-6 stroke-red-500 fill-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                            </svg>
                        @else
                            <svg class="w-6 h-6 stroke-gray-800 fill-none" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                            </svg>
                        @endif        
                    </div>
                </x-button-secondary-icon>
            </div>
            <div class="w-[75%] flex flex-col items-start justify-start gap-2 border-2 border-gray-400 p-4 rounded-lg">
                <x-accordion title="Description">
                    {{ $product->description }}
                </x-accordion>
            </div>
        </div>
    </div>
    <div class="flex flex-col items-center justify-center mt-10">
        <h3 class="text-2xl font-bold text-center my-10">Explore Related Products</h3>
        <div class="flex flex-row items-center justify-center gap-4">
            @foreach ($recommendedProducts as $recommendedProduct)
                <x-card
                    href="{{ route('product', $recommendedProduct->slug) }}"
                    productTitle="{{ $recommendedProduct->name }}"
                    productPrice="{{ number_format($recommendedProduct->price, 0, ',', '.') }}"
                    productRating="{{ $recommendedProduct->current_rating }}"
                    mainCategory="{{ $recommendedProduct->category }}"
                    {{-- image="{{ $recommendedProduct->image ? asset('storage/images/' . $recommendedProduct->image) : asset('default.jpg') }}" --}}
                />
            @endforeach
        </div>
    </div>
</div>