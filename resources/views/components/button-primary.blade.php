@props(['width' => '28', 'heigth' => '12', 'href' => '#'])

@php
    $widthClass = "w-{$width} h-{$heigth}";
    $classes = "bg-[#16302B] text-white rounded-full text-center {$widthClass} px-4 justify-center flex items-center";
@endphp

<a href="{{ $href }}" class="{{ $classes }}">
    {{ $slot }}
</a>
