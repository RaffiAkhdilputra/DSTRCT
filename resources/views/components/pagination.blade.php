@props([
    'currentPage' => 1,
    'totalPages' => 1,
])

@php
    $currentPage = max(1, $currentPage);
    $totalPages = max(1, $totalPages);

    $isDisabled = $currentPage <= 1 || $currentPage >= $totalPages;

    if($isDisabled) {
        echo 'disabled';
    }
@endphp

<nav aria-label="Pagination" class="mt-6">
    <ul class="inline-flex items-center space-x-1 text-sm">
        {{-- Previous --}}
        <li>
            <button
                class="px-4 py-2 rounded-l-lg border transition
                    {{ $currentPage <= 1 
                        ? 'bg-[#16302B]/60 text-white border-[#16302B]/50 cursor-not-allowed' 
                        : 'bg-white text-[#16302B] border-[#16302B] hover:bg-[#16302B] hover:text-white' }}"
            >
                Previous
            </button>
        </li>

        {{-- Page Numbers --}}
        @foreach (range(1, $totalPages) as $page)
            <li>
                <button 
                    wire:click="$set('page', {{ $page }})"
                    class="px-4 py-2 rounded-md border transition
                        {{ $page == $currentPage 
                            ? 'bg-[#16302B] text-white font-semibold border-[#16302B]' 
                            : 'bg-white text-[#16302B] border-[#16302B] hover:bg-[#16302B] hover:text-white' }}"
                >
                    {{ $page }}
                </button>
            </li>
        @endforeach

        {{-- Next --}}
        <li>
            <button 
                @if($currentPage >= $totalPages)
                    disabled
                @else
                    wire:click="$set('page', {{ $currentPage + 1 }})"
                @endif
                class="px-4 py-2 rounded-r-lg border transition
                    {{ $currentPage >= $totalPages 
                        ? 'bg-[#16302B]/60 text-white border-[#16302B]/50 cursor-not-allowed' 
                        : 'bg-white text-[#16302B] border-[#16302B] hover:bg-[#16302B] hover:text-white' }}"
            >
                Next
            </button>
        </li>
    </ul>
</nav>
