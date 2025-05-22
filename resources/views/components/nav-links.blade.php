@props(['href'])

@php
$currentRoute = request()->route()->getName();
$active = ($currentRoute === $href);
$classes = $active
    ? 'text-[#16302B] text-xl font-bold'
    : 'text-[#16302B] text-xl font-normal';
@endphp

<li>
    <a href="{{ $href }}" class="{{ $classes }}">
        {{ $slot }}
    </a>
</li>
