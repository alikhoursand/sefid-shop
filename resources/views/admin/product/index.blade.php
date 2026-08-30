@extends('layouts.admin')
@section('content')
    <x-admin.page-title :page_title="'لیست محصولات'"></x-admin.page-title>

    <div class="mb-8 flex items-center justify-start gap-x-2">
        <a href="{{ route('admin.shop.product.create') }}" class="btn btn-success">
            <x-heroicon-s-plus-circle class="size-6" />
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
                            <a href="{{ route('admin.shop.product.edit', $product->id) }}" class="btn btn-warning btn-sm">
                                <x-heroicon-s-pencil-square class="size-4" />
                                ویرایش
                            </a>
                            <button onclick="qty_modal.showModal()" class="btn btn-secondary btn-sm mr-1 qty-btn"
                                data-name="{{ $product->title }}" data-id="{{ $product->id }}"
                                data-qty="{{ $product->qty }}">
                                <x-heroicon-s-cube class="size-4" />
                                موجودی
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
                    <x-heroicon-o-x-mark class="size-4" />
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
                    <x-heroicon-s-plus-circle class="size-6" />
                    افزایش
                </button>
                <button class="btn btn-error" id="sub_qty">
                    <x-heroicon-s-minus-circle class="size-6" />
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
