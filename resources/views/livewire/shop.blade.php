<div class="flex flex-col items-center justify-center">
    <div class="flex flex-row w-[85%] py-10">
        {{-- Sidebar Filter --}}
        @include('components.filter-ui')

        {{-- Produk --}}
        <div class="grid grid-cols-3 gap-4 w-full pl-10">
            @forelse ($products as $product)
                <x-card 
                    productTitle="{{ $product->name }}"
                    productPrice="{{ number_format($product->price, 0, ',', '.') }}"
                    productRating="{{ $product->current_rating }}"
                    mainCategory="{{ $product->category }}"
                    image="{{ $product->image ? asset('storage/images/' . $product->image) : asset('default.jpg') }}"
                />
            @empty
                <p class="text-xl font-semibold col-span-3 text-center">No products found.</p>
            @endforelse
        </div>
    </div>

    {{-- Pagination --}}
    <div class="my-6 flex flex-col items-center justify-center space-y-2">
        <p class="text-xl font-semibold">Page {{ $products->currentPage() }} of {{ $products->lastPage() }}</p>
        <p class="text-sm text-gray-500">Showing {{ $products->count() }} of {{ $products->total() }} products</p>
        {{ $products->links('pagination::tailwind') }}
    </div>
</div>
