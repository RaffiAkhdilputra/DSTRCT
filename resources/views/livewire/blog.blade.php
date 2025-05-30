<div>
    <div class="h-screen bg-cover bg-center relative" style="background-image: url('{{ asset('images/blog-banner.jpg') }}')">
        <div class="absolute top-0 right-0 mx-40 mt-10">
            <form class="">   
                <div class="relative">
                    <input type="search" id="default-search" class="block h-16 p-4 ps-10 text-sm rounded-full bg-[#E7E0ECAD] placeholder-black" placeholder="Search" required />
                    <button type="submit" class="text-white absolute top-1/2 end-2.5 -translate-y-1/2 bg-[#B1B4C2] font-medium rounded-full text-sm px-4 py-4 ">
                        <svg class="w-4 h-4 text-black border-[#D9D9D9]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
        <div class="absolute bottom-0 left-0 mx-40 mb-40 text-white space-y-5">
            <h4 class="text-2xl font-semibold">Business Strategy</h4>
            <h2 class="text-5xl font-bold">How District Plans Its Next Big Moves</h2>
            <p class="text-lg text-justify">Streetwear may look effortless—but behind every drop, there’s a team analyzing charts, planning campaigns, and breaking down market trends. At District, we take strategy seriously. Our core team regularly meets to review everything—from customer feedback to seasonal buying behavior—so every collection we release isn’t just stylish, but timed and targeted.</p>
        </div>
    </div>

    <div class="mx-40 my-20">
        <h2 class="text-3xl font-bold" style="color: #16302B">Blog Post</h2>
        <div class="my-10 grid grid-cols-3 gap-6">
        <x-post-card></x-post-card>
        <x-post-card></x-post-card>
        <x-post-card></x-post-card>
        <x-post-card></x-post-card>
        <x-post-card></x-post-card>
        <x-post-card></x-post-card>
        </div>
    </div>
</div>

