@extends('layouts.order')
@section('content')

    <section class="">
        <section class="max-w-screen-lg mx-auto">
            <x-main.cart-header :step="1"></x-main.cart-header>
        </section>
        @php
            $error = false;

            if (isset($cart_error)) {
                $error = $cart_error;
            } else {
                $error = session('cart_error');
            }

        @endphp
        <section class="max-w-screen-xl mt-2 sm:mt-12 mx-auto">
            <div class="grid grid-cols-12 gap-4 px-2 mb-20 sm:mb-0">
                <div class="col-span-12 {{ $error == false ? 'hidden' : '' }}">
                    @if ($error)
                        <div class="bg-error/20  p-4 mt-2 rounded-box">
                            <span class="text-error"> {{ count($error['products']) }} مورد از محصولات انتخاب شده در انبار
                                موجود نیست! </span>
                            <div class="mt-4 divide-y">
                                @foreach ($error['products'] as $unavailable_item)
                                    <div class="border-b-base-content/20 py-2">
                                        <div class="flex gap-2">
                                            <div>نام محصول:</div>
                                            <div>{{ $unavailable_item->product->title }}</div>
                                        </div>
                                        <div class="flex gap-2">
                                            <div>تعداد انتخاب شده:</div>
                                            <div>{{ $unavailable_item->qty }} عدد</div>
                                        </div>
                                        <div class="flex gap-2">
                                            <div>تعداد موجود:</div>
                                            <div>{{ $unavailable_item->product->qty }} عدد</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <div
                    class="col-span-12 lg:col-span-8 bg-base-100 shadow-md shadow-base-300 rounded-box overflow-hidden">
                    <div class=" p-2 2xs:p-4 space-y-2">
                        <div class="md:flex opacity-75  font-medium text-sm gap-x-4 hidden">
                            <div class="md:basis-6/12 "> کالاها <span
                                    class="text-xs text-primary">({{ count($cart_items) }})</span>
                            </div>
                            <div class="md:basis-3/12 text-center">قیمت</div>
                            <div class="md:basis-3/12 text-center">تعداد</div>
                        </div>
                        <div class="divider md:flex hidden"></div>
                        @if (count($cart_items) > 0)
                            <div class="divide-y-2">
                                @foreach ($cart_items as $item)
                                    <x-shop.cart-page-item :item="$item"></x-shop.cart-page-item>
                                @endforeach
                            </div>
                        @else
                            <div class="my-10 text-center opacity-75 font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-20 text-primary mx-auto" width="24"
                                     height="24" viewBox="0 0 24 24" fill="currentColor">
                                    <g clip-path="url(#clip0_4418_4777)">
                                        <path
                                            d="M16.25 22.5C17.2165 22.5 18 21.7165 18 20.75C18 19.7835 17.2165 19 16.25 19C15.2835 19 14.5 19.7835 14.5 20.75C14.5 21.7165 15.2835 22.5 16.25 22.5Z"
                                            fill="currentColor"/>
                                        <path
                                            d="M8.25 22.5C9.2165 22.5 10 21.7165 10 20.75C10 19.7835 9.2165 19 8.25 19C7.2835 19 6.5 19.7835 6.5 20.75C6.5 21.7165 7.2835 22.5 8.25 22.5Z"
                                            fill="currentColor"/>
                                        <path opacity="0.4"
                                              d="M4.84 3.94L4.64 6.39C4.6 6.86 4.97 7.25 5.44 7.25H20.75C21.17 7.25 21.52 6.92999 21.55 6.50999C21.68 4.73999 20.33 3.3 18.56 3.3H6.28999C6.18999 2.86 5.98999 2.44 5.67999 2.09C5.18999 1.56 4.49 1.25 3.77 1.25H2C1.59 1.25 1.25 1.59 1.25 2C1.25 2.41 1.59 2.75 2 2.75H3.74001C4.05001 2.75 4.34 2.88001 4.55 3.10001C4.76 3.33001 4.86 3.63 4.84 3.94Z"
                                              fill="currentColor"/>
                                        <path
                                            d="M20.5101 8.75H5.17006C4.75006 8.75 4.41005 9.07 4.37005 9.48L4.01005 13.83C3.87005 15.53 5.21006 17 6.92006 17H18.0401C19.5401 17 20.8601 15.77 20.9701 14.27L21.3001 9.60001C21.3401 9.14001 20.9801 8.75 20.5101 8.75Z"
                                            fill="currentColor"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_4418_4777">
                                            <rect width="24" height="24" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                                <div class="mt-8 text-sm md:text-base">سبد خرید شما خالی است</div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-span-12 lg:col-span-4 hidden sm:block">
                    <x-shop.cart-details
                        :method="'link'"
                        :next_step="['text' => 'ثبت سفارش', 'link' => route('shop.order.details'), 'arrow' => true]"
                        :show="['total_price','payable_amount','products_discount','real_discount']"
                        :cart_details="$cart_details"
                    ></x-shop.cart-details>
                </div>

            </div>
        </section>


        {{-- buttons --}}
        <section class="hidden sm:block max-w-screen-xl mx-auto mt-2 p-2">
            <div class="flex justify-between items-center">
                <a href="{{ route('home') }}" class="btn btn-wide">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" width="24" height="24" viewBox="0 0 24 24"
                         fill="none">
                        <path
                            d="M8.90991 19.9201L15.4299 13.4001C16.1999 12.6301 16.1999 11.3701 15.4299 10.6001L8.90991 4.08008"
                            stroke="currentColor" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round"/>
                    </svg>
                    <span>بازگشت</span>
                </a>

            </div>
        </section>

        <x-shop.order-navigation :cart_items="$cart_items" :cart_details="$cart_details"></x-shop.order-navigation>


    </section>
@endsection

@push('footer_scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            let loading = false;

            window.add = (productID) => {
                if (loading) {
                    return;
                }

                let qtyForm = document.getElementById(`qty-form-${productID}`);
                let action = document.getElementById(`qty-action-${productID}`);

                let addBtn = qtyForm.querySelector('.add-btn');

                addBtn.querySelector('svg').classList.add('hidden');
                addBtn.querySelector('.add-loading').classList.remove('hidden');

                action.value = 'add';
                qtyForm.submit();
            }

            window.sub = (productID) => {
                if (loading) {
                    return;
                }

                let qtyForm = document.getElementById(`qty-form-${productID}`);
                let action = document.getElementById(`qty-action-${productID}`);

                let subBtn = qtyForm.querySelector('.sub-btn');

                subBtn.querySelectorAll('svg').forEach((btnSvg) => {
                    btnSvg.classList.add('hidden');
                })

                subBtn.querySelector('.sub-loading').classList.remove('hidden');

                action.value = 'sub';
                qtyForm.submit();
            }
        });
    </script>
@endpush
