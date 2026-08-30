@props([
    'cart_details' => [],
    'show' => [],
    'method' => '',
    'next_step' => '',
    'discount' => null,
    'previous_step' => '',
])

<div class="">
    <div class="bg-base-100 rounded-box shadow-md shadow-base-300 py-4 px-2 2xs:px-4 flex flex-col gap-y-4">

        @if (in_array('discount_form', $show))
            <form action="{{ route('shop.order.discount') }}" method="post" class="mb-2">
                @csrf
                <div class="flex w-full mb-1">
                    <div class="grow-1 ">
                        <input type="text" {{ $discount != null ? 'disabled' : '' }}
                            class="input focus:outline-none focus:shadow-none border-l-0 rounded-l-none w-full"
                            placeholder="کد تخفیف" name="discount_code" required />
                    </div>
                    <button type="{{ $discount != null ? 'button' : 'submit' }}"
                        class="btn btn-accent {{ $discount != null ? 'btn-disabled' : '' }} rounded-r-none">
                        اعمال تخفیف
                    </button>
                </div>
                @if ($discount != null ? 'btn-disabled' : '')
                    <div class="text-sm text-accent">
                        <x-heroicon-m-percent-badge class="size-5" />
                        <span class="">تخفیف برای این سفارش اعمال شده است!</span>
                    </div>
                @endif

            </form>
        @endif

        <div class="flex flex-col gap-4">
            <div class="flex items-center justify-between">
                <div class="opacity-75">قیمت کالاها:</div>
                <div>
                    <span>{{ number_format($cart_details['total_price']) }}</span>
                    <span class="text-sm">تومان</span>
                </div>
            </div>

            @if (in_array('products_discount', $show))
                @if ($cart_details['products_discount'] && $cart_details['products_discount'] != 0)
                    <div class="flex items-center justify-between">
                        <div class="opacity-75">تخفیف کالاها:</div>
                        <div class="text-error">
                            <span>{{ number_format($cart_details['products_discount']) }}</span>
                            <span class="text-sm">تومان</span>
                        </div>
                    </div>
                @endif
            @endif


            @if (in_array('real_discount', $show))
                @if ($cart_details['real_discount'] && $cart_details['real_discount_id'])
                    <div class="flex items-center justify-between">
                        <div class="opacity-75">مبلغ تخفیف:</div>
                        <div class="text-error">
                            <span>{{ number_format($cart_details['real_discount']) }}</span>
                            <span class="text-sm">تومان</span>
                        </div>
                    </div>
                @endif
            @endif

            @if (in_array('post_cost', $show))
                @if ($cart_details['post_cost'] && $cart_details['post_cost'] != 0)
                    <div class="flex items-center justify-between">
                        <div class="opacity-75">هزینه ارسال:</div>
                        <div>
                            <span>{{ number_format($cart_details['post_cost']) }}</span>
                            <span class="text-sm">تومان</span>
                        </div>
                    </div>
                @endif
            @endif

            @if (in_array('tax_amount', $show))
                @if ($cart_details['tax_amount'] && $cart_details['tax_amount'] != 0)
                    <div class="flex items-center justify-between">
                        <div class="opacity-75">مالیات:</div>
                        <div>
                            <span>{{ number_format($cart_details['tax_amount']) }}</span>
                            <span class="text-sm">تومان</span>
                        </div>
                    </div>
                @endif
            @endif

            <div class="divider my-0"></div>
            <div class="flex items-center justify-between">
                <div class="opacity-75">جمع سبد خرید:</div>
                <div class="font-medium">
                    <span>{{ number_format($cart_details['payable_amount'] - $cart_details['real_discount']) }}</span>
                    <span class="text-sm">تومان</span>
                </div>
            </div>

            <div class="flex flex-col items-center justify-between mt-4">
                @if ($previous_step)
                    <a href="{{ $previous_step }}" class="btn btn-soft btn-sm btn-block">
                        <x-heroicon-c-chevron-right class="size-5" />
                        بازگشت
                    </a>
                @endif

                @if ($method == 'form')
                    <button type="submit" id="order-submit-btn" class="btn btn-primary btn-block mt-2">
                        {{ $next_step['text'] }}
                        @if ($next_step['arrow'])
                            <x-heroicon-m-chevron-left class="size-5" />
                        @endif
                    </button>
                @endif

                @if ($method == 'js')
                    <button onclick="{{ $next_step['function'] }}" class="btn btn-primary btn-block mt-2">
                        {{ $next_step['text'] }}
                        @if ($next_step['arrow'])
                            <x-heroicon-m-chevron-left class="size-5" />
                        @endif
                    </button>
                @endif

                @if ($method == 'link')
                    <a href="{{ $next_step['link'] }}" class="btn btn-primary btn-block mt-2">
                        <span>{{ $next_step['text'] }}</span>
                        @if ($next_step['arrow'])
                            <x-heroicon-m-chevron-left class="size-5" />
                        @endif
                    </a>
                @endif

            </div>
        </div>
    </div>
</div>
