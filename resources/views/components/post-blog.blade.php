@props(['title' => 'title', 'href' => '#', 'lastUpdate' => 'lastUpdate', 'image' => 'images/post-card1.jpg', 'content1' => 'content1', 'content2' => 'content2'])

<div class="space-y-12">
    <div class="flex items-stretch gap-6 me-12">
        <div class="w-4 bg-[#16302B]"></div>
        <h1 class="text-5xl font-bold text-[#16302B]">{{ $title }}</h1>
    </div>

    <div class="text-lg font-semibold space-y-1">
        <p class="text-[#16302B]">Last Update: {{ $lastUpdate }}</p>
        <p class="text-red-700">to Indonesia page</p>
    </div>

    <div class="text-3xl leading-relaxed text-justify space-y-12">
        <div class="flex items-stretch gap-12">
            <div class="basis-2/5 drop-shadow-2xl">
                <img src="{{ asset($image) }}" alt="image">
            </div>
            <div class="basis-3/5">
                <p class="">{{ $content1 }}</p>
            </div>
        </div>
        <div>
            <p>{{ $content2 }}</p>
        </div>
    </div>
</div>