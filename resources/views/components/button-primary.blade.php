@props([
    'width' => '28',
    'heigth' => '12',
    'href' => '#',
    'rounded' => 'full',
    'inverted' => false,
    'disabled' => false,
])

@php
    $bgColor = $inverted ? 'bg-white border border-[#16302B]' : 'bg-[#16302B] text-white hover:bg-[#12251f]';
    $widthClass = "w-{$width} h-{$heigth}";
    $roundedClass = "rounded-{$rounded}";
    $stateClass = $disabled ? 'opacity-50 cursor-not-allowed pointer-events-none' : 'transition duration-200';
    $classes = "{$bgColor} {$roundedClass} text-center {$widthClass} px-4 justify-center flex items-center {$stateClass}";
@endphp

<a href="{{ $href }}" class="{{ $classes }}">
    {{ $slot }}
</a>
