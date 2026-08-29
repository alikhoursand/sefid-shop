@props(['transactions'=>[]])

<div class="font-medium text-base xl:text-lg">آخرین تراکنش‌ها</div>
<div class="my-4 flex flex-col gap-y-2">
    @if(count($transactions) == 0)
        <span class="opacity-75"> تراکنشی ثبت نشده</span>
    @else
        @foreach($transactions as $transaction)
            <x-admin.summary-transaction-card :transaction="$transaction"></x-admin.summary-transaction-card>
        @endforeach
    @endif
</div>
