<div>
    <div class="mx-40 my-10">
        <div class="flex justify-between">
            <div class="text-start">
                <h3 class="text-3xl font-bold">Your Wishlist</h3>
                <p class="text-lg text-gray-600">Here are the products you have added to your wishlist.</p>
            </div>

            <div class="content-center">
                <x-search-bar></x-search-bar>
            </div>
        </div>
    </div>

    <div class="mx-60 my-20 min-h-[50vh]">
        <div class="grid grid-cols-3 gap-12 justify-items-center">
            @forelse ($wishlist as $product)
                <x-card 
                    href="{{ route('product', ['slug' => $product->slug]) }}"
                    productTitle="{{ $product->name }}"
                    productPrice="{{ number_format($product->price, 0, ',', '.') }}"
                    productRating="{{ $product->current_rating }}"
                    mainCategory="{{ $product->category }}"
                    {{-- image="{{ $product->image ? asset('storage/images/' . $product->image) : asset('images/default.jpg') }}" --}}
                />
            @empty
                <p class="text-xl font-semibold col-span-3 text-center">No products found.</p>
            @endforelse
        </div>
    </div>
</div>
