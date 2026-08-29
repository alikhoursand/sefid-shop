<div class="breadcrumbs font-medium mt-2 text-sm opacity-75">
    <ul>
        @foreach ($breadcrumbs as $breadcrumb)
            @isset($breadcrumb['link'])
                <li class="@if(isset($breadcrumb['color'])) text-{{$breadcrumb['color']}} @endif">
                    <a
                        href="{{ $breadcrumb['link'] }}">
                        {{ $breadcrumb['title'] }}
                    </a>
                </li>
            @else
                <li class="@if(isset($breadcrumb['color'])) text-{{$breadcrumb['color']}} @endif">
                    <span>{{ $breadcrumb['title'] }}</span>
                </li>
            @endif
        @endforeach
    </ul>
</div>
