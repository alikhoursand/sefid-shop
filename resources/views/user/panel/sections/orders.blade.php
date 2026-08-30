@extends('user.panel.main')
@section('user_panel')

    <div class="bg-base-100 rounded-box p-4 shadow-md shadow-base-300">
        <div class="">
            <p class="font-medium flex gap-x-2 items-center lg:text-lg">
                <x-heroicon-s-list-bullet class="size-7 inline text-primary" />
                <span>سفارش‌ها <span class="text-sm opacity-75">({{ $orders->total() }})</span></span>
            </p>
        </div>
        <div class="mt-8 flex flex-col gap-y-2">
            @if (count($orders) > 0)
                @foreach ($orders as $order)
                    <x-user-panel.order-single :order="$order"></x-user-panel.order-single>
                @endforeach

                @if ($orders->total() > 16)
                    <div class="my-8">
                        {{ $orders->links() }}
                    </div>
                @endif
            @else
                <div class="my-10 opacity-75 text-base-content/70 flex flex-col gap-y-2">
                    <x-heroicon-s-list-bullet class="size-15 lg:size-20  mx-auto" />
                    <span class="text-center mt-4"> سفارشی ثبت نشده</span>
                </div>
            @endif
        </div>
    </div>

@endsection
