@props(['label', 'name', 'value' => ''])

<div class="flex flex-row items-center justify-start space-x-3 py-1 w-full">
    <input 
        {{ $attributes }}
        type="radio"
        id="{{ $name }}-{{ $value }}"
        name="{{ $name }}"
        value="{{ $value }}"
        class="hidden peer"
    />
    <label 
        for={{ $name }}-{{ $value }}" 
        class="w-full cursor-pointer px-4 py-2 rounded-lg border border-[#A38560]/50 text-[#A38560] bg-gray-100 
               transition-all duration-200 
               hover:bg-[#A38560] hover:text-white 
               peer-checked:bg-[#A38560] peer-checked:text-white peer-checked:border-[#A38560] 
               focus:outline-none focus:ring-2 focus:ring-[#A38560]"
    >
        {{ $label }}
    </label>
</div>
