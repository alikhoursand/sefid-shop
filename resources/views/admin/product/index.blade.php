@extends('layouts.admin')
@section('content')
    <x-admin.page-title :page_title="'لیست محصولات'"></x-admin.page-title>

    <div class="mb-8 flex items-center justify-start gap-x-2">
        <a href="{{ route('admin.shop.product.create') }}" class="btn btn-success">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd"
                    d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z"
                    clip-rule="evenodd" />
            </svg>
            ثبت محصول جدید
        </a>
    </div>
    <div class="mb-4">
        <form action="{{ route('admin.shop.product.search') }}" method="get">
            <div class="flex items-end flex-wrap gap-4">
                <div class="w-[250px]">
                    <label for="title" class="text-sm block mb-2">نام/کد/شناسه محصول</label>
                    <input type="text" value="{{ request()->title }}" name="title" id="title"
                        class="input w-full input-sm focus:outline-none">
                </div>
                <button class="btn btn-success btn-sm">جستحو</button>
            </div>
        </form>
    </div>


    <div class="relative overflow-x-auto bg-base-100 shadow-md shadow-base-300 rounded-box">
        <table class="w-full text-xs sm:text-sm text-left rtl:text-right">
            <thead class="text-xs border-b-2 border-base-300 sm:text-sm bg-base-100">
                <tr>
                    <th scope="col" class="p-4 w-[50px] text-center ">
                        #
                    </th>
                    <th scope="col" class="p-4 min-w-[150px]">
                        نام
                    </th>
                    <th scope="col" class="p-4 min-w-[100px] text-center">
                        کد
                    </th>
                    <th scope="col" class="p-4 text-center min-w-[100px]">
                        دسته بندی
                    </th>
                    <th scope="col" class="p-4 text-center min-w-[50px]">
                        موجودی
                    </th>
                    <th scope="col" class="p-4 text-center min-w-[100px]">
                        وضعیت
                    </th>
                    <th scope="col" class="p-4 text-center min-w-[100px]">
                        ویژگی ها
                    </th>
                    <th scope="col" class="p-4">
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y-2">
                @foreach ($products as $product)
                    <tr class="border-base-200 hover:bg-base-200 bg-base-100 duration-200">
                        <th scope="row" class="text-center font-medium whitespace-nowrap w-[50px]">
                            {{ $product->id }}
                        </th>
                        <td class="text-right p-4">
                            {{ $product->title }}
                        </td>
                        <td class="text-center p-4">
                            {{ $product->code }}
                        </td>
                        <td class="text-center">
                            {{ $product->category?->title }}
                        </td>
                        <td class="text-center">
                            {{ $product->qty }} <span class="text-xs sm:text-sm">عدد</span>
                        </td>

                        <td class="p-4 text-center">
                            <div class="mx-auto">
                                @if ($product->status == 1)
                                    <form action="{{ route('admin.shop.product.change-status', $product->id) }}"
                                        method="post">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-sm  btn-success">
                                            فعال
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.shop.product.change-status', $product->id) }}"
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
                        <td class="min-w-[200px]">
                            <div class="mx-auto w-fit">
                                <form action="{{ route('admin.shop.product.special', $product->id) }}" method="post"
                                    class="inline">
                                    @csrf
                                    @method('PUT')

                                    @if ($product->special == 1)
                                        <button type="submit" class="btn btn-sm btn-accent">ویژه</button>
                                    @else
                                        <button type="submit" class="btn btn-soft btn-sm btn-accent">ویژه</button>
                                    @endif
                                </form>

                                <form action="{{ route('admin.shop.product.mostsold', $product->id) }}" method="post"
                                    class="inline">
                                    @csrf
                                    @method('PUT')

                                    @if ($product->most_sold == 1)
                                        <button type="submit" class="btn btn-sm btn-info">پرفروش</button>
                                    @else
                                        <button type="submit" class="btn btn-soft btn-sm btn-info">پرفروش</button>
                                    @endif
                                </form>
                            </div>

                        </td>
                        <td class="text-center min-w-[100px]">
                            <a href="{{ route('admin.shop.product.edit', $product->id) }}"
                                class="btn btn-warning btn-sm btn-circle">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-5">
                                    <path
                                        d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                                </svg>
                            </a>
                            <button onclick="qty_modal.showModal()" class="btn btn-secondary btn-sm btn-circle mr-1 qty-btn"
                                data-name="{{ $product->title }}" data-id="{{ $product->id }}"
                                data-qty="{{ $product->qty }}">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-5">
                                    <path
                                        d="M21 6.375c0 2.692-4.03 4.875-9 4.875S3 9.067 3 6.375 7.03 1.5 12 1.5s9 2.183 9 4.875Z" />
                                    <path
                                        d="M12 12.75c2.685 0 5.19-.586 7.078-1.609a8.283 8.283 0 0 0 1.897-1.384c.016.121.025.244.025.368C21 12.817 16.97 15 12 15s-9-2.183-9-4.875c0-.124.009-.247.025-.368a8.285 8.285 0 0 0 1.897 1.384C6.809 12.164 9.315 12.75 12 12.75Z" />
                                    <path
                                        d="M12 16.5c2.685 0 5.19-.586 7.078-1.609a8.282 8.282 0 0 0 1.897-1.384c.016.121.025.244.025.368 0 2.692-4.03 4.875-9 4.875s-9-2.183-9-4.875c0-.124.009-.247.025-.368a8.284 8.284 0 0 0 1.897 1.384C6.809 15.914 9.315 16.5 12 16.5Z" />
                                    <path
                                        d="M12 20.25c2.685 0 5.19-.586 7.078-1.609a8.282 8.282 0 0 0 1.897-1.384c.016.121.025.244.025.368 0 2.692-4.03 4.875-9 4.875s-9-2.183-9-4.875c0-.124.009-.247.025-.368a8.284 8.284 0 0 0 1.897 1.384C6.809 19.664 9.315 20.25 12 20.25Z" />
                                </svg>
                            </button>

                            <form action="{{ route('admin.shop.product.qty', $product->id) }}" method="post"
                                id="qty_form_{{ $product->id }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" id="action-{{ $product->id }}" name="action">
                                <input type="hidden" id="qty-{{ $product->id }}" name="qty">
                            </form>

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>


    </div>
    {{ $products->links() }}

    <dialog id="qty_modal" class="modal">
        <div class="modal-box bg-base-300">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute left-2 top-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <g clip-path="url(#clip0_4418_9821wc)">
                            <path d="M12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22Z"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M9.17004 14.8299L14.83 9.16992" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M14.83 14.8299L9.17004 9.16992" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </g>
                        <defs>
                            <clipPath id="clip0_4418_9821wc">
                                <rect width="24" height="24" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </button>
            </form>
            <h3 class="text-lg font-bold">تغییر موجودی محصول</h3>
            <p class="py-4 text-sm">محصول انتخاب شده: <span id="selected_product" class="text-primary"></span></p>
            <p class="py-4 text-sm">موجودی فعلی: <span id="selected_qty" class="text-primary"></span></p>
            <div class="max-w-[150px] mx-auto">
                <label for="qty" class="block text-center">تعداد</label>
                <input type="number" value="0" id="qty"
                    class="mx-auto text-center input w-full focus:outline-none">
            </div>

            <div class="flex justify-center gap-x-4 mt-8 items-center">
                <button class="btn btn-success" id="add_qty">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    افزایش
                </button>
                <button class="btn btn-error" id="sub_qty">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 12H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    کاهش
                </button>
            </div>
        </div>
    </dialog>



    <script>
        let qtyBtns = document.querySelectorAll('.qty-btn');

        let changingQty = {
            name: null,
            id: null,
            qty: 0,
        };

        qtyBtns.forEach(qtyBtn => {
            qtyBtn.addEventListener('click', function() {
                changingQty.id = qtyBtn.getAttribute('data-id');
                document.getElementById('selected_product').innerText = qtyBtn.getAttribute('data-name');
                document.getElementById('selected_qty').innerText = qtyBtn.getAttribute('data-qty');
            });
        })


        let addQty = document.getElementById('add_qty');
        addQty.addEventListener('click', function() {
            document.getElementById(`qty-${changingQty.id}`).value = document.getElementById('qty').value;
            document.getElementById(`action-${changingQty.id}`).value = 'increase';

            document.getElementById(`qty_form_${changingQty.id}`).submit();

        })


        let subQty = document.getElementById('sub_qty');
        subQty.addEventListener('click', function() {
            document.getElementById(`qty-${changingQty.id}`).value = document.getElementById('qty').value;
            document.getElementById(`action-${changingQty.id}`).value = 'decrease';

            document.getElementById(`qty_form_${changingQty.id}`).submit();

        })
    </script>
@endsection
