@extends('user.panel.main')
@section('user_panel')
    <div class="bg-base-100 rounded-box p-4 shadow-md shadow-base-300">
        <div class="space-x-2 font-medium">
            <x-heroicon-s-list-bullet class="size-7 inline text-primary"/>
            <span class="text-lg">سفارش‌ها</span>
        </div>
        <div class="grid grid-cols-1 2xs:grid-cols-2 md:grid-cols-4 mt-8 text-sm gap-4">
            <div class="bg-info text-info-content p-2 rounded-box flex gap-2 items-center">
                <x-heroicon-o-clock class="size-10"/>
                <div>
                    <div>
                    <span class="font-bold">
                        @isset($orders[1])
                            {{ $orders[1]->total }}
                        @else
                            0
                        @endisset
                    </span>
                        سفارش
                    </div>
                    <div class="font-medium">در انتظار پرداخت</div>
                </div>
            </div>
            <div class="bg-primary text-primary-content p-2 rounded-box flex gap-2 items-center">
                <x-heroicon-o-check-circle class="size-10"/>
                <div>
                    <div>
                    <span class="font-bold">
                        @isset($orders[3])
                            {{ $orders[3]->total }}
                        @else
                            0
                        @endisset
                    </span>
                        سفارش
                    </div>
                    <div class="font-medium">پرداخت شده</div>
                </div>
            </div>
            <div class="bg-success text-success-content p-2 rounded-box flex gap-2 items-center">
                <x-heroicon-o-clipboard-document-check class="size-10"/>
                <div>
                    <div>
                    <span class="font-bold">
                        @isset($orders[4])
                            {{ $orders[4]->total }}
                        @else
                            0
                        @endisset
                    </span>
                        سفارش
                    </div>
                    <div class="font-medium">تکمیل شده</div>
                </div>
            </div>
            <div class="bg-error text-error-content p-2 rounded-box flex gap-2 items-center">

                <x-heroicon-s-x-circle class="size-10"/>

                <div>
                    <div>
                    <span class="font-bold">
                        @isset($orders[4])
                            {{ $orders[4]->total }}
                        @else
                            0
                        @endisset
                    </span>
                        سفارش
                    </div>
                    <div class="font-medium">لغو شده</div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-base-100 rounded-box p-4 shadow-md shadow-base-300 mt-4">
        <div class="space-x-2 font-medium">
            <x-heroicon-o-shopping-bag class="size-7 inline text-primary"/>
            <span class="text-lg">سفارش‌های اخیر</span>
            <div class="mt-8 flex flex-col gap-y-2">
                @if (count($latest_orders) > 0)
                    @foreach ($latest_orders as $latest_order)
                        <x-user-panel.order-single :order="$latest_order"></x-user-panel.order-single>
                    @endforeach
                @else
                    <div class="my-10 flex flex-col gap-y-2 text-base-content/70 opacity-75">
                        <x-heroicon-s-list-bullet class="size-15 lg:size-20 mx-auto "/>
                        <span class=" text-center mt-4"> سفارشی ثبت نشده</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
