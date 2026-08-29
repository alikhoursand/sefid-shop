<div class="drawer drawer-end z-20">
    <input id="cart-drawer" type="checkbox" class="drawer-toggle"/>
    <div class="drawer-content">
    </div>
    <div class="drawer-side z-20">
        <label for="cart-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
        <div class="w-full xs:w-md bg-base-100 min-h-full relative">
            <div class="p-4 border-b-2 border-base-content/10 flex items-center justify-between">
                <label for="cart-drawer" class="btn btn-sm btn-circle btn-ghost">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                    </svg>
                </label>
                <div class="flex items-center justify-center gap-x-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6 inline" width="24" height="24"
                         viewBox="0 0 24 24" fill="none">
                        <g clip-path="url(#clip0_4418_9661985)">
                            <path
                                d="M2 2H3.74001C4.82001 2 5.67 2.93 5.58 4L4.75 13.96C4.61 15.59 5.89999 16.99 7.53999 16.99H18.19C19.63 16.99 20.89 15.81 21 14.38L21.54 6.88C21.66 5.22 20.4 3.87 18.73 3.87H5.82001"
                                stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round"/>
                            <path
                                d="M16.25 22C16.9404 22 17.5 21.4404 17.5 20.75C17.5 20.0596 16.9404 19.5 16.25 19.5C15.5596 19.5 15 20.0596 15 20.75C15 21.4404 15.5596 22 16.25 22Z"
                                stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round"/>
                            <path
                                d="M8.25 22C8.94036 22 9.5 21.4404 9.5 20.75C9.5 20.0596 8.94036 19.5 8.25 19.5C7.55964 19.5 7 20.0596 7 20.75C7 21.4404 7.55964 22 8.25 22Z"
                                stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round"/>
                            <path d="M9 8H21" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_4418_9661985">
                                <rect width="24" height="24" fill="currentColor"/>
                            </clipPath>
                        </defs>
                    </svg>
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


