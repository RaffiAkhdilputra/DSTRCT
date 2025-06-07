@props([
    'width' => '28',
    'heigth' => '12',
    'href' => '#',
    'rounded' => 'full',
    'bgColor' => '#A38560',
    'textSize' => 'lg',
    'inverted' => false,
    'disabled' => false,
])

@php
    $bg = $inverted ? 'bg-white border border-gray-400' : "bg-[{$bgColor}] text-white hover:bg-[#92724f]";
    $widthClass = "w-{$width} h-{$heigth}";
    $roundedClass = "rounded-{$rounded}";
    $textClass = "text-{$textSize}";
    $stateClass = $disabled ? 'opacity-50 cursor-not-allowed pointer-events-none' : 'transition duration-200';
    $classes = "{$bg} {$roundedClass} text-center {$widthClass} px-4 justify-center flex items-center {$textClass} {$stateClass}";
@endphp

<a href="{{ $href }}" class="{{ $classes }}">
    {{ $slot }}
</a>
