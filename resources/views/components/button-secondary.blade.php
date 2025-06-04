@props(['width' => '28', 'heigth' => '12', 'href' => '#', 'rounded' => 'full', 'bgColor' => '#A38560', 'textSize' => 'lg'])

@php
    $widthClass = "w-{$width} h-{$heigth}";
@endphp

<a href="{{ $href }}" class="bg-[{{ $bgColor }}] text-white rounded-{{$rounded}} text-center {{$widthClass}} px-4 justify-center flex items-center text-{{$textSize}}">
    {{ $slot }}
</a>
