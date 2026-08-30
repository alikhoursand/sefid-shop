<div class="drawer drawer-end z-20">
    <input id="cart-drawer" type="checkbox" class="drawer-toggle"/>
    <div class="drawer-content">
    </div>
    <div class="drawer-side z-20">
        <label for="cart-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
        <div class="w-full xs:w-md bg-base-100 min-h-full relative">
            <div class="p-4 border-b-2 border-base-content/10 flex items-center justify-between">
                <label for="cart-drawer" class="btn btn-sm btn-circle btn-ghost">
                    <x-heroicon-s-x-mark class="size-6"/>
                </label>
                <div class="flex items-center justify-center gap-x-1">
                    <x-heroicon-s-shopping-bag class="size-6 inline"/>
                    <span>سبد خرید</span>
                </div>
                <div>
                    <div class="badge badge-primary font-medium">{{count($cart)}}</div>
                </div>
            </div>
            <div class="flex flex-col gap-y-2 p-2 xs:p-4 h-[calc(100vh-13.5rem)] overflow-auto">
                @if(count($cart) > 0)
                    @foreach($cart as $index => $item)
                        <x-main.cart-drawer-item :item="$item"></x-main.cart-drawer-item>
                    @endforeach
                @else
                    <div class="text-center opacity-75">سبد خرید شما خالی است</div>
                @endif
            </div>
            <div class="cart-price h-34 p-2 xs:p-4 w-full flex flex-col justify-between">
                <div class="flex items-center justify-between border-t-2 py-4 border-base-content/10">
                    <div class="opacity-75">مجموع سبد خرید:</div>
                    <div
                        class="font-medium">{{ count($cart) > 0 ? number_format(collect($cart)->sum(fn($item) => $item['price'] * $item['qty'])) : 0 }}
                        تومان
                    </div>
                </div>
                <a href="{{ route('shop.cart.index')}}"
                   class="btn btn-primary {{count($cart) > 0 ? '' : 'btn-soft btn-disabled'}} btn-block">
                    مشاهده و ثبت سفارش
                </a>
            </div>
        </div>
    </div>
</div>


