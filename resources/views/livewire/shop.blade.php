<div>
    <div class="h-100 bg-cover bg-center relative overflow-hidden" style="background-image: url('{{ asset('images/shop-banner.jpg') }}')">
        <div class="absolute top-0 right-0 mx-40 mt-10">
            <x-search-bar></x-search-bar>
        </div>
        <div class="absolute bottom-8 left-0 mx-60 text-white space-y-5">
            <h1 class="text-[24rem] font-bold transform translate-y-2/5">SHOP</h1>
        </div>
    </div>

    <div class="h-screen">

    </div>

    <div class="mx-40 my-40">
        <h3 class="text-3xl font-bold mb-10" style="color: #16302B">Explore Our Recommendation</h3>
        <p class="font-semibold text-right mb-5 pe-2"><a href="#">See All</a></p>

        <div class="mb-10 grid grid-cols-3 gap-12 justify-items-center">
            <x-card></x-card>
            <x-card></x-card>
            <x-card></x-card>
        </div>
    </div>

</div>
