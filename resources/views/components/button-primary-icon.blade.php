@props(['size' => '12', 'href' => '#'])

@php
    $sizeClass = "w-{$size} h-{$size}";
    $classes = "bg-white rounded-full text-center {$sizeClass} flex items-center justify-center border-2 border-[#16302B4c]";
@endphp

<a href="{{ $href }}" class="{{ $classes }}">
    {{ $slot }}
</a>
