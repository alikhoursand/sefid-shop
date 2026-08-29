@props(['transaction'])

<div class="bg-base-100 shadow-md shadow-base-300 p-4 rounded-box text-center">

    <div class="flex gap-x-2 items-center justify-between">
        <span class="opacity-75">وضعیت</span>
        <div class="divider my-2 before:bg-base-content/10 after:bg-base-content/10 grow"></div>

        @if($transaction->status == \App\Models\Shop\Transaction::STATUS_PENDING)
        <span class="font-medium text-info">در انتظار پرداخت</span>
        @elseif($transaction->status == \App\Models\Shop\Transaction::STATUS_SUCCESS)
        <span class="font-medium text-success">پرداخت شده</span>
        @elseif($transaction->status == \App\Models\Shop\Transaction::STATUS_VERIFIED)
        <span class="font-medium text-primary">تایید شده</span>
        @elseif($transaction->status == \App\Models\Shop\Transaction::STATUS_FAILED)
        <span class="font-medium text-error">خطا</span>
        @elseif($transaction->status == \App\Models\Shop\Transaction::STATUS_CANCELED)
        <span class="font-medium text-warning">انصراف</span>
        @elseif($transaction->status == \App\Models\Shop\Transaction::STATUS_GATEWAY)
        <span class="font-medium text-info">انتقال به درگاه</span>
        @else
        <span class="font-medium">نامشخص</span>
        @endif

    </div>
    <div class="flex gap-x-2 items-center justify-between">
        <span class="opacity-75">مبلغ</span>
        <div class="divider my-2 before:bg-base-content/10 after:bg-base-content/10 grow"></div>
        <span class="font-medium">{{number_format($transaction->amount)}} <span class="opacity-75">تومان</span></span>
    </div>

    <div class="flex gap-x-2 items-center justify-between">

        <span class="opacity-75">تاریخ</span>
        <div class="divider my-2 before:bg-base-content/10 after:bg-base-content/10 grow"></div>
        <span class="font-medium">{{verta($transaction->updated_at)->format('%d %B %Y - H:i:s')}}</span>
    </div>

    <div class="flex gap-x-2 items-center justify-between">

        <span class="opacity-75">کد تراکنش</span>
        <div class="divider my-2 before:bg-base-content/10 after:bg-base-content/10 grow"></div>
        <span class="font-medium">{{$transaction->track_id}}</span>
    </div>
    <div class="flex gap-x-2 items-center justify-between">

        <span class="opacity-75">شماره سفارش</span>
        <div class="divider my-2 before:bg-base-content/10 after:bg-base-content/10 grow"></div>
        <span class="font-medium">{{$transaction->order_id}}</span>
    </div>
    <div class="flex gap-x-2 items-center justify-between">
        <span class="opacity-75">کد بانک</span>
        <div class="divider my-2 before:bg-base-content/10 after:bg-base-content/10 grow"></div>
        <span class="font-medium">{{$transaction->bank_order_id ?? 'ثبت نشده'}}</span>
    </div>
    <div class="flex gap-x-2 items-center justify-between">
        <span class="opacity-75">کد رهگیری</span>
        <div class="divider my-2 before:bg-base-content/10 after:bg-base-content/10 grow"></div>
        <span class="font-medium">{{$transaction->trace ?? 'ثبت نشده'}}</span>
    </div>
</div>
