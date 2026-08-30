@extends('layouts.order')
@section('content')

    <section class="">
        <section class="max-w-screen-lg mx-auto">
            <x-main.cart-header :step="1"></x-main.cart-header>
        </section>
        @php
            $error = false;

            if (isset($cart_error)) {
                $error = $cart_error;
            } else {
                $error = session('cart_error');
            }

        @endphp
        <section class="max-w-screen-xl mt-2 sm:mt-12 mx-auto">
            <div class="grid grid-cols-12 gap-4 px-2 mb-20 sm:mb-0">
                <div class="col-span-12 {{ $error == false ? 'hidden' : '' }}">
                    @if ($error)
                        <div class="bg-error/20  p-4 mt-2 rounded-box">
                            <span class="text-error"> {{ count($error['products']) }} مورد از محصولات انتخاب شده در انبار
                                موجود نیست! </span>
                            <div class="mt-4 divide-y">
                                @foreach ($error['products'] as $unavailable_item)
                                    <div class="border-b-base-content/20 py-2">
                                        <div class="flex gap-2">
                                            <div>نام محصول:</div>
                                            <div>{{ $unavailable_item->product->title }}</div>
                                        </div>
                                        <div class="flex gap-2">
                                            <div>تعداد انتخاب شده:</div>
                                            <div>{{ $unavailable_item->qty }} عدد</div>
                                        </div>
                                        <div class="flex gap-2">
                                            <div>تعداد موجود:</div>
                                            <div>{{ $unavailable_item->product->qty }} عدد</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <div
                    class="col-span-12 lg:col-span-8 bg-base-100 shadow-md shadow-base-300 rounded-box overflow-hidden">
                    <div class=" p-2 2xs:p-4 space-y-2">
                        <div class="md:flex opacity-75  font-medium text-sm gap-x-4 hidden">
                            <div class="md:basis-6/12 "> کالاها <span
                                    class="text-xs text-primary">({{ count($cart_items) }})</span>
                            </div>
                            <div class="md:basis-3/12 text-center">قیمت</div>
                            <div class="md:basis-3/12 text-center">تعداد</div>
                        </div>
                        <div class="divider md:flex hidden"></div>
                        @if (count($cart_items) > 0)
                            <div class="divide-y-2">
                                @foreach ($cart_items as $item)
                                    <x-shop.cart-page-item :item="$item"></x-shop.cart-page-item>
                                @endforeach
                            </div>
                        @else
                            <div class="my-10 text-center opacity-75 font-medium">
                                <x-heroicon-s-shopping-bag class="size-20 text-base-content/70 mx-auto"/>
                                <div class="mt-8 text-sm md:text-base text-base-content/70">سبد خرید شما خالی است</div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-span-12 lg:col-span-4 hidden sm:block">
                    <x-shop.cart-details
                        :method="'link'"
                        :next_step="['text' => 'ثبت سفارش', 'link' => route('shop.order.details'), 'arrow' => true]"
                        :show="['total_price','payable_amount','products_discount','real_discount']"
                        :cart_details="$cart_details"
                    ></x-shop.cart-details>
                </div>

            </div>
        </section>


        {{-- buttons --}}
        <section class="hidden sm:block max-w-screen-xl mx-auto mt-2 p-2">
            <div class="flex justify-between items-center">
                <a href="{{ route('home') }}" class="btn btn-wide">
                    <x-heroicon-c-chevron-right class="size-5"/>
                    <span>بازگشت</span>
                </a>

            </div>
        </section>

        <x-shop.order-navigation :cart_items="$cart_items" :cart_details="$cart_details"></x-shop.order-navigation>


    </section>
@endsection

@push('footer_scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            let loading = false;

            window.add = (productID) => {
                if (loading) {
                    return;
                }

                let qtyForm = document.getElementById(`qty-form-${productID}`);
                let action = document.getElementById(`qty-action-${productID}`);

                let addBtn = qtyForm.querySelector('.add-btn');

                addBtn.querySelector('svg').classList.add('hidden');
                addBtn.querySelector('.add-loading').classList.remove('hidden');

                action.value = 'add';
                qtyForm.submit();
            }

            window.sub = (productID) => {
                if (loading) {
                    return;
                }

                let qtyForm = document.getElementById(`qty-form-${productID}`);
                let action = document.getElementById(`qty-action-${productID}`);

                let subBtn = qtyForm.querySelector('.sub-btn');

                subBtn.querySelectorAll('svg').forEach((btnSvg) => {
                    btnSvg.classList.add('hidden');
                })

                subBtn.querySelector('.sub-loading').classList.remove('hidden');

                action.value = 'sub';
                qtyForm.submit();
            }
        });
    </script>
@endpush
