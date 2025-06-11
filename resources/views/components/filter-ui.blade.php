@php
    $promoTags = [
        'new-arrival' => 'New Arrival',
        'best-seller' => 'Best Seller',
        'on-discount' => 'On Discount',
    ];
@endphp

<div class="flex flex-col space-y-6 p-6 min-w-[20vw]">
    {{-- Search --}}
    <div class="flex flex-col space-y-2">
        <h3 class="text-xl font-bold">Search</h3>
        <x-form-input
            type="text"
            id="search"
            name="search"
            placeholder="Search products..."
            border="dark"
            wire:model.live.debounce.300ms="search"
        />
    </div>
    
    {{-- Category --}}
     <div class="flex flex-col space-y-2">
        <h3 class="text-xl font-bold">Category</h3>
        <fieldset class="space-y-1">
            <x-form-option
                name="category"
                value="all"
                label="All"
                wire:model.live="category"
            />

            @foreach ($availableCategories as $cat)
                <x-form-option
                    name="category"
                    value="{{ $cat }}"
                    label="{{ ucfirst($cat) }}"
                    wire:model.live="category"
                />
            @endforeach
        </fieldset>
    </div>

    {{-- Promotions (multi checkbox) --}}
    <div>
        <h3 class="text-xl font-bold">Promotions</h3>
        <div class="flex flex-col space-y-1">
            @foreach ($promoTags as $value => $label)
                <x-form-select
                    id="promo-{{ $value }}"
                    name="promotions"
                    wire:model.live="selectedPromotions"
                    value="{{ $value }}"
                    label="{{ $label }}"
                />
            @endforeach
        </div>
    </div>

    {{-- Price Range --}}
    <div class="relative flex flex-col space-y-2">
        <h3 class="text-xl font-bold">Price Range</h3>
        <input
            type="range"
            min="{{ $minPrice }}"
            max="{{ $absoluteMaxPrice }}"
            wire:model.live="maxPrice"
            class="w-full h-2 bg-gray-200  rounded-lg appearance-none [&amp;::-webkit-slider-thumb]:bg-[#A38560] cursor-pointer"
        />
        <div class="flex flex-row justify-between">
            <span class="text-[#16302B]">{{ number_format($minPrice) }}</span>
            <span class="text-[#16302B]">{{ number_format($maxPrice) }}</span>
        </div>
    </div>
</div>