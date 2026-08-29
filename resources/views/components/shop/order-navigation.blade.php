@props([
    'cart_items' => [],
    'cart_details' => [],
])

<div
    class="{{ count($cart_items) > 0 ? 'block' : 'hidden' }} {{ count($cart_items) > 1 ? 'sticky' : '' }} absolute p-2 w-full bottom-0 left-0 bg-base-100 border-t-2 border-base-300 sm:hidden">
    <div class="flex items-center justify-between">
        <div class="basis-1/2">
            <a href="{{ route('shop.order.details') }}" class="btn btn-primary btn-wide">ثبت سفارش</a>
        </div>
        <div class="text-left basis-1/2">
            <div class="text-xs font-medium opacity-75">جمع سبد خرید</div>
            <div class="font-medium mt-2">
                <span>{{ number_format($cart_details['payable_amount']) }}</span>
                <span class="text-sm">تومان</span>
            </div>
        </div>
    </div>
</div>
