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
                            <x-heroicon-s-exclamation-triangle class="size-6"/>
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
                <x-heroicon-c-chevron-right class="size-5"/>
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
