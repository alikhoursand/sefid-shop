@if ($paginator->hasPages())
    <div class="flex justify-center mt-4 bg-base-100 shadow-md shadow-base-300 rounded-box p-4">
        <div class="">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <button class="btn btn-primary btn-soft btn-sm btn-circle" disabled>
                    <x-heroicon-s-chevron-right class="size-4"/>
                </button>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-primary btn-soft btn-sm btn-circle">
                    <x-heroicon-s-chevron-right class="size-4"/>
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <button class="btn btn-circle btn-sm" disabled>{{ $element }}</button>
                @endif

                {{-- Array of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a href="{{ $url }}" class="btn btn-primary btn-sm btn-circle">{{ $page }}</a>
                        @else
                            <a href="{{ $url }}" class="btn btn-circle btn-sm">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-primary btn-soft btn-sm btn-circle">
                    <x-heroicon-s-chevron-left class="size-4"/>
                </a>
            @else
                <button class="btn btn-primary btn-soft btn-circle  btn-sm" disabled>
                    <x-heroicon-s-chevron-left class="size-4"/>
                </button>
            @endif
        </div>
    </div>
@endif
