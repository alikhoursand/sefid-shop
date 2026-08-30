@extends('layouts.admin')
@section('content')
    <x-admin.page-title :page_title="'کد تخفیف‌ها'"></x-admin.page-title>

    <div class="mb-8 flex items-center justify-start gap-x-2">
        <a href="{{ route('admin.shop.discount.create') }}" class="btn btn-success">
            <x-heroicon-s-plus-circle class="size-6" />
            ثبت کد تخفیف جدید
        </a>
    </div>

    <div class="mb-4">
        <form action="{{ route('admin.shop.discount.search') }}" method="get">
            <div class="flex items-end flex-wrap gap-4">
                <div class="w-[250px]">
                    <label for="code" class="text-sm block mb-2">کد</label>
                    <input type="text" value="{{ request()->code }}" name="code" id="code"
                        class="input w-full input-sm focus:outline-none">
                </div>
                <button class="btn btn-success btn-sm">جستحو</button>
            </div>
        </form>
    </div>

    <div class="relative overflow-x-auto bg-base-100 shadow-md shadow-base-300 rounded-box">
        <table class="w-full text-xs sm:text-sm text-left rtl:text-right">
            <thead class="text-xs sm:text-sm border-b-2 border-base-300 bg-base-100">
                <tr>
                    <th scope="col" class="p-4 min-w-[50px] text-center ">
                        #
                    </th>
                    <th scope="col" class="p-4 min-w-[150px] text-center">
                        کد
                    </th>
                    <th scope="col" class="p-4 text-center min-w-[150px]">
                        مقدار
                    </th>
                    <th scope="col" class="p-4 text-center">
                        نوع
                    </th>
                    <th scope="col" class="p-4 text-center min-w-[100px]">
                        یکبار مصرف
                    </th>
                    <th scope="col" class="p-4 text-center min-w-[150px]">
                        تاریخ انقضا
                    </th>
                    <th scope="col" class="p-4 text-center min-w-[100px]">
                        وضعیت
                    </th>
                    <th scope="col" class="p-4">
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y-2">
                @foreach ($discounts as $discount)
                    <tr class="border-base-200 hover:bg-base-200 duration-200">
                        <th scope="row" class="text-center font-medium whitespace-nowrap ">
                            {{ $discount->id }}
                        </th>
                        <td class="text-center p-4">
                            {{ $discount->code }}
                        </td>
                        <td class="text-center p-4">
                            {{ $discount->type == 1 ? number_format($discount->amount) . ' تومان ' : $discount->amount . '%' }}
                        </td>
                        <td class="text-center p-4">
                            {{ $discount->type == 1 ? 'مبلغ' : 'درصد' }}
                        </td>
                        <td class="text-center  p-4">
                            @if ($discount->one_time)
                                <x-heroicon-o-check-circle class="size-6 inline text-success" />
                            @else
                                <x-heroicon-o-x-circle class="size-6 inline text-error" />
                            @endif
                        </td>
                        <td class="text-center p-4 min-w-[150px]">
                            {{ $discount->expire_at ? verta($discount->expire_at)->format(' %d %B %Y') : 'ندارد' }}
                        </td>

                        <td class="p-4 text-center">
                            <div class="mx-auto">
                                @if ($discount->status == 1)
                                    <form action="{{ route('admin.shop.discount.change-status', $discount->id) }}"
                                        method="post">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-sm btn-success">
                                            فعال
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.shop.discount.change-status', $discount->id) }}"
                                        method="post">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-sm btn-error">
                                            غیرفعال
                                        </button>
                                    </form>
                                @endif
                            </div>

                        </td>

                        <td class="text-center">
                            <a href="{{ route('admin.shop.discount.edit', $discount->id) }}"
                                class="btn btn-warning btn-sm">
                                <x-heroicon-s-pencil-square class="size-4" />
                                ویرایش
                            </a>

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
    {{ $discounts->links() }}
@endsection
