@props([
    'title',
    'show_divider' => false,
    'position' => null,
    'icon' => null,
    'icon_color' => null,
    'color' => null,
    'link' => null,
])

<div
    class="@if ($position && $position === 'center') justify-center  @else text-right justify-between @endif items-center gap-x-4 mx-auto flex mb-4 md:mb-6 lg:mb-8">
    @if ($position && $position === 'center')
        @if ($show_divider == true)
            <div class="divider grow"></div>
        @endif
        <div class="text-xl md:text-2xl lg:text-3xl font-bold flex items-center gap-x-2">
            @if ($icon)
                @if ($icon == 'category')
                    <x-heroicon-s-squares-2x2 class="inline {{ $icon_color ?? '' }} size-8 md:size-9" />
                @elseif($icon === 'offer')
                    <x-heroicon-s-percent-badge class="inline {{ $icon_color ?? '' }} size-8 md:size-9 text-error" />
                @elseif($icon === 'special_users')
                    <x-heroicon-s-users class="inline {{ $icon_color ?? '' }} size-8 md:size-9" />
                @elseif($icon === 'faq')
                    <x-heroicon-s-question-mark-circle class="inline {{ $icon_color ?? '' }} size-8 md:size-9" />
                @elseif($icon === 'people')
                    <x-heroicon-s-users class="inline {{ $icon_color ?? '' }} size-8 md:size-9" />
                @endif
            @endif
            <span class="@if ($color) text-{{ $color }} @endif">{{ $title }}</span>
        </div>
        @if ($show_divider == true)
            <div class="divider grow"></div>
        @endif
    @else
        <div class="text-xl md:text-2xl lg:text-3xl font-bold">
            @if ($icon)
                @if ($icon === 'products')
                    <x-heroicon-s-squares-2x2 class="{{ $icon_color ?? '' }} inline size-7 md:size-8" />
                @endif
            @endif
            {{ $title }}
        </div>
        @if ($show_divider == true)
            <div class="divider grow-1"></div>
        @endif
        @if ($link)
            <div>
                <a href="{{ $link['link'] }}" class="btn btn-primary btn-soft btn-sm">
                    {{ $link['title'] }}
                    <x-heroicon-s-chevron-left class="size-4" />
                </a>
            </div>
        @endif
    @endif
</div>
