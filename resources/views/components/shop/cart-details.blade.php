@props([
    'cart_details' => [],
    'show' => [],
    'method'=> '',
    'next_step' => '',
    'discount' => null,
    'previous_step' => '',
])

<div class="">
    <div class="bg-base-100 rounded-box shadow-md shadow-base-300 py-4 px-2 2xs:px-4 flex flex-col gap-y-4">

        @if(in_array('discount_form', $show))
            <form action="{{ route('shop.order.discount') }}" method="post" class="mb-2">
                @csrf
                <div class="flex w-full mb-1">
                    <div class="grow-1 ">
                        <input type="text" {{ $discount != null ? 'disabled' : '' }}
                        class="input focus:outline-none focus:shadow-none border-l-0 rounded-l-none w-full"
                               placeholder="کد تخفیف" name="discount_code" required/>
                    </div>
                    <button type="{{ $discount != null ? 'button' : 'submit' }}"
                            class="btn btn-accent {{ $discount != null ? 'btn-disabled' : '' }} rounded-r-none">
                        اعمال تخفیف
                    </button>
                </div>
                @if ($discount != null ? 'btn-disabled' : '')
                    <div class="text-sm text-accent">
                        <svg xmlns="http://www.w3.org/2000/svg" class="inline size-5" width="24" height="24"
                             viewBox="0 0 24 24">
                            <g clip-path="url(#clip0_4418_169728)">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM8.73 7.66C9.54 7.66 10.21 8.32 10.21 9.14C10.21 9.95 9.55 10.62 8.73 10.62C7.92 10.62 7.25 9.96 7.25 9.14C7.25 8.32 7.91 7.66 8.73 7.66ZM8.85 15.8C8.7 15.95 8.51 16.02 8.32 16.02C8.13 16.02 7.94 15.95 7.79 15.8C7.5 15.51 7.5 15.03 7.79 14.74L14.34 8.19C14.63 7.9 15.11 7.9 15.4 8.19C15.69 8.48 15.69 8.96 15.4 9.25L8.85 15.8ZM15.27 16.34C14.46 16.34 13.79 15.68 13.79 14.86C13.79 14.05 14.45 13.38 15.27 13.38C16.08 13.38 16.75 14.04 16.75 14.86C16.75 15.68 16.09 16.34 15.27 16.34Z"
                                    fill="currentColor"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_4418_169728">
                                    <rect width="24" height="24" fill="currentColor"/>
                                </clipPath>
                            </defs>
                        </svg>
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

            @if(in_array('products_discount', $show))
                @if($cart_details['products_discount'] && $cart_details['products_discount'] != 0)
                    <div class="flex items-center justify-between">
                        <div class="opacity-75">تخفیف کالاها:</div>
                        <div class="text-error">
                            <span>{{ number_format($cart_details['products_discount']) }}</span>
                            <span class="text-sm">تومان</span>
                        </div>
                    </div>
                @endif
            @endif


            @if(in_array('real_discount', $show))
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

            @if(in_array('post_cost', $show))
                @if($cart_details['post_cost'] && $cart_details['post_cost'] != 0)
                    <div class="flex items-center justify-between">
                        <div class="opacity-75">هزینه ارسال:</div>
                        <div>
                            <span>{{ number_format($cart_details['post_cost']) }}</span>
                            <span class="text-sm">تومان</span>
                        </div>
                    </div>
                @endif
            @endif

            @if(in_array('tax_amount', $show))
                @if($cart_details['tax_amount'] && $cart_details['tax_amount'] != 0)
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
                @if($previous_step)
                    <a href="{{ $previous_step}}" class="btn btn-soft btn-sm btn-block">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                             stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/>
                        </svg>
                        بازگشت
                    </a>
                @endif

                @if ($method == 'form')
                    <button type="submit" id="order-submit-btn" class="btn btn-primary btn-block mt-2">
                        {{$next_step['text']}}
                        @if($next_step['arrow'])
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                 stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5"/>
                            </svg>
                        @endif
                    </button>
                @endif

                @if ($method == 'js')
                    <button onclick="{{$next_step['function']}}" class="btn btn-primary btn-block mt-2">
                        {{$next_step['text']}}
                        @if($next_step['arrow'])
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                 stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5"/>
                            </svg>
                        @endif
                    </button>
                @endif

                @if($method == 'link')
                    <a href="{{ $next_step['link'] }}" class="btn btn-primary btn-block mt-2">
                        <span>{{ $next_step['text'] }}</span>
                        @if($next_step['arrow'])
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                 stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5"/>
                            </svg>
                        @endif
                    </a>
                @endif

            </div>
        </div>
    </div>
</div>
