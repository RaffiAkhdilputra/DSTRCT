@props(['width'=>'full', 'height'=> '12', 'name', 'value', 'id', 'placeholder'])

<div class="w-{{ $width }}">
    <input type="text" id="{{ $id }}" class="block w-full h-{{ $height }} py-2 px-3 text-white border border-white rounded-xl shadow-sm focus:outline-none focus:ring-[#A38560] focus:border-[#A38560] sm:text-sm" placeholder="{{ $placeholder }}">
</div>