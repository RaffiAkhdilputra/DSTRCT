@props([
    'width' => '28',
    'height' => '12',
    'rounded' => 'full',
    'bgColor' => null,
    'fontColor' => null,
    'inverted' => false,
    'isLoading' => false,
    'disabled' => false,
])

@php
    $isDisabled = $isLoading || $disabled;

    $widthClass = "w-{$width} h-{$height}";
    $roundedClass = "rounded-{$rounded}";
    $stateClass = $isDisabled
        ? 'opacity-50 cursor-not-allowed pointer-events-none'
        : 'transition duration-200';

    $baseBgClass = match (true) {
        $bgColor !== null => $bgColor,
        $inverted => 'bg-white border border-[#16302B]',
        default => 'bg-[#16302B] hover:bg-[#12251f]',
    };

    $textClass = $fontColor ?? ($inverted ? 'text-[#16302B]' : 'text-white');

    $classes = "{$baseBgClass} {$textClass} {$roundedClass} text-center {$widthClass} px-4 justify-center flex items-center {$stateClass}";
@endphp

<button 
    type="button"
    class="{{ $classes }}"
    {{ $attributes }}
    @if ($isDisabled) disabled @endif
>
    {{ $slot }}

    @if ($isLoading)
        <div role="status" class="ml-2">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-200 animate-spin fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.6c0 27.6-22.4 50-50 50s-50-22.4-50-50 22.4-50 50-50 50 22.4 50 50zM9.1 50.6c0 22.6 18.3 41 40.9 41s40.9-18.3 40.9-41-18.3-41-40.9-41S9.1 28 9.1 50.6z" fill="currentColor"/>
                <path d="M94 39c2.4-.6 3.9-3.1 3.1-5.5-1.7-4.7-4.1-9.2-7.2-13.2C85.8 15.1 80.9 10.7 75.2 7.4c-5.7-3.3-12-5.4-18.5-6.3-5-.7-10.1-.7-15.1 0-2.5.3-4.1 2.7-3.5 5.1.6 2.5 3.1 4.1 5.6 3.6 4.3-.7 8.7-.7 13 0 5 .8 9.8 2.6 14.2 5.3 4.4 2.7 8.3 6.2 11.4 10.3 2.3 2.9 4.2 6.1 5.7 9.5.9 2.3 3.3 3.7 5.7 3z" fill="currentFill"/>
            </svg>
            <span class="sr-only">Loading...</span>
        </div>
    @endif
</button>
