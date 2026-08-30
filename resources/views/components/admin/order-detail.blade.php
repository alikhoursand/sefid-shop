<div class="collapse collapse-arrow bg-base-100 shadow-sm shadow-base-300">
    <input type="checkbox" name="my-accordion-2" />
    <div class="collapse-title  flex flex-col gap-y-4 md:flex-row justify-between md:items-center items-start">
        <div class="text-right basis-1/4">
            <span class="opacity-75">شماره سفارش:</span>
            <span class="font-medium">{{ $order->id }}</span>
        </div>
        <div class="text-base lg:text-sm xl:text-base basis-1/4">
            <span class="opacity-75">مبلغ:</span>
            <span class="font-medium">{{ number_format($order->cost + $order->tax + $order->post - $order->discount) }}
            </span>
            <span class="text-sm">تومان</span>
        </div>
        <div class="text-center basis-1/2 sm:basis-1/3 lg:basis-3/12">
            @if ($order->status == 1 || $order->status == 2)
                <div class="badge lg:badge-sm xl:badge-md badge-info">
                    <span>در انتظار پرداخت</span>
                </div>
            @elseif($order->status == 3)
                <div class="badge lg:badge-sm xl:badge-md badge-success">
                    <span>پرداخت شده</span>
                </div>
            @elseif($order->status == 4)
                <div class="badge lg:badge-sm xl:badge-md badge-error">
                    <span>لغو شده</span>
                </div>
            @elseif($order->status == 5)
                <div class="badge lg:badge-sm xl:badge-md badge-primary">
                    <span>تکمیل شده</span>
                </div>
            @endif
        </div>
    </div>
    <div class="collapse-content border-base-300">
        <div class="divider"></div>
        <div class="flex flex-col sm:flex-row gap-y-2 flex-wrap pt-2 sm:pt-4 text-sm md:text-base">
            <div class="basis-1/2 p-2 flex flex-col md:flex-row gap-2">
                <span class="opacity-75">زمان آخرین تغییر:</span>
                <span class="font-medium">{{ verta($order->updated_at)->format('%d %B %Y - H:i:s') }}</span>
            </div>
            @if ($order->paid_at)
                <div class="basis-1/2 p-2 flex flex-col md:flex-row gap-2">
                    <span class="opacity-75">تاریخ پرداخت:</span>
                    <span class="font-medium">{{ verta($order->paid_at)->format('%d %B %Y') }}</span>
                </div>
            @else
                <div class="basis-1/2 flex flex-col md:flex-row gap-2"></div>
            @endif
            <div class="basis-full p-2 ">
                <div class="font-medium flex flex-col gap-y-2">
                    @php
                        $address = json_decode($order->address);
                    @endphp

                    <div><span class="opacity-75 font-normal">نام گیرنده:</span>
                        {{ $address->fname . ' ' . $address->lname }}
                    </div>
                    <div><span class="opacity-75 font-normal">کد پستی:</span> {{ $address->postal_code }}
                    </div>
                    <div><span class="opacity-75 font-normal">شماره تماس:</span> {{ $order->user->phone }}
                    </div>
                    <div><span class="opacity-75 font-normal">شهر - استان:</span>
                        {{ getLocation($address->city_id) . ' - ' . getLocation($address->state_id) }}
                    </div>
                    <div><span class="opacity-75 font-normal">آدرس:</span> {{ $address->address }}</div>
                </div>
            </div>

            <div class="basis-full">
                <div class="overflow-x-auto rounded-box bg-base-200">
                    <div class="p-2 sm:p-4 border-b-2 border-base-300 font-semibold">
                        <x-heroicon-s-cube class="size-5 sm:size-6 inline text-primary" />
                        محصولات سبد خرید
                    </div>
                    <div class="divide-y-2">
                        @php $total = 0; @endphp
                        @foreach ($order->items as $item)
                            @php
                                $total += $item->price * $item->qty;
                            @endphp
                            <div
                                class="p-2 sm:px-4 sm:p-4 border-dashed border-base-300 flex flex-col md:flex-row items-start md:items-center justify-between">
                                <div class="basis-2/6">{{ $item->product->title }}</div>
                                <div class="my-2 basis-1/6 text-center">
                                    <span class="font-bold text-primary">{{ $item->qty }}</span>
                                    عدد
                                </div>
                                <div class="basis-2/6 text-left">
                                    <span class="font-medium">{{ number_format($item->price) }}</span>
                                    تومان
                                </div>
                            </div>
                        @endforeach
                        <div class="p-2 sm:p-4 text-left">مجموع: <span
                                class="font-bold text-primary">{{ number_format($total) }}</span> تومان</div>
                    </div>
                </div>

                <div class="mt-4 overflow-x-auto rounded-box bg-base-200">
                    <div class="p-2 sm:p-4 border-b-2 border-base-300 font-semibold">
                        <x-heroicon-s-calculator class="size-5 sm:size-6 inline text-secondary" />
                        جزییات
                        تراکنش
                    </div>
                    <div class="p-2 sm:px-4 mt-2">
                        <div class="flex items-center justify-between gap-x-2">
                            <div class=" ">هزینه ارسال</div>
                            <div class="divider my-2 before:bg-base-300 after:bg-base-300 grow"></div>
                            <div class="text-left ">{{ number_format($order->post) }}
                                تومان
                            </div>
                        </div>

                        <div class="flex items-center justify-between gap-x-2">
                            <div class=" ">مالیات</div>
                            <div class="divider my-2 before:bg-base-300 after:bg-base-300 grow"></div>
                            <div class="text-left ">{{ number_format($order->tax) }}
                                تومان
                            </div>
                        </div>

                        <div class="flex items-center justify-between gap-x-2">
                            <div class=" ">تخفیف</div>
                            <div class="divider my-2 before:bg-base-300 after:bg-base-300 grow"></div>
                            <div class="text-left ">{{ number_format($order->discount) }}
                                تومان
                            </div>
                        </div>

                        <div class="flex items-center justify-between gap-x-2">
                            <div class=" ">جمع کل</div>
                            <div class="divider my-2 before:bg-base-300 after:bg-base-300 grow"></div>
                            <div class="text-left ">
                                <span
                                    class="font-bold text-info">{{ number_format($order->cost + $order->tax + $order->post - $order->discount) }}</span>
                                <span>تومان</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
