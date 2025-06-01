@php
    $currentPage = 1;
    $totalPages = 10;
@endphp

<div class="flex flex-col items-center justify-center">
    <div class="flex flex-row w-[85%] py-10">
        <div class="w-1/4">
            <div class="flex flex-col space-y-5 pr-20">
                <h3 class="text-3xl font-bold">Filter Options</h3>
                <form wire:submit.prevent="filter">
                    <div class="flex flex-col space-y-2">
                        <h3 class="text-xl font-bold">Search</h3>
                        <x-form-input type="text" id="search" name="search" placeholder="Search" />

                        <h3 class="text-xl font-bold mt-3">Category</h3>
                        <fieldset>
                            <x-form-option value="all" name="categories" label="All" />
                            <x-form-option value="accessories" name="categories" label="Accessories" />
                            <x-form-option value="shirts" name="categories" label="Shirts" />
                            <x-form-option value="trousers" name="categories" label="Trousers" />
                            <x-form-option value="shoes" name="categories" label="Shoes" />
                        </fieldset>
                        
                        <h3 class="text-xl font-bold mt-3">Promotions</h3>
                        <div class="flex flex-col flex-wrap w-full space-x-2">
                            <x-form-select wire="promotions-new-arival" name="promotions-new-arival" value="promotions-new-arival" placeholder="New Arival" />
                            <x-form-select wire="promotions-best-seller" name="promotions-best-seller" value="promotions-best-seller" placeholder="Best Seller" />
                            <x-form-select wire="promotions-on-discount" name="promotions-on-discount" value="promotions-on-discount" placeholder="On Discount" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="flex flex-col items-center justify-center w-3/4 h-[full + 100px] ">
            <div class="grid grid-cols-3 gap-5">
                @foreach (range(1, 12) as $i)
                    <div class="my-3">
                        <a href=""><x-card/></a>
                    </div>
                @endforeach
            </div>
            <x-pagination :currentPage="$currentPage" :totalPages="$totalPages" />
        </div>
    </div>
</div>
