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
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                            <path fill-rule="evenodd"
                                d="M4.755 10.059a7.5 7.5 0 0 1 12.548-3.364l1.903 1.903h-3.183a.75.75 0 1 0 0 1.5h4.992a.75.75 0 0 0 .75-.75V4.356a.75.75 0 0 0-1.5 0v3.18l-1.9-1.9A9 9 0 0 0 3.306 9.67a.75.75 0 1 0 1.45.388Zm15.408 3.352a.75.75 0 0 0-.919.53 7.5 7.5 0 0 1-12.548 3.364l-1.902-1.903h3.183a.75.75 0 0 0 0-1.5H2.984a.75.75 0 0 0-.75.75v4.992a.75.75 0 0 0 1.5 0v-3.18l1.9 1.9a9 9 0 0 0 15.059-4.035.75.75 0 0 0-.53-.918Z"
                                clip-rule="evenodd" />
                        </svg>
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
                    <select id="type" name="type" class="select focus:outline-none w-full">
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
