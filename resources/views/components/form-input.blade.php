@props(['width'=>'full', 'height'=> '12', 'name', 'value' => '', 'id', 'placeholder', 'type', 'border'=>'white'])

@php 
    if($border == 'white') {
        $border = 'border-white';
        $textColor = 'text-white';
    } else if ($border == 'dark') {
        $border = 'border-[#16302B]';
        $textColor = 'text-[#16302B]';
    }
@endphp

<div class="w-{{ $width }}">
    <input 
        type="{{ $type }}" 
        id="{{ $id }}" 
        class="block w-full h-{{ $height }} py-2 px-3 {{ $textColor }} border {{ $border }} rounded-xl shadow-sm focus:outline-none focus:ring-[#A38560] focus:border-[#A38560] sm:text-sm" 
        placeholder="{{ $placeholder }}"
        {{ $attributes }} 
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
    >
</div>