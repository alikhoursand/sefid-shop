@extends('layouts.order')
@section('content')

    <section class="max-w-screen-lg mx-auto">
        <x-main.cart-header :step="2"></x-main.cart-header>
    </section>

    <section class="max-w-screen-xl mt-2 sm:mt-12 mx-auto">
        <div class="grid grid-cols-12 gap-4 px-2 mb-20 sm:mb-0">

            <div class="col-span-12 lg:col-span-8">
                <div class="rounded-box bg-base-100 shadow-md shadow-base-300 py-4 px-2 2xs:px-4">

                    <form id="shipping-form" action="{{ route('shop.order.create') }}" method="POST">
                        @csrf
                        <div class="grid gap-x-4 gap-y-2 md:grid-cols-2 ">
                            <div class="col-span-2 sm:col-span-1">
                                <label for="first_name" class="block mb-2 text-sm font-medium">نام</label>
                                <input type="text" id="first_name" name="fname"
                                       value="{{ old('fname') ? old('fname') : $address['address']['fname'] ?? '' }}"
                                       class="input focus:outline-none focus:shadow-none w-full" required/>
                                <span id="first_name_error" class="shipping-error text-sm text-error">
                                    @error('fname')
                                    {{ $message }}
                                    @enderror
                                    &nbsp;
                                </span>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="last_name" class="block mb-2 text-sm font-medium">نام
                                    خانوادگی</label>
                                <input type="text" id="last_name" name="lname"
                                       value="{{ old('lname') ? old('lname') : $address['address']['lname'] ?? '' }}"
                                       class="input focus:outline-none focus:shadow-none w-full " required/>
                                <span id="last_name_error" class="shipping-error text-sm text-error">
                                    @error('lname')
                                    {{ $message }}
                                    @enderror
                                    &nbsp;
                                </span>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="sphone" class="block mb-2 text-sm font-medium">موبایل</label>
                                <input disabled readonly value="{{ auth()->user()->phone ?? '' }}" type="number"
                                       id="sphone" class="input focus:outline-none focus:shadow-none w-full " required/>
                                <span id="phone_error" class="shipping-error text-sm text-error">
                                    @error('phone')
                                    {{ $message }}
                                    @enderror
                                    &nbsp;
                                </span>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="postal_code" class="block mb-2 text-sm font-medium">کد
                                    پستی</label>
                                <input type="number" id="postal_code" name="postal_code"
                                       value="{{ old('postal_code') ? old('postal_code') : $address['address']['postal_code'] ?? '' }}"
                                       class="input focus:outline-none focus:shadow-none w-full no-arrows" required/>
                                <span id="postal_code_error" class="shipping-error text-sm text-error">
                                    @error('postal_code')
                                    {{ $message }}
                                    @enderror
                                    &nbsp;
                                </span>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="state" class="block mb-2 text-sm font-medium">استان</label>
                                <select id="order_state" name="state_id"
                                        class="input focus:outline-none focus:shadow-none w-full ">
                                    <option {{ old('state_id') ? '' : 'selected' }} value="">انتخاب کنید</option>
                                    @foreach ($states as $state)
                                        <option
                                            {{ old('state_id') ? (old('state_id') == $state->id ? 'selected' : '') : '' }}
                                            value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach
                                </select>
                                <span id="state_error" class="shipping-error text-sm text-error">
                                    @error('state_id')
                                    {{ $message }}
                                    @enderror
                                    &nbsp;
                                </span>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="city" class="block mb-2 text-sm font-medium">شهر</label>
                                <select id="order_city" name="city_id" disabled
                                        class="input focus:outline-none focus:shadow-none w-full ">
                                    <option selected value="">ابتدا استان را انتخاب کنید</option>
                                </select>
                                <span id="city_error" class="shipping-error text-sm text-error">
                                    @error('city_id')
                                    {{ $message }}
                                    @enderror
                                    &nbsp;
                                </span>
                            </div>
                            <div class="col-span-2">
                                <label for="address" class="block mb-2   text-sm font-medium">آدرس</label>
                                <textarea id="address" rows="4" name="address"
                                          class="textarea focus:outline-none focus:shadow-none min-h-16 max-h-32 w-full ">{{ old('address') ? old('address') : $address['address']['address'] ?? '' }}</textarea>
                                <span id="address_error" class="shipping-error text-sm text-error">
                                    @error('address')
                                    {{ $message }}
                                    @enderror
                                    &nbsp;
                                </span>

                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="col-span-12 lg:col-span-4 ">
                <x-shop.cart-details
                    :method="'js'"
                    :discount="$discount"
                    :next_step="['text' => 'نهایی سازی سفارش', 'function' => 'sendInfo()', 'arrow' => true]"
                    :show="['total_price','discount_form','post_cost','payable_amount','products_discount','real_discount']"
                    :cart_details="$cart_details"
                ></x-shop.cart-details>

            </div>

        </div>
    </section>


    <section class="hidden sm:block  max-w-screen-xl mt-2 mx-auto p-2">
        <div class="flex justify-between items-center">
            <a href="{{ route('shop.cart.index') }}" class="btn btn-wide">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" width="24" height="24"
                     viewBox="0 0 24 24" fill="none">
                    <path
                        d="M8.90991 19.9201L15.4299 13.4001C16.1999 12.6301 16.1999 11.3701 15.4299 10.6001L8.90991 4.08008"
                        stroke="currentColor" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"
                        stroke-linejoin="round"/>
                </svg>
                <span>بررسی سبد خرید</span>
            </a>

        </div>
    </section>


    <div class="bottom-nav sticky absolute p-2 w-full bottom-0 left-0 bg-base-100 border-t-2 border-base-300 sm:hidden">
        <div class="flex items-center justify-between">
            <div class="basis-1/2">
                <button type="button" onclick="sendInfo()" class="btn btn-primary btn-wide">ثبت سفارش</button>
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


    @if (isset($address['address']['state_id']) && isset($address['address']['city_id']))
        @if ($address['address']['state_id'] != null && $address['address']['city_id'] != null)
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    selectOrderLocation({{ $address['address']['state_id'] }}, {{ $address['address']['city_id'] }});
                });
            </script>
        @endif
    @elseif(old('state_id') && old('city_id'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                selectOrderLocation({{ old('state_id') }}, {{ old('city_id') }});
            });
        </script>
    @endif

@endsection


@push('footer_scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            window.sendInfo = () => {
                document.getElementById('shipping-form').submit();
            }
        })
    </script>
@endpush
