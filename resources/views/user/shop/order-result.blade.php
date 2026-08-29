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

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        class="text-warning size-18 md:size-25 mx-auto">
                        <g clip-path="url(#clip0_4418_4943)">
                            <path opacity="0.4"
                                d="M21.76 15.92L15.36 4.4C14.5 2.85 13.31 2 12 2C10.69 2 9.49998 2.85 8.63998 4.4L2.23998 15.92C1.42998 17.39 1.33998 18.8 1.98998 19.91C2.63998 21.02 3.91998 21.63 5.59998 21.63H18.4C20.08 21.63 21.36 21.02 22.01 19.91C22.66 18.8 22.57 17.38 21.76 15.92Z"
                                fill="currentColor" />
                            <path
                                d="M12 14.75C11.59 14.75 11.25 14.41 11.25 14V9C11.25 8.59 11.59 8.25 12 8.25C12.41 8.25 12.75 8.59 12.75 9V14C12.75 14.41 12.41 14.75 12 14.75Z"
                                fill="currentColor" />
                            <path
                                d="M12 18.0005C11.94 18.0005 11.87 17.9905 11.8 17.9805C11.74 17.9705 11.68 17.9505 11.62 17.9205C11.56 17.9005 11.5 17.8705 11.44 17.8305C11.39 17.7905 11.34 17.7505 11.29 17.7105C11.11 17.5205 11 17.2605 11 17.0005C11 16.7405 11.11 16.4805 11.29 16.2905C11.34 16.2505 11.39 16.2105 11.44 16.1705C11.5 16.1305 11.56 16.1005 11.62 16.0805C11.68 16.0505 11.74 16.0305 11.8 16.0205C11.93 15.9905 12.07 15.9905 12.19 16.0205C12.26 16.0305 12.32 16.0505 12.38 16.0805C12.44 16.1005 12.5 16.1305 12.56 16.1705C12.61 16.2105 12.66 16.2505 12.71 16.2905C12.89 16.4805 13 16.7405 13 17.0005C13 17.2605 12.89 17.5205 12.71 17.7105C12.66 17.7505 12.61 17.7905 12.56 17.8305C12.5 17.8705 12.44 17.9005 12.38 17.9205C12.32 17.9505 12.26 17.9705 12.19 17.9805C12.13 17.9905 12.06 18.0005 12 18.0005Z"
                                fill="currentColor" />
                        </g>
                        <defs>
                            <clipPath id="clip0_4418_4943">
                                <rect width="24" height="24" fill="currentColor" />
                            </clipPath>
                        </defs>
                    </svg>

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

                    <svg xmlns="http://www.w3.org/2000/svg" class="size-18 md:size-25 mx-auto text-success" width="24"
                        height="24" viewBox="0 0 24 24" fill="currentColor">
                        <g clip-path="url(#clip0_4418_4935123)">
                            <path opacity="0.4"
                                d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                fill="currentColor" />
                            <path
                                d="M10.5799 15.5796C10.3799 15.5796 10.1899 15.4996 10.0499 15.3596L7.21994 12.5296C6.92994 12.2396 6.92994 11.7596 7.21994 11.4696C7.50994 11.1796 7.98994 11.1796 8.27994 11.4696L10.5799 13.7696L15.7199 8.62961C16.0099 8.33961 16.4899 8.33961 16.7799 8.62961C17.0699 8.91961 17.0699 9.39961 16.7799 9.68961L11.1099 15.3596C10.9699 15.4996 10.7799 15.5796 10.5799 15.5796Z"
                                fill="currentColor" />
                        </g>
                        <defs>
                            <clipPath id="clip0_4418_4935123">
                                <rect width="24" height="24" fill="currentColor" />
                            </clipPath>
                        </defs>
                    </svg>

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

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="currentColor" class="size-18 md:size-25 mx-auto text-error">
                        <g clip-path="url(#clip0_4418_4940aa)">
                            <path opacity="0.4"
                                d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                fill="currentColor" />
                            <path
                                d="M13.0599 11.9994L15.3599 9.69937C15.6499 9.40937 15.6499 8.92937 15.3599 8.63938C15.0699 8.34938 14.5899 8.34938 14.2999 8.63938L11.9999 10.9394L9.69986 8.63938C9.40986 8.34938 8.92986 8.34938 8.63986 8.63938C8.34986 8.92937 8.34986 9.40937 8.63986 9.69937L10.9399 11.9994L8.63986 14.2994C8.34986 14.5894 8.34986 15.0694 8.63986 15.3594C8.78986 15.5094 8.97986 15.5794 9.16986 15.5794C9.35986 15.5794 9.54986 15.5094 9.69986 15.3594L11.9999 13.0594L14.2999 15.3594C14.4499 15.5094 14.6399 15.5794 14.8299 15.5794C15.0199 15.5794 15.2099 15.5094 15.3599 15.3594C15.6499 15.0694 15.6499 14.5894 15.3599 14.2994L13.0599 11.9994Z"
                                fill="currentColor" />
                        </g>
                        <defs>
                            <clipPath id="clip0_4418_4940aa">
                                <rect width="24" height="24" fill="currentColor" />
                            </clipPath>
                        </defs>
                    </svg>

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

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#fff"
                        class="size-18 md:size-25 mx-auto text-error">
                        <g clip-path="url(#clip0_4418_4940ab)">
                            <path opacity="0.4"
                                d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                fill="currentColor" />
                            <path
                                d="M13.0599 11.9994L15.3599 9.69937C15.6499 9.40937 15.6499 8.92937 15.3599 8.63938C15.0699 8.34938 14.5899 8.34938 14.2999 8.63938L11.9999 10.9394L9.69986 8.63938C9.40986 8.34938 8.92986 8.34938 8.63986 8.63938C8.34986 8.92937 8.34986 9.40937 8.63986 9.69937L10.9399 11.9994L8.63986 14.2994C8.34986 14.5894 8.34986 15.0694 8.63986 15.3594C8.78986 15.5094 8.97986 15.5794 9.16986 15.5794C9.35986 15.5794 9.54986 15.5094 9.69986 15.3594L11.9999 13.0594L14.2999 15.3594C14.4499 15.5094 14.6399 15.5794 14.8299 15.5794C15.0199 15.5794 15.2099 15.5094 15.3599 15.3594C15.6499 15.0694 15.6499 14.5894 15.3599 14.2994L13.0599 11.9994Z"
                                fill="currentColor" />
                        </g>
                        <defs>
                            <clipPath id="clip0_4418_4940ab">
                                <rect width="24" height="24" fill="currentColor" />
                            </clipPath>
                        </defs>
                    </svg>
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
