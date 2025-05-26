@props(['width'=>'full', 'height'=> '12', 'rounded' => 'full'])

@php
    $widthClass = "w-{$width} h-{$height}";
@endphp

<button class="bg-[#16302B] text-white rounded-{{ $rounded }} text-center {{ $widthClass }} px-4 justify-center flex items-center">{{ $slot }}</button>