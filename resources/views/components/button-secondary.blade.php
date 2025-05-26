@props(['width' => '28', 'heigth' => '12', 'href' => '#', 'rounded' => 'full'])

@php
    $widthClass = "w-{$width} h-{$heigth}";
    $classes = "bg-[#A38560] text-[#16302B] rounded-{$rounded} text-center {$widthClass} px-4 justify-center flex items-center";
@endphp

<a href="{{ $href }}" class="{{ $classes }}">
    {{ $slot }}
</a>
