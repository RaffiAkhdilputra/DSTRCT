@props(['title' => 'title', 'href' => '#', 'image' => 'images/post-card1.jpg'])

<div class="max-w-sm p-3 bg-white"> 
    <div class="w-full h-80 bg-cover bg-center rounded-3xl mb-5" style="background-image: url('{{ asset($image) }}')"></div>
    <a href="#">
        <h5 class="mb-2 text-lg font-semibold text-[#16302B]">{{ $title }}</h5>
    </a>
    <p class="mb-3 text-base text-justify text-[#16302B]">{{ $slot }}</p>
    <a href="{{ $href }}" class="inline-flex font-medium items-center hover:underline text-[#A38560]">
        Learn More
        <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778"/>
        </svg>
    </a>
</div>