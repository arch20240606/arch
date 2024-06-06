@if ($paginator->hasPages())

    <div class="pagination">

        {{-- Previous Page Link --}}
         @if ($paginator->onFirstPage())
            <!--
            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span aria-hidden="true">&lsaquo;</span>
            </li>
            -->
        @else
            <a class="pagination__item" href="{{ $paginator->previousPageUrl() }}">←</a>
            <!--
            <a class="pagination__item pagination__item_next" href="{{ $paginator->previousPageUrl() }}">
                <svg>
                <use xlink:href="/assets/images/sprite.svg#arrow-left"></use>
                </svg>
            </a>
            -->
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="pagination__item">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="pagination__item pagination__item_active">{{ $page }}</a>
                    @else
                        <a class="pagination__item" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="pagination__item" href="{{ $paginator->nextPageUrl() }}">→</a>
        @endif

    </div>

@endif