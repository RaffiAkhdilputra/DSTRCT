@props(['size' => '12', 'href' => '#'])

@php
    $sizeClass = "w-{$size} h-{$size}";
    $classes = "bg-[#A38560] rounded-full text-center {$sizeClass} flex items-center justify-center border-2 border-[#16302B]";
@endphp

<a href="{{ $href }}" class="{{ $classes }}">
    {{ $slot }}
</a>
