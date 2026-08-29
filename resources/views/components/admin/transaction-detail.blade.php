@props(['transaction'])

<div class="collapse collapse-arrow bg-base-100 shadow-md shadow-base-300">
    <input type="checkbox" name="my-accordion-2" />
    <div class="collapse-title  flex flex-col gap-y-4 md:flex-row justify-between md:items-center items-start">
        <div class="text-right basis-1/4">
            <span class="opacity-75">شماره تراکنش:</span>
            <span class="font-medium">{{$transaction->id}}</span>
        </div>
        <div class="text-base lg:text-sm xl:text-base basis-1/4">
            <span class="opacity-75">مبلغ:</span>
            <span class="">{{number_format($transaction->amount)}} <span class="text-sm">تومان</span></span>
        </div>
        <div class="text-center  basis-1/4">
            @if($transaction->status == 1 )
            <div class="badge badge-info">
                <span>در انتظار پرداخت</span>
            </div>
            @elseif($transaction->status == 2)
            <div class="badge badge-success">
                <span>پرداخت شده</span>
            </div>
            @elseif($transaction->status == 3)
            <div class="badge badge-primary">
                <span>تایید شده</span>
            </div>
            @elseif($transaction->status == 4)
            <div class="badge badge-error">
                <span>ناموفق</span>
            </div>
            @elseif($transaction->status == 5)
            <div class="badge badge-error">
                <span>لغو شده</span>
            </div>
            @elseif($transaction->status == 6)
            <div class="badge">
                <span>نامشخص</span>
            </div>
            @endif
        </div>
    </div>
    <div class="collapse-content border-t-2 border-base-300 ">

        <div class="mt-4">
            <div class="flex items-center justify-between flex-row gap-x-2">
                <span class="opacity-75">تاریخ تراکنش:</span>
                <div class="divider my-2 before:bg-base-300 after:bg-base-300 grow"></div>
                <span class="font-medium">{{verta($transaction->paid_at)->format('%d %B %Y')}}</span>
            </div>
            <div class="flex items-center justify-between flex-row gap-x-2">
                <span class="opacity-75">بابت سفارش:</span>
                <div class="divider my-2 before:bg-base-300 after:bg-base-300 grow"></div>
                <span class="font-medium">{{$transaction->order_id}}</span>
            </div>
            <div class="flex items-center justify-between flex-row gap-x-2">
                <span class="opacity-75">کاربر:</span>
                <div class="divider my-2 before:bg-base-300 after:bg-base-300 grow"></div>
                <span class="font-medium">{{$transaction->user->phone}}</span>
            </div>
            <div class="flex items-center justify-between flex-row gap-x-2">
                <span class="opacity-75">کد تراکنش:</span>
                <div class="divider my-2 before:bg-base-300 after:bg-base-300 grow"></div>
                <span class="font-medium">{{$transaction->track_id}}</span>
            </div>
            <div class="flex items-center justify-between flex-row gap-x-2">
                <span class="opacity-75">کد بانک:</span>
                <div class="divider my-2 before:bg-base-300 after:bg-base-300 grow"></div>
                <span class="font-medium">{{$transaction->bank_order_id ?? 'ثبت نشده'}}</span>
            </div>
            <div class="flex items-center justify-between flex-row gap-x-2">
                <span class="opacity-75">کد رهگیری:</span>
                <div class="divider my-2 before:bg-base-300 after:bg-base-300 grow"></div>
                <span class="font-medium">{{$transaction->trace ?? 'ثبت نشده'}}</span>
            </div>
        </div>
    </div>
</div>
