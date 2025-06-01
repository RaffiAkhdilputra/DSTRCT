@props([
    'currentPage' => 1,
    'totalPages' => 1,
    'nextLinks' => null,
    'prevLinks' => null,
])

<nav aria-label="Pagination" class="mt-6">
    <ul class="inline-flex items-center space-x-1 text-sm">
        {{-- Previous --}}
        <li>
            <a 
                href="{{ $prevLinks ?? '#' }}"
                @if($currentPage <= 1)
                    class="pointer-events-none bg-[#16302BDD] text-white px-4 py-2 rounded-l-lg border border-[#16302B]/50 transition"
                @else
                    wire:click.prevent="$set('currentPage', {{ $currentPage - 1 }})"
                    class="bg-white text-[#16302B] px-4 py-2 rounded-l-lg border border-[#16302B] hover:bg-[#16302B] hover:text-white transition"
                @endif
            >
                Previous
            </a>
        </li>

        {{-- Page Numbers --}}
        @foreach (range(1, $totalPages) as $page)
            <li>
                <a 
                    href="#"
                    wire:click.prevent="$set('currentPage', {{ $page }})"
                    class="px-4 py-2 rounded-md border transition
                        {{ $page == $currentPage 
                            ? 'bg-[#16302B] text-white font-semibold border-[#16302B]'
                            : 'bg-white text-[#16302B] border-[#16302B] hover:bg-[#16302B] hover:text-white' }}"
                >
                    {{ $page }}
                </a>
            </li>
        @endforeach

        {{-- Next --}}
        <li>
            <a 
                href="{{ $nextLinks ?? '#' }}"
                @if($currentPage >= $totalPages)
                    class="pointer-events-none bg-[#16302B]/60 text-white px-4 py-2 rounded-r-lg border border-[#16302B]/50 transition"
                @else
                    wire:click.prevent="$set('currentPage', {{ $currentPage + 1 }})"
                    class="bg-white text-[#16302B] px-4 py-2 rounded-r-lg border border-[#16302B] hover:bg-[#16302B] hover:text-white transition"
                @endif
            >
                Next
            </a>
        </li>
    </ul>
</nav>
