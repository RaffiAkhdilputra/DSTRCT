<div class="w-full">
    <form wire:submit.prevent="submitSearch" class="w-full">
        <div class="relative rounded-full shadow-md">
            <input
                class="w-full h-12 pl-10 pr-16 text-sm text-gray-900 bg-white rounded-full focus:ring-2 focus:ring-[#A38560] focus:border-transparent"
                type="text"
                id="search"
                name="search"
                placeholder="Search products"
                wire:model.live.debounce.300ms="query"
            />
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
        </div>
    </form>
</div>