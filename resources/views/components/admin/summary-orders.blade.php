@props(['orders'=>[]])

<div class="font-medium text-base xl:text-lg">آخرین سفارش‌ها</div>
<div class="my-4 flex flex-col gap-y-2">
    @if(count($orders) > 0)
        @foreach($orders as $order)
            <x-admin.summary-order-card :order="$order"></x-admin.summary-order-card>
        @endforeach
    @else
        <span class="opacity-75"> سفارشی ثبت نشده</span>
    @endif
</div>
