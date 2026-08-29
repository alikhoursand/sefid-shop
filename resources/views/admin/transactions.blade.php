@extends('layouts.admin')
@section('content')
    <x-admin.page-title :page_title="'تراکنش‌ها'"></x-admin.page-title>

    <p class="font-medium p-4  px-0">
        <span>لیست تراکنش‌ها</span>
        <span class="text-sm opacity-75">({{ $transactions->total() }})</span>
    </p>

    <div class="p-4 px-0">
        <form action="{{ route('admin.transactions.search') }}" method="get">
            <div class="flex items-end flex-wrap gap-4">
                <div class="w-[350px]">
                    <label for="id" class="text-sm block mb-2">شماره تراکنش / کد تراکنش / کد رهگیری / شماره
                        سفارش</label>
                    <input type="text" value="{{ request()->id }}" name="id" id="id"
                        class="input w-full input-sm focus:outline-none">
                </div>
                <button class="btn btn-success btn-sm">جستحو</button>
            </div>
        </form>
    </div>

    <div class="flex flex-col gap-y-2">
        @if (count($transactions) > 0)
            @foreach ($transactions as $transaction)
                <x-admin.transaction-detail :transaction="$transaction"></x-admin.transaction-detail>
            @endforeach
        @else
            <div class="my-10 flex flex-col gap-y-2">
                <svg class="size-15 lg:size-20  mx-auto opacity-75" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" viewBox="0 0 24 24" fill="none">
                    <g clip-path="url(#clip0_4418_169854swds)">
                        <path
                            d="M8.67188 14.3298C8.67188 15.6198 9.66188 16.6598 10.8919 16.6598H13.4019C14.4719 16.6598 15.3419 15.7498 15.3419 14.6298C15.3419 13.4098 14.8119 12.9798 14.0219 12.6998L9.99187 11.2998C9.20187 11.0198 8.67188 10.5898 8.67188 9.36984C8.67188 8.24984 9.54187 7.33984 10.6119 7.33984H13.1219C14.3519 7.33984 15.3419 8.37984 15.3419 9.66984"
                            stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12 6V18" stroke="#fff" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path
                            d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                            stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </g>
                    <defs>
                        <clipPath id="clip0_4418_169854swds">
                            <rect width="24" height="24" fill="white" />
                        </clipPath>
                    </defs>
                </svg>


                <span class="opacity-75 text-center"> تراکنشی ثبت نشده</span>
            </div>
        @endif
    </div>

    {{ $transactions->links() }}

@endsection
