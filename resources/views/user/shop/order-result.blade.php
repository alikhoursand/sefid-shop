@extends('layouts.order')
@section('content')
    <section class="max-w-screen-lg mx-auto">
        <x-main.cart-header :step="4"></x-main.cart-header>
    </section>

    <section class="max-w-screen-xl mt-2 sm:mt-12 mx-auto px-2">
        <div class="max-w-md mx-auto ">
            <div class="py-4 px-2 2xs:px-4 bg-base-100 shadow-md shadow-base-300 rounded-box">
                @if ($status == 1 || $status == 6)
                    {{-- pending or unknown --}}

                    <x-heroicon-s-exclamation-triangle class="text-warning size-18 md:size-25 mx-auto" />

                    <div class="text-center text-xl text-warning font-bold">تراکنش نامشخص</div>
                    <div class="text-center text-sm sm:text-base mt-5">مشکلی در پردازش تراکنش پیش آمده</div>
                    <div class="text-center text-error text-sm sm:text-base mt-2 mb-5">{{ $message }}</div>

                    <div class="flex items-center justify-between gap-x-2 py-4">
                        <div class="opacity-75">کد رهگیری:</div>
                        <div class="grow-1 border-t border-base-content/20 border-dashed"></div>
                        <div>{{ $transaction->trace ?? ($transaction->track_id ?? 'order-' . $transaction->order_id) }}</div>
                    </div>
                @elseif($status == 3)
                    {{-- verified --}}

                    <x-heroicon-s-check-circle class="size-18 md:size-25 mx-auto text-success" />

                    <div class="text-center text-xl text-success font-bold">تراکنش موفق</div>
                    <div class="text-center text-sm sm:text-base my-5">سفارش شما به زودی پردازش و ارسال می‌شود</div>

                    <div>
                        <div class="flex items-center justify-between gap-x-2 py-4">
                            <div class="opacity-75">مبلغ:</div>
                            <div class="grow-1 border-t border-base-content/20 border-dashed"></div>
                            <div>{{ number_format($transaction->amount) }} <span class="text-sm">تومان</span>
                            </div>
                        </div>
                        <div class="flex items-center justify-between gap-x-2 py-4">
                            <div class="opacity-75">کد رهگیری تراکنش:</div>
                            <div class="grow-1 border-t border-base-content/20 border-dashed"></div>
                            <div>{{ $transaction->track_id }}</div>
                        </div>
                        @php
                            $address = json_decode($transaction->order->address);
                        @endphp
                        <div class="flex items-center justify-between gap-x-2 py-4">
                            <div class="opacity-75">پرداخت کننده:</div>
                            <div class="grow-1 border-t border-base-content/20 border-dashed"></div>
                            <div>{{ $address->fname . ' ' . $address->lname }}</div>
                        </div>
                        {{-- <div class="flex flex-wrap items-center justify-between gap-x-2 py-4"> --}}
                        {{--     <div class="opacity-75">مشخصات ارسال:</div> --}}

                        {{--     @php --}}
                        {{--         $address = json_decode($transaction->order->address); --}}
                        {{--     @endphp --}}

                        {{--     <div class="w-full mt-2 flex flex-col gap-y-2"> --}}
                        {{--         <div> --}}
                        {{--             <span class="opacity-75">نام:</span> {{$address->fname . ' ' . $address->lname}} --}}
                        {{--         </div> --}}
                        {{--         <div> --}}
                        {{--             <span class="opacity-75">شماره:</span> {{$transaction->order->user->phone}} --}}
                        {{--         </div> --}}
                        {{--         <div> --}}
                        {{--             <span --}}
                        {{--                 class="opacity-75">استان - شهر:</span> {{\App\Models\StateCity::find($address->state_id)->name .' - '. \App\Models\StateCity::find($address->city_id)->name}} --}}
                        {{--         </div> --}}
                        {{--         <div> --}}
                        {{--             <span class="opacity-75">کد پستی:</span> {{$address->postal_code}} --}}
                        {{--         </div> --}}
                        {{--         <div> --}}
                        {{--             <span class="opacity-75">آدرس:</span> {{$address->address}} --}}
                        {{--         </div> --}}
                        {{--     </div> --}}
                        {{-- </div> --}}
                    </div>
                @elseif($status == 4)
                    {{-- error --}}

                    <x-heroicon-s-x-circle class="size-18 md:size-25 mx-auto text-error" />

                    <div class="text-center text-xl text-error font-bold">تراکنش ناموفق</div>
                    <div class="text-center text-sm sm:text-base mt-5">خطا در انجام تراکنش</div>
                    <div class="text-center text-sm sm:text-base text-error mt-2">مبلغ کسر شده از حساب شما تا ۷۲
                        ساعت
                        آینده بازگشت داده خواهد شد
                    </div>
                    <div class="text-center text-sm sm:text-base mt-2 mb-5">برای اطلاعات بیشتر با پشتیبانی سایت تماس
                        بگیرید
                    </div>

                    <div>
                        <div class="flex items-center justify-between gap-x-2 py-4">
                            <div class="opacity-75">شماره سفارش:</div>
                            <div class="grow-1 border-t border-base-content/20 border-dashed"></div>
                            <div>{{ $transaction->order->id }}</div>
                        </div>
                        <div class="flex items-center justify-between gap-x-2 py-4">
                            <div class="opacity-75">مبلغ تراکنش:</div>
                            <div class="grow-1 border-t border-base-content/20 border-dashed"></div>
                            <div>{{ number_format($transaction->amount) }} <span class="text-sm ">تومان</span>
                            </div>
                        </div>
                        <div class="flex items-center justify-between gap-x-2 py-4">
                            <div class="opacity-75">کد رهگیری:</div>
                            <div class="grow-1 border-t border-base-content/20 border-dashed"></div>
                            <div>{{ $transaction->track_id }}</div>
                        </div>
                        <div class="flex flex-wrap items-center justify-between gap-x-2 py-4">
                            <div class="opacity-75">توضیح خطا:</div>
                            <div class="grow-1 border-t border-base-content/20 border-dashed"></div>
                            <div class="w-full mt-2 ">
                                {{ $message }}
                            </div>
                        </div>
                    </div>
                @elseif($status == 5)
                    {{-- canceled --}}

                    <x-heroicon-s-x-circle class="size-18 md:size-25 mx-auto text-error" />

                    <div class="text-center text-xl text-error font-bold">پرداخت ناموفق</div>
                    <div class="text-center text-sm sm:text-base my-5">تراکنش لغو شد</div>

                    <div>
                        <div class="flex items-center justify-between gap-x-2 py-4">
                            <div class="opacity-75">شماره سفارش:</div>
                            <div class="grow-1 border-t border-base-content/20 border-dashed"></div>
                            <div>{{ $transaction->order->id }}</div>
                        </div>
                        <div class="flex items-center justify-between gap-x-2 py-4">
                            <div class="opacity-75">مبلغ تراکنش:</div>
                            <div class="grow-1 border-t border-base-content/20 border-dashed"></div>
                            <div>{{ number_format($transaction->amount) }} <span class="text-sm">تومان</span>
                            </div>
                        </div>
                        <div class="flex items-center justify-between gap-x-2 py-4">
                            <div class="opacity-75">کد رهگیری:</div>
                            <div class="grow-1 border-t border-base-content/20 border-dashed"></div>
                            <div>{{ $transaction->track_id }}</div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="my-4 grid grid-cols-6 gap-2">
                <a href="{{ route('home') }}" class="btn btn-default col-span-6 md:col-span-3">بازگشت به صفحه
                    اصلی</a>
                <a href="{{ route('user.panel') }}" class="btn btn-primary col-span-6 md:col-span-3">حساب کاربری</a>
            </div>
        </div>
    </section>
@endsection
