@php
    if($step == 1){
        $backUrl = route('home');
    }else if($step == 2){
        $backUrl = route('shop.cart.index');
    }else if($step == 3){
        $backUrl = route('shop.order.details');
    }else{
        $backUrl = false;
    }
@endphp

<div
    class="hidden sm:flex flex-wrap items-center justify-center gap-x-4 sm:gap-0 px-4 border-b-2 sm:border-none pb-4 border-base-300 pt-4 md:pt-8 lg:pt-12 ">
    <div
        class="flex {{$step >= 1 ? 'text-primary' : ''}} flex-col items-center justify-center w-10 sm:w-30 md:w-34 text-base md:text-lg gap-y-2">
        <div class="">
            @if($step == 1)
                <x-heroicon-s-shopping-bag class="sm:block size-8 md:size-10"/>
            @else
                <x-heroicon-o-shopping-bag class="sm:block size-8 md:size-10"/>
            @endif
        </div>
        <div class="hidden sm:block {{$step == 1? 'font-medium':''}}">بررسی سبد خرید</div>
    </div>
    <div class="divider border-base-300 grow-1 {{$step >= 2 ? 'divider-primary' : ''}}"></div>
    <div
        class="flex {{$step >= 2 ? 'text-primary' : 'opacity-75'}} flex-col items-center justify-center w-10 sm:w-30 md:w-34 text-base md:text-lg gap-y-2">
        <div class="">
            @if($step == 2)
                <x-heroicon-s-truck class="sm:block size-8 md:size-10"/>
            @else
                <x-heroicon-o-truck class="sm:block size-8 md:size-10"/>
            @endif

        </div>
        <div class="hidden sm:block">اطلاعات ارسال</div>
    </div>
    <div class="divider border-base-300 grow-1 {{$step >= 3 ? 'divider-primary' : ''}}"></div>
    <div
        class="flex {{$step >= 3 ? 'text-primary' : 'opacity-75'}} flex-col items-center justify-center w-10 sm:w-30 md:w-34 text-base md:text-lg gap-y-2">
        <div class="">
            @if($step == 3)
                <x-heroicon-s-credit-card class="sm:block size-8 md:size-10"/>
            @else
                <x-heroicon-o-credit-card class="sm:block size-8 md:size-10"/>
            @endif
        </div>
        <div class="hidden sm:block">نحوه پرداخت</div>
    </div>
    <div class="divider border-base-300 grow-1 {{$step >= 4 ? 'divider-primary' : ''}}"></div>
    <div
        class="flex {{$step >= 4 ? 'text-primary' : 'opacity-75'}} flex-col items-center justify-center w-10 sm:w-30 md:w-34 text-base md:text-lg gap-y-2">
        <div class="">
            @if($step == 4)
                <x-heroicon-o-check-circle class="sm:block size-8 md:size-10"/>
            @else
                <x-heroicon-o-check-circle class="sm:block size-8 md:size-10"/>
            @endif
        </div>
        <div class="hidden sm:block">پایان خرید</div>
    </div>
    <div class="basis-full text-center text-lg text-primary mt-4 block sm:hidden">
        <div class="text-sm">مرحله {{$step}} از ۴</div>
        <div>
            @if($step == 1)
                بررسی سبد خرید
            @elseif($step == 2)
                اطلاعات ارسال
            @elseif($step == 3)
                نحوه پرداخت
            @else
                پایان خرید
            @endif
        </div>
    </div>
</div>


<div
    class="sm:hidden h-15 sticky top-0 right-0 absolute w-full border-b-2 border-base-300 bg-base-100 py-2 px-4">
    <div class="flex justify-between items-center text-center  h-full">
        <div class="w-10 text-right">
            @if($backUrl != false)
                <a href="{{$backUrl}}" class="btn btn-xs btn-circle ">
                    <x-heroicon-c-chevron-right class="size-5"/>
                </a>
            @endif
        </div>
        <div class="text-primary grow flex items-center justify-center h-full  gap-x-2">
            @if($step ==1)
                <div class="">
                    @if($step == 1)
                        <x-heroicon-s-shopping-bag class="size-6 md:size-10"/>
                    @else
                        <x-heroicon-o-shopping-bag class="size-6 md:size-10"/>
                    @endif
                </div>
                <div class="text-medium">سبد خرید</div>
            @elseif($step ==2)
                <div class="">
                    @if($step == 2)
                        <x-heroicon-s-truck class="size-6 md:size-10"/>
                    @else
                        <x-heroicon-o-truck class="size-6 md:size-10"/>
                    @endif
                </div>
                <div class="text-medium">اطلاعات ارسال</div>
            @elseif($step ==3)
                <div class="">
                    @if($step == 3)
                        <x-heroicon-s-credit-card class="size-6 md:size-10"/>
                    @else
                        <x-heroicon-o-credit-card class="size-6 md:size-10"/>
                    @endif
                </div>
                <div class="text-medium">نحوه پرداخت</div>
            @else
                <div class="">
                    @if($step == 4)
                        <x-heroicon-o-check-circle class="size-6 md:size-10"/>
                    @else
                        <x-heroicon-o-check-circle class="size-6 md:size-10"/>
                    @endif
                </div>
                <div class="text-medium">پایان خرید</div>
            @endif
        </div>
        <div class="text-sm text-left w-10 ">
            @if($step != 4)
                <div>مرحله</div>
                <span class="font-bold">{{$step}}</span> از ۴
            @endif
        </div>
    </div>
</div>

