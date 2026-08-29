@if ($paginator->hasPages())
<div class="flex justify-center mt-4 bg-base-100 shadow-md shadow-base-300 rounded-box p-4">
    <div class="">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <button class="btn btn-primary btn-soft btn-sm btn-circle" disabled>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>

        </button>
        @else
        <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-primary btn-soft btn-sm btn-circle">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>

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
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>

        </a>
        @else
        <button class="btn btn-primary btn-soft btn-circle  btn-sm" disabled>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>

        </button>
        @endif
    </div>
</div>
@endif
