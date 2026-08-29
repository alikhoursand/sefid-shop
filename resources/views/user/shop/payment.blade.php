@extends('layouts.order')
@section('content')
    <section class="max-w-screen-lg mx-auto">
        <x-main.cart-header :step="3"></x-main.cart-header>
    </section>

    <section class="mt-2 sm:mt-12 max-w-screen-xl mx-auto px-2">
        <div class="grid grid-cols-12 w-full justify-center gap-4">

            <div
                class="col-span-12 lg:col-span-7 xl:col-span-8 rounded-box bg-base-100 shadow-md shadow-base-300 py-4 px-2 2xs:px-4">
                <div class="">
                    <div
                        class="flex alert alert-warning alert-soft text-sm gap-2 p-2 2xs:p-4 rounded-box items-center mb-4"
                        role="alert">
                        <div class="w-6 h-6 self-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" width="24" height="24"
                                 viewBox="0 0 24 24">
                                <g clip-path="url(#clip0_4418_8604sssws)">
                                    <path
                                        d="M21.76 15.92L15.36 4.4C14.5 2.85 13.31 2 12 2C10.69 2 9.49998 2.85 8.63998 4.4L2.23998 15.92C1.42998 17.39 1.33998 18.8 1.98998 19.91C2.63998 21.02 3.91998 21.63 5.59998 21.63H18.4C20.08 21.63 21.36 21.02 22.01 19.91C22.66 18.8 22.57 17.38 21.76 15.92ZM11.25 9C11.25 8.59 11.59 8.25 12 8.25C12.41 8.25 12.75 8.59 12.75 9V14C12.75 14.41 12.41 14.75 12 14.75C11.59 14.75 11.25 14.41 11.25 14V9ZM12.71 17.71C12.66 17.75 12.61 17.79 12.56 17.83C12.5 17.87 12.44 17.9 12.38 17.92C12.32 17.95 12.26 17.97 12.19 17.98C12.13 17.99 12.06 18 12 18C11.94 18 11.87 17.99 11.8 17.98C11.74 17.97 11.68 17.95 11.62 17.92C11.56 17.9 11.5 17.87 11.44 17.83C11.39 17.79 11.34 17.75 11.29 17.71C11.11 17.52 11 17.26 11 17C11 16.74 11.11 16.48 11.29 16.29C11.34 16.25 11.39 16.21 11.44 16.17C11.5 16.13 11.56 16.1 11.62 16.08C11.68 16.05 11.74 16.03 11.8 16.02C11.93 15.99 12.07 15.99 12.19 16.02C12.26 16.03 12.32 16.05 12.38 16.08C12.44 16.1 12.5 16.13 12.56 16.17C12.61 16.21 12.66 16.25 12.71 16.29C12.89 16.48 13 16.74 13 17C13 17.26 12.89 17.52 12.71 17.71Z"
                                        fill="currentColor"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_4418_8604sssws">
                                        <rect width="24" height="24" fill="currentColor"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <span>
                            در صورتی که از فیلترشکن (VPN)
                            استفاده
                            می‌کنید، قبل از ورود به درگاه پرداخت آن را خاموش کنید.
                        </span>
                    </div>

                    <div class="mt-6 font-semibold">روش پرداخت خود را انتخاب کنید:</div>
                    <form method="post" action="{{ route('shop.order.pay') }}" class="mt-4" id="pay-form">
                        @csrf
                        <div class="flex flex-col gap-y-2">
                            <div>
                                <input type="radio" checked id="mellat" name="gateway" value="mellat"
                                       class="hidden peer" required/>
                                <label for="mellat"
                                       class="inline-flex items-center justify-between w-full p-4 bg-base-100 border-2 border-base-300 rounded-box cursor-pointer peer-checked:bg-primary/20 peer-checked:border-primary peer-checked:text-base-content peer-checked:hover:bg-primary/20 hover:bg-primary/10">
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold">بانک ملت</div>
                                        <div class="w-full h-12 text-sm sm:text-base">پرداخت آنلاین با تمامی کارت‌های
                                            بانکی
                                        </div>
                                    </div>
                                    <img class="w-16 rounded-lg" src="{{ asset('mellat.png') }}">
                                </label>
                            </div>

                            <div>
                                <input type="radio" checked id="asd" name="gateway" value="asd"
                                       class="hidden peer" required/>
                                <label for="asd"
                                       class="inline-flex duration-200 items-center justify-between w-full p-4 bg-base-100 border-2 border-base-300 rounded-box cursor-pointer peer-checked:bg-primary/20 peer-checked:border-primary peer-checked:text-base-content peer-checked:hover:bg-primary/20 hover:bg-primary/10">
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold">بانک تجارت</div>
                                        <div class="w-full h-12 text-sm sm:text-base">پرداخت آنلاین با تمامی کارت‌های
                                            بانکی
                                        </div>
                                    </div>
                                    <img class="w-16 rounded-lg" src="{{ asset('mellat.png') }}">
                                </label>
                            </div>
                        </div>


                        @csrf

                    </form>

                </div>
            </div>
            <div class="col-span-12 lg:col-span-5 xl:col-span-4">

                <x-shop.cart-details
                    :method="'js'"
                    :discount="$discount"
                    :next_step="['text' => 'پرداخت', 'function' => 'pay()', 'arrow' => false]"
                    :show="['total_price','post_cost','payable_amount','products_discount','real_discount']"
                    :cart_details="$cart_details"
                ></x-shop.cart-details>

            </div>
        </div>

    </section>

    <section class="hidden sm:block max-w-screen-xl mt-2 mx-auto p-2">
        <div class="flex justify-between items-center">
            <a href="{{ route('shop.order.details') }}" class="btn btn-wide">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" width="24" height="24" viewBox="0 0 24 24"
                     fill="none">
                    <path
                        d="M8.90991 19.9201L15.4299 13.4001C16.1999 12.6301 16.1999 11.3701 15.4299 10.6001L8.90991 4.08008"
                        stroke="currentColor" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"
                        stroke-linejoin="round"/>
                </svg>
                <span>اطلاعات ارسال</span>
            </a>

        </div>
    </section>
@endsection


@push('footer_scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            window.pay = () => {
                document.getElementById('pay-form').submit();
            }
        })
    </script>
@endpush
