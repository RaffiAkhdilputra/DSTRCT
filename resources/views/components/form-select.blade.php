@props(['name' => 'name', 'value' => null, 'options' => [], 'placeholder'=> 'placeholder'])

<div class="flex items-center space-x-3 w-full mt-3">
    <input 
        type="checkbox" 
        id="{{ $name }}" 
        value="{{ $value }}" 
        class="w-5 h-5 text-[#A38560] bg-gray-100 border-[#A38560] rounded focus:ring-[#A38560] focus:ring-2 transition-all duration-100 hover:bg-[#A38560]/10 hover:border-[#A38560]/60 focus:outline-none focus:ring-offset-2 focus:ring-offset-gray-100"
        {{ $attributes }}
    >
    <label 
        for="{{ $name }}" 
        class="select-none"
    >
        {{ $placeholder }}
    </label>
</div>
