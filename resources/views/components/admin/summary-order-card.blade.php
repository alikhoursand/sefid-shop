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
            <x-heroicon-o-clock class="size-5"/>
            <span>انتقال به درگاه</span>
        </div>
        @elseif($order->status == \App\Models\Shop\Order::STATUS_PENDING)
        <div class="flex font-medium items-center gap-x-1 text-info">
            <x-heroicon-o-clock class="size-5"/>
            <span>در انتظار پرداخت</span>
        </div>
        @elseif($order->status == \App\Models\Shop\Order::STATUS_PAID)
        <div class="flex font-medium items-center gap-x-1 text-success">
            <x-heroicon-o-credit-card class="size-5" />
            <span>پرداخت شده</span>
        </div>
        @elseif($order->status == \App\Models\Shop\Order::STATUS_FAILED)
        <div class="flex font-medium items-center gap-x-1 text-error">
            <x-heroicon-o-x-circle class="size-5" />
            <span>لغو شده</span>
        </div>
        @elseif($order->status == \App\Models\Shop\Order::STATUS_DONE)
        <div class="flex font-medium items-center gap-x-1 text-primary">
            <x-heroicon-o-check-circle class="size-5" />
            <span>تکمیل شده</span>
        </div>
        @endif
    </div>
</div>
