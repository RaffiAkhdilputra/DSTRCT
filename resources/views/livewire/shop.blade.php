@php
    $currentPage = 1;
    $totalPages = 10;
@endphp

<div class="flex flex-col items-center justify-center">
    <div class="flex flex-row w-[85%] py-10">
        <div class="w-1/4">
            <div class="flex flex-col space-y-5 pr-20">
                <h3 class="text-3xl text-[#16302B] font-bold">Filter Options</h3>
                <form wire:submit.prevent="filter">
                    <div class="flex flex-col space-y-2">
                        <x-form-input type="text" id="search" name="search" placeholder="Search" />
                        <x-form-input type="text" id="category" name="category" placeholder="Category" />
                        <x-form-input type="text" id="color" name="color" placeholder="Color" />
                        <x-form-input type="text" id="size" name="size" placeholder="Size" />
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
