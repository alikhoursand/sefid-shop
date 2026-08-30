@props([
    'page_title' => null,
    'return'=> false ,
    'back' => false
    ])

<div class=" flex justify-between items-center">
    <div class="lg:text-3xl text-xl font-semibold flex items-center gap-x-2">

        @isset($icon)

            @if($icon === 'user')
                <x-heroicon-c-user class="inline size-10"/>
            @elseif($icon === 'list')
                <x-heroicon-s-list-bullet class="size-10"/>
            @elseif( $icon === 'money')
                <x-heroicon-s-banknotes class="size-10"/>
            @endif

        @endisset
        {{ $page_title }}
    </div>
    <div>
        @if($return)
            <a class=" btn btn-sm btn-soft" href="{{ route($return) }}">
                <span class="font-medium">بازگشت</span>
                <x-heroicon-s-chevron-left class="size-4 mr-1" />
            </a>
        @endif
        @if($back)
            <a class="btn btn-sm btn-soft" href="{{ url()->previous() }}">
                <span class="font-medium">بازگشت</span>
                <x-heroicon-s-chevron-left class="size-4 mr-1" />
            </a>
        @endif
    </div>
</div>
@if (isset($breadcrumbs))
    <div class="breadcrumbs mt-2 text-sm">
        <ul>
            @foreach ($breadcrumbs as $breadcrumb)
                @isset($breadcrumb['link'])
                    <li class="opacity-75">
                        <a
                            href="{{ isset($breadcrumb['params']) ? route($breadcrumb['link'], $breadcrumb['params']) : route($breadcrumb['link']) }}">
                            {{ $breadcrumb['title'] }}
                        </a>
                    </li>
                @else
                    <li class="opacity-75">
                        <span>{{ $breadcrumb['title'] }}</span>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
@endif

<div class="divider"></div>



@if ($errors->any())
    <div class="alert bg-warning/10 text-warning font-medium mb-4">
        <div>
            <div class="text-lg font-semibold mb-5 flex items-center gap-2">
                <x-heroicon-o-information-circle class="size-7" />
                <h1>لطفا ورودی ها را بررسی کنید</h1>
            </div>
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    </div>
@endif

