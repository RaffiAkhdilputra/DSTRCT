@php
    $content = trim($slot);
    $shortContent = Str::limit(strip_tags($content), 100, '...');
    $fit = $fit ?? strlen($content) > 100;
@endphp

<div x-data="{ open: false, fit: {{ $fit ? 'true' : 'false' }} }" class="w-full transition-all duration-100 px-3">
    <div class="flex items-center justify-between select-none" @click="open = !open">
        <h3 class="text-lg font-semibold text-[#16302B]">{{ $title }}</h3>
        <svg 
            :class="{ 'rotate-180': open, 'hidden': !fit }"
            class="w-5 h-5 text-[#16302B] transition-transform duration-100"
            fill="none" viewBox="0 0 24 24"
        >
            <path d="M12 13.2L16.6 8.6L18 10L12 16L6 10L7.4 8.6L12 13.2Z" fill="currentColor"/>
        </svg>
    </div>

    <div class="mt-2 text-sm text-gray-700 leading-relaxed">
        <template x-if="!open && fit">
            <p>{{ $shortContent }}</p>
        </template>
        <template x-if="open || !fit">
            <p>{!! $content !!}</p>
        </template>
    </div>
</div>
