<div class="collapse collapse-arrow bg-base-100 shadow-md shadow-base-300">
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
    <div class="collapse-content border-t-2 border-base-300">
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
                <div class="overflow-x-auto rounded-box bg-base-200 shadow-md shadow-base-300">
                    <div class="p-2 sm:p-4 border-b-2 border-base-content/10 font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#fff" class="size-5 sm:size-6 inline text-primary">
                            <g clip-path="url(#clip0_4418_169778w{{ $order->id }})">
                                <path d="M15.78 2H8.22C4.44 2 3.5 3.01 3.5 7.04V18.3C3.5 20.96 4.96 21.59 6.73 19.69L6.74 19.68C7.56 18.81 8.81 18.88 9.52 19.83L10.53 21.18C11.34 22.25 12.65 22.25 13.46 21.18L14.47 19.83C15.19 18.87 16.44 18.8 17.26 19.68C19.04 21.58 20.49 20.95 20.49 18.29V7.04C20.5 3.01 19.56 2 15.78 2ZM7.78 12C7.23 12 6.78 11.55 6.78 11C6.78 10.45 7.23 10 7.78 10C8.33 10 8.78 10.45 8.78 11C8.78 11.55 8.33 12 7.78 12ZM7.78 8C7.23 8 6.78 7.55 6.78 7C6.78 6.45 7.23 6 7.78 6C8.33 6 8.78 6.45 8.78 7C8.78 7.55 8.33 8 7.78 8ZM16.23 11.75H10.73C10.32 11.75 9.98 11.41 9.98 11C9.98 10.59 10.32 10.25 10.73 10.25H16.23C16.64 10.25 16.98 10.59 16.98 11C16.98 11.41 16.64 11.75 16.23 11.75ZM16.23 7.75H10.73C10.32 7.75 9.98 7.41 9.98 7C9.98 6.59 10.32 6.25 10.73 6.25H16.23C16.64 6.25 16.98 6.59 16.98 7C16.98 7.41 16.64 7.75 16.23 7.75Z" fill="currentColor" />
                            </g>
                            <defs>
                                <clipPath id="clip0_4418_169778w{{ $order->id }}">
                                    <rect width="24" height="24" fill="currentColor" />
                                </clipPath>
                            </defs>
                        </svg>
                        محصولات سبد خرید
                    </div>
                    <div class="divide-y-2">
                        @php $total = 0; @endphp
                        @foreach ($order->items as $item)
                        @php
                        $total += $item->price * $item->qty;
                        @endphp
                        <div class="p-2 sm:px-4 sm:p-4 border-dashed border-base-300 flex flex-col md:flex-row items-start md:items-center justify-between">
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
                        <div class="p-2 sm:p-4 text-left">مجموع: <span class="font-bold text-info">{{ number_format($total) }}</span> تومان</div>
                    </div>
                </div>

                <div class="mt-4 overflow-x-auto rounded-box bg-base-300 shadow-md">
                    <div class="p-2 sm:p-4 border-b-2 border-base-content/20 font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#fff" class="size-5 sm:size-6 inline text-secondary">
                            <g clip-path="url(#clip0_4418_169777s{{ $order->id }})">
                                <path d="M15.78 2H8.22C4.44 2 3.5 3.01 3.5 7.04V18.3C3.5 20.96 4.96 21.59 6.73 19.69L6.74 19.68C7.56 18.81 8.81 18.88 9.52 19.83L10.53 21.18C11.34 22.25 12.65 22.25 13.46 21.18L14.47 19.83C15.19 18.87 16.44 18.8 17.26 19.68C19.04 21.58 20.49 20.95 20.49 18.29V7.04C20.5 3.01 19.56 2 15.78 2ZM15 11.75H9C8.59 11.75 8.25 11.41 8.25 11C8.25 10.59 8.59 10.25 9 10.25H15C15.41 10.25 15.75 10.59 15.75 11C15.75 11.41 15.41 11.75 15 11.75ZM16 7.75H8C7.59 7.75 7.25 7.41 7.25 7C7.25 6.59 7.59 6.25 8 6.25H16C16.41 6.25 16.75 6.59 16.75 7C16.75 7.41 16.41 7.75 16 7.75Z" fill="currentColor" />
                            </g>
                            <defs>
                                <clipPath id="clip0_4418_169777s{{ $order->id }}">
                                    <rect width="24" height="24" fill="currentColor" />
                                </clipPath>
                            </defs>
                        </svg>
                        جزییات
                        تراکنش
                    </div>
                    <div class="p-2 sm:px-4 mt-2">
                        <div class="flex items-center justify-between gap-x-2">
                            <div class=" ">هزینه ارسال</div>
                            <div class="divider my-2 before:bg-base-content/10 after:bg-base-content/10 grow"></div>
                            <div class="text-left ">{{ number_format($order->post) }}
                                تومان
                            </div>
                        </div>

                        <div class="flex items-center justify-between gap-x-2">
                            <div class=" ">مالیات</div>
                            <div class="divider my-2 before:bg-base-content/10 after:bg-base-content/10 grow"></div>
                            <div class="text-left ">{{ number_format($order->tax) }}
                                تومان
                            </div>
                        </div>

                        <div class="flex items-center justify-between gap-x-2">
                            <div class=" ">تخفیف</div>
                            <div class="divider my-2 before:bg-base-content/10 after:bg-base-content/10 grow"></div>
                            <div class="text-left ">{{ number_format($order->discount) }}
                                تومان
                            </div>
                        </div>

                        <div class="flex items-center justify-between gap-x-2">
                            <div class=" ">جمع کل</div>
                            <div class="divider my-2 before:bg-base-content/10 after:bg-base-content/10 grow"></div>
                            <div class="text-left ">
                                <span class="font-bold text-primary">{{ number_format($order->cost + $order->tax + $order->post - $order->discount) }}</span>
                                <span>تومان</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
