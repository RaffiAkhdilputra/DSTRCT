<div class="flex flex-col space-y-5 pr-20">
    <h3 class="text-3xl font-bold">Filter Options</h3>

    {{-- Search --}}
    {{-- <div>
        <h3 class="text-xl font-bold">Search</h3>
        <x-form-input
            type="text"
            id="search"
            name="search"
            placeholder="Search products..."
            border="dark"
            wire="search"
        />
    </div> --}}

    {{-- Category --}}
    <div>
        <h3 class="text-xl font-bold">Category</h3>
        <fieldset class="space-y-1">
            @foreach (['all', 'accessories', 'shirts', 'trousers', 'shoes'] as $cat)
                <x-form-option 
                    value="{{ $cat }}" 
                    name="category" 
                    label="{{ ucfirst($cat) }}" 
                    model="category" 
                />
            @endforeach
        </fieldset>
    </div>

    {{-- Promotions (multi checkbox) --}}
    <div>
        <h3 class="text-xl font-bold">Promotions</h3>
        <div class="flex flex-col space-y-1">
            @foreach (['New Arival', 'Best Seller', 'On Discount'] as $tag)
                <label class="flex items-center space-x-2">
                    <x-form-select
                        id="tag-{{ $tag }}"
                        name="tag-{{ $tag }}"
                        placeholder="{{ $tag }}"
                        wire="selectedTags"
                        type="checkbox"
                        wire:model="selectedTags"
                        value="{{ $tag }}"
                    />
                </label>
            @endforeach
        </div>
    </div>

    {{-- Price Range --}}
    <div>
        <h3 class="text-xl font-bold">Price Range</h3>
        <div class="flex space-x-2">
            <x-form-input
                type="number"
                id="minPrice"
                name="minPrice"
                placeholder="Min"
                wire="minPrice"
                border="dark"
            />
            <x-form-input
                type="number"
                id="maxPrice"
                name="maxPrice"
                placeholder="Max"
                wire="maxPrice"
                border="dark"
            />
        </div>
    </div>
</div>
