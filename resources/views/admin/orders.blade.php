@extends('layouts.admin')
@section('content')

    <x-admin.page-title :page_title="'سفارش‌ها'"></x-admin.page-title>

    <p class="font-medium p-4 px-0">
        <span>لیست سفارش‌ها</span>
        <span class="text-sm opacity-75">({{ $orders->total() }})</span>
    </p>


    <div class="p-4 px-0">
        <form action="{{ route('admin.order.search') }}" method="get">
            <div class="flex items-end flex-wrap gap-4">
                <div class="w-[250px]">
                    <label for="id" class="text-sm block mb-2">شماره سفارش</label>
                    <input type="text" value="{{ request()->id }}" name="id" id="id"
                        class="input w-full input-sm focus:outline-none">
                </div>
                <button class="btn btn-success btn-sm">جستحو</button>
            </div>
        </form>
    </div>


    <div class="flex flex-col gap-y-2">
        @if ($orders->count() > 0)
            @foreach ($orders as $order)
                <x-admin.order-detail :order="$order"></x-admin.order-detail>
            @endforeach
        @else
            <div class="my-10 flex flex-col gap-y-2">
                <x-heroicon-s-list-bullet class="size-15 lg:size-20  mx-auto opacity-75" />
                <span class="opacity-75 text-center"> سفارشی ثبت نشده</span>
            </div>
        @endif
    </div>




    {{ $orders->links() }}

@endsection
