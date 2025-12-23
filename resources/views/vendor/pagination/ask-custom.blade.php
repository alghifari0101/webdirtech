@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center">
        <ul class="flex flex-wrap gap-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="w-[45px] h-[45px] flex items-center justify-center rounded-xl bg-slate-50 text-slate-300 border border-slate-100 font-bold">
                        <i class="fa-solid fa-chevron-left"></i>
                    </span>
                </li>
            @else
                <li class="page-item">
                    @php
                        $prevPage = $paginator->currentPage() - 1;
                        $searchTerm = request()->route('search');
                        $url = $searchTerm 
                            ? ($prevPage == 1 ? route('ask.search', $searchTerm) : route('ask.search.page', [$searchTerm, $prevPage]))
                            : ($prevPage == 1 ? route('ask') : route('ask.page', $prevPage));
                    @endphp
                    <a href="{{ $url }}" 
                       class="w-[45px] h-[45px] flex items-center justify-center rounded-xl bg-white text-slate-900 border border-slate-100 font-bold hover:border-accent hover:text-accent transition-all">
                        <i class="fa-solid fa-chevron-left"></i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="w-[45px] h-[45px] flex items-center justify-center rounded-xl bg-slate-50 text-slate-300 font-bold">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @php
                            $searchTerm = request()->route('search');
                            $pageUrl = $searchTerm
                                ? ($page == 1 ? route('ask.search', $searchTerm) : route('ask.search.page', [$searchTerm, $page]))
                                : ($page == 1 ? route('ask') : route('ask.page', $page));
                        @endphp
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page">
                                <span class="w-[45px] h-[45px] flex items-center justify-center rounded-xl bg-accent text-white border border-accent font-bold">
                                    {{ $page }}
                                </span>
                            </li>
                        @else
                            <li class="page-item">
                                <a href="{{ $pageUrl }}" 
                                   class="w-[45px] h-[45px] flex items-center justify-center rounded-xl bg-white text-slate-900 border border-slate-100 font-bold hover:border-accent hover:text-accent transition-all">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    @php
                        $nextPage = $paginator->currentPage() + 1;
                        $searchTerm = request()->route('search');
                        $nextUrl = $searchTerm 
                            ? route('ask.search.page', [$searchTerm, $nextPage])
                            : route('ask.page', $nextPage);
                    @endphp
                    <a href="{{ $nextUrl }}" 
                       class="w-[45px] h-[45px] flex items-center justify-center rounded-xl bg-white text-slate-900 border border-slate-100 font-bold hover:border-accent hover:text-accent transition-all">
                        <i class="fa-solid fa-chevron-right"></i>
                    </a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="w-[45px] h-[45px] flex items-center justify-center rounded-xl bg-slate-50 text-slate-300 border border-slate-100 font-bold">
                        <i class="fa-solid fa-chevron-right"></i>
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
