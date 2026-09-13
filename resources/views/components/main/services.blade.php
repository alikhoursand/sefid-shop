@props([
    'display' => 'horizontal',
])

@if ($display == 'horizontal')
    <div class="grid grid-cols-2 xl:grid-cols-4 gap-4 md:gap-8 text-secondary">
        <div class="col-span-1 border-error/25 text-center flex align-items-center">
            <div class="w-full mx-auto p-3 md:p-6 flex sm:flex-row flex-col items-center gap-2 rounded-box">
                <x-heroicon-s-truck class="size-12 sm:size-12 md:size-16" />
                <div class="font-medium text-sm sm:text-base ">ارسال از خارج کشور</div>
            </div>
        </div>
        <div class="col-span-1 border-error/25 text-center flex align-items-center">
            <div class="w-full  mx-auto p-3 md:p-6 flex sm:flex-row flex-col items-center gap-2 rounded-box">
                <x-heroicon-m-check-badge class="size-12 sm:size-12 md:size-16" />
                <div class="font-medium text-sm sm:text-base">تضمین کیفیت</div>
            </div>
        </div>
        <div class="col-span-1 border-error/25 text-center flex align-items-center">
            <div class="w-full mx-auto p-3 md:p-6 flex sm:flex-row flex-col items-center gap-2 rounded-box">
                <x-heroicon-s-credit-card class="size-12 sm:size-12 md:size-16" />
                <div class="font-medium text-sm sm:text-base">پرداخت امن</div>
            </div>
        </div>
        <div class="col-span-1 border-error/25 text-center flex align-items-center">
            <div class="w-full mx-auto p-3 md:p-6 flex sm:flex-row flex-col items-center gap-2 rounded-box">
                <x-heroicon-s-chat-bubble-left-right class="size-12 sm:size-12 md:size-16" />
                <div class="font-medium text-sm sm:text-base">پشتیبانی ۲۴ ساعته</div>
            </div>
        </div>
    </div>
@else
    <div class="grid grid-cols-1 bg-base-100 rounded-box shadow-md shadow-base-300 divide-y-2">
        <div class="col-span-1 text-warning border-base-300 text-center flex align-items-center">
            <div class="w-full mx-auto p-3 md:p-6 flex sm:flex-row flex-col items-center gap-2 rounded-box">
                <x-heroicon-s-truck class="size-12 lg:size-12 xl:size-16" />
                <div class="font-medium text-sm sm:text-base ">ارسال از خارج کشور</div>
            </div>
        </div>
        <div class="col-span-1 text-primary border-base-300 text-center flex align-items-center">
            <div class="w-full mx-auto p-3 md:p-6 flex sm:flex-row flex-col items-center gap-2 rounded-box">
                <x-heroicon-m-check-badge class="size-12 lg:size-12 xl:size-16" />
                <div class="font-medium text-sm sm:text-base">تضمین کیفیت</div>
            </div>
        </div>
        <div class="col-span-1 text-success border-base-300 text-center flex align-items-center">
            <div class="w-full mx-auto p-3 md:p-6 flex sm:flex-row flex-col items-center gap-2 rounded-box">
                <x-heroicon-s-credit-card class="size-12 lg:size-12 xl:size-16" />
                <div class="font-medium text-sm sm:text-base">پرداخت امن</div>
            </div>
        </div>
        <div class="col-span-1 text-error border-base-300 text-center flex align-items-center">
            <div class="w-full mx-auto p-3 md:p-6 flex sm:flex-row flex-col items-center gap-2 rounded-box">
                <x-heroicon-s-chat-bubble-left-right class="size-12 lg:size-12 xl:size-16" />
                <div class="font-medium text-sm sm:text-base">پشتیبانی ۲۴ ساعته</div>
            </div>
        </div>
    </div>
@endif
