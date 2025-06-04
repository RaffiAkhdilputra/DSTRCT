@props([
    'productTitle' => 'Nama Items',
    'productPrice' => 'Harga Items',
    'productImage' => asset('images/home-shirts.webp'),
    'mainCategory' => 'Main Category',
    'productRating' => '4.9'
])

<div class="w-[353px] h-[450px] relative rounded-xl overflow-hidden shadow-lg shadow-[#16302B]">
    <a href="">

        {{-- Gambar produk  --}}
        <img class="w-full h-full object-cover" src="{{ $productImage }}" alt="content image">
    
    </a>
    {{-- Informasi produk  --}}
    <div class="absolute bottom-0 w-full bg-[#16302B] text-white p-4 rounded-t-xl flex flex-col gap-1">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-lg font-bold">{{ $productTitle }}</h1>
                <p class="text-sm">{{ $mainCategory }}</p>
            </div>
            <x-button-secondary-icon>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="w-5 h-5 text-white" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 9m13-9l2 9M10 21a1 1 0 100-2 1 1 0 000 2zm7 0a1 1 0 100-2 1 1 0 000 2z"/>
                </svg>
            </x-button-secondary-icon>
        </div>
        <div class="flex items-center justify-between mt-2">
            <p class="text-[#FFD700] font-semibold">Rp {{ $productPrice }}</p>
            <div class="flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#FFD700" viewBox="0 0 24 24" class="w-3 h-3">
                    <path d="M12 .587l3.668 7.571L24 9.75l-6 5.884L19.336 24 12 19.897 4.664 24 6 15.634 0 9.75l8.332-1.592z"/>
                </svg>
                <span>{{ $productRating }}</span>
            </div>
        </div>
    </div>
</div>
