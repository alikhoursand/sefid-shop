@extends('layouts.admin')
@section('content')
    <x-admin.page-title :page_title="'افزودن کد تخفیف'" :return="'admin.shop.discount.index'" :breadcrumbs="[
        [
            'title' => 'کد تخفیف ها',
            'link' => 'admin.shop.discount.index',
        ],
        [
            'title' => 'افزودن کد تخفیف',
            'link' => 'admin.shop.discount.create',
        ],
    ]"></x-admin.page-title>
    <div>
        <form action="{{ route('admin.shop.discount.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-row flex-wrap">

                <div class="xl:basis-1/4 lg:basis-1/3 md:basis-2/3 w-full p-2 relative">
                    <button type="button"
                        class="random-value z-10 absolute bottom-5.5 left-4 btn btn-xs btn-square btn-primary">
                        <x-heroicon-s-arrow-path class="size-4" />
                    </button>
                    <label for="title" class="block text-sm mb-2"> کد
                        تخفیف</label>
                    <input type="text" id="code" spellcheck="false" name="code" placeholder="کد تخفیف"
                        value="{{ old('code') }}" class="input focus:outline-none w-full">
                    <div class="error text-xs md:text-sm text-error mt-1">
                        @error('code')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="xl:basis-1/4 lg:basis-1/3 md:basis-2/3 w-full p-2">
                    <label for="type" class="block text-sm mb-2">نوع
                        تخفیف</label>
                    <select id="type" name="type" class="select focus:outline-none outline-0 w-full">
                        <option selected value="1">مبلغ ثابت</option>
                        <option value="2">درصدی</option>

                    </select>
                    <div class="error text-xs md:text-sm text-red-500 mt-1">
                        @error('type')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="xl:basis-1/4 lg:basis-1/3 md:basis-2/3 w-full p-2">
                    <label for="amount" class="block text-sm mb-2">مقدار</label>
                    <input type="text" id="amount" name="amount" placeholder="مقدار" value="{{ old('amount') }}"
                        class="input focus:outline-none w-full">
                    <div class="error text-xs md:text-sm text-red-500 mt-1">
                        @error('amount')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="flex flex-row flex-wrap">
                <div class="xl:basis-1/4 lg:basis-1/3 md:basis-2/3 w-full p-2">
                    <label for="expire_at" class="block text-sm mb-2">تاریخ
                        انقضا</label>
                    <input data-jdp id="expire_at" name="expire_at" autocomplete="off" aria-haspopup="false"
                        value="{{ old('expire_at') }}" class="input focus:outline-none w-full">
                    @error('expire_at')
                        {{ $message }}
                    @enderror
                </div>

                <div class="xl:basis-1/4 lg:basis-1/3 md:basis-2/3 w-full p-2 flex items-end">
                    <label class="inline-flex p-2 items-center cursor-pointer">
                        <input type="checkbox" name="one_time" value="1" checked="checked"
                            class="toggle toggle-primary" />
                        <span class="ms-3 text-sm font-medium ">یکبار مصرف</span>
                    </label>
                </div>
            </div>

            <button class="btn btn-success mt-10">
                ثبت کد تخفیف
            </button>
        </form>
    </div>
@endsection


@push('footer_js')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            jalaliDatepicker.startWatch({
                persianDigits: true,
                showTodayBtn: false,
                showEmptyBtn: false,
                hideAfterChange: false,
                showCloseBtn: true,
            });
        })
    </script>
@endpush
