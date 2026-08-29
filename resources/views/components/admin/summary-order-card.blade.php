@props(['order'])

<div class=" bg-base-100 shadow-md shadow-base-300 p-4 rounded-box">
    <div class="flex gap-x-2 items-center justify-between">
        <span class="opacity-75  ">شماره سفارش</span>
        <div class="divider my-2 before:bg-base-content/10 after:bg-base-content/10 grow"></div>
        <span class="font-medium">{{$order->id}}</span>
    </div>
    <div class="flex gap-x-2 items-center justify-between">
        <span class=" opacity-75">مبلغ</span>
        <div class="divider my-2 before:bg-base-content/10 after:bg-base-content/10 grow"></div>
        <div>
            <span class="">{{number_format($order->cost + $order->tax + $order->post - $order->discount)}} </span>
            <span class=" opacity-75">تومان</span>
        </div>
    </div>
    <div class="flex gap-x-2 items-center justify-between">
        <span class=" opacity-75">وضعیت</span>
        <div class="divider my-2 before:bg-base-content/10 after:bg-base-content/10 grow"></div>
        @if($order->status == \App\Models\Shop\Order::STATUS_GATEWAY)
        <div class="flex font-medium items-center gap-x-1 text-info">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <span>انتقال به درگاه</span>
        </div>
        @elseif($order->status == \App\Models\Shop\Order::STATUS_PENDING)
        <div class="flex font-medium items-center gap-x-1 text-info">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <span>در انتظار پرداخت</span>
        </div>
        @elseif($order->status == \App\Models\Shop\Order::STATUS_PAID)
        <div class="flex font-medium items-center gap-x-1 text-success">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5 ">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
            </svg>
            <span>پرداخت شده</span>
        </div>
        @elseif($order->status == \App\Models\Shop\Order::STATUS_FAILED)
        <div class="flex font-medium items-center gap-x-1 text-error">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <span>لغو شده</span>
        </div>
        @elseif($order->status == \App\Models\Shop\Order::STATUS_DONE)
        <div class="flex font-medium items-center gap-x-1 text-primary">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5 ">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <span>تکمیل شده</span>
        </div>
        @endif
    </div>
</div>
