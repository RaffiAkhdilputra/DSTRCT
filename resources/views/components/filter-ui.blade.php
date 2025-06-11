<div>
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
        <fieldset wire:model.defer="category" class="space-y-1">
            @foreach (['all', 'accessories', 'shirts', 'trousers', 'shoes'] as $cat)
                <x-form-option 
                    name="category"
                    value="{{ $cat }}" 
                    label="{{ ucfirst($cat) }}"
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
                wire:model="minPrice"
                border="dark"
            />
            <x-form-input
                type="number"
                id="maxPrice"
                name="maxPrice"
                placeholder="Max"
                wire:model="maxPrice"
                border="dark"
            />
        </div>
    </div>
</div>