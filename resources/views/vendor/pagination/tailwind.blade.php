@if ($paginator->hasPages())

    <div class="pagination">
        @if (!$paginator->onFirstPage())
        <a href="{{ $paginator->previousPageUrl() }}" class="pagination__page pagination__page--prev"></a>
        @endif
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span aria-disabled="true">
                    <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5">{{ $element }}</span>
                </span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span aria-current="page">
                            <span class="pagination__page pagination__page--current">{{ $page }}</span>
                        </span>
                    @else
                        <a href="{{ $url }}" class="pagination__page    " aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="pagination__page pagination__page--next"></a>
        @endif
    </div>
@endif
