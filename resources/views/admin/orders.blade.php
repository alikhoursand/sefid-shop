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
                <input type="text" value="{{ request()->id }}" name="id" id="id" class="input w-full input-sm focus:outline-none">
            </div>
            <button class="btn btn-success btn-sm">جستحو</button>
        </div>
    </form>
</div>


<div class="flex flex-col gap-y-2">
    @if (count($orders) > 0)
    @foreach ($orders as $order)
    <x-admin.order-detail :order="$order"></x-admin.order-detail>
    @endforeach
    @else
    <div class="my-10 flex flex-col gap-y-2">

        <svg class="size-15 lg:size-20  mx-auto opacity-75" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <g clip-path="url(#clip0_4418_9724swwws)">
                <path d="M11 19.5H21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M11 12.5H21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M11 5.5H21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M3 5.5L4 6.5L7 3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M3 12.5L4 13.5L7 10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M3 19.5L4 20.5L7 17.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </g>
            <defs>
                <clipPath id="clip0_4418_9724swwws">
                    <rect width="24" height="24" fill="currentColor" />
                </clipPath>
            </defs>
        </svg>


        <span class="opacity-75 text-center"> سفارشی ثبت نشده</span>
    </div>
    @endif
</div>




{{ $orders->links() }}

@endsection
