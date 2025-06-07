@props([
    'size' => '12',
    'href' => '#',
    'borderless' => false,
    'inverted' => false,
    'disabled' => false,
])

@php
    $bgColor = $inverted ? 'bg-white' : 'bg-[#A38560] text-white hover:bg-[#92724f]';
    $borderColor = $inverted ? 'border-[#A38560]' : 'border-[#16302B]';
    $borderStyle = $borderless ? 'border-0' : 'border-1';
    $sizeClass = "w-{$size} h-{$size}";
    $stateClass = $disabled ? 'opacity-50 cursor-not-allowed pointer-events-none' : 'transition duration-200';
    $classes = "{$bgColor} rounded-full text-center {$sizeClass} flex items-center justify-center {$borderStyle} {$borderColor} {$stateClass}";
@endphp

<a href="{{ $href }}" class="{{ $classes }}">
    {{ $slot }}
</a>
