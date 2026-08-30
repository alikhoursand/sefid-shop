@extends('user.panel.main')
@section('user_panel')
    <div class="bg-base-100 rounded-box p-4 shadow-md shadow-base-300">
        <div class="">
            <p class="font-medium flex gap-x-2 items-center lg:text-lg">
                <x-heroicon-s-banknotes class="size-7 inline text-primary" />
                <span>تراکنش‌ها <span class="text-sm opacity-75">({{ $transactions->total() }})</span></span>
            </p>
        </div>
        <div class="mt-8 flex flex-col gap-y-2">
            @if (count($transactions) > 0)
                @foreach ($transactions as $transaction)
                    <x-user-panel.transaction-single :transaction="$transaction"></x-user-panel.transaction-single>
                @endforeach

                @if ($transactions->total() > 16)
                    <div class="my-8">
                        {{ $transactions->links() }}
                    </div>
                @endif
            @else
                <div class="my-10 flex flex-col gap-y-2 text-base-content/70 opacity-75">
                    <x-heroicon-s-banknotes class="size-15 lg:size-20 mx-auto" />
                    <span class="text-center mt-4"> تراکنشی ثبت نشده</span>
                </div>
            @endif

        </div>
    </div>
@endsection
