@props(['width' => '28', 'heigth' => '12', 'href' => '#', 'rounded' => 'full', 'textSize' => 'lg'])

@php
    $widthClass = "w-{$width} h-{$heigth}";
    $classes = "bg-[#A38560] text-white rounded-{$rounded} text-center {$widthClass} px-4 justify-center flex items-center text-{$textSize}";
@endphp

<a href="{{ $href }}" class="{{ $classes }}">
    {{ $slot }}
</a>
