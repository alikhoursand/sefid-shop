@extends('layouts.admin')
@section('content')
    <x-admin.page-title :page_title="'کد تخفیف‌ها'"></x-admin.page-title>

    <div class="mb-8 flex items-center justify-start gap-x-2">
        <a href="{{ route('admin.shop.discount.create') }}" class="btn btn-success">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd"
                    d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z"
                    clip-rule="evenodd" />
            </svg>
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    class="size-6 inline text-success" fill="none">
                                    <g clip-path="url(#clip0_4418_9818scc)">
                                        <path
                                            d="M12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22Z"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M7.75 11.9999L10.58 14.8299L16.25 9.16992" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_4418_9818scc">
                                            <rect width="24" height="24" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" class="size-6 inline text-error">
                                    <g clip-path="url(#clip0_4418_9821)">
                                        <path
                                            d="M12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22Z"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M9.17004 14.8299L14.83 9.16992" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M14.83 14.8299L9.17004 9.16992" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_4418_9821">
                                            <rect width="24" height="24" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
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

                        <td class="text-right">
                            <a href="{{ route('admin.shop.discount.edit', $discount->id) }}"
                                class="btn btn-warning btn-sm btn-circle">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-5">
                                    <path
                                        d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                    <path
                                        d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                </svg>
                            </a>

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
    {{ $discounts->links() }}
@endsection
