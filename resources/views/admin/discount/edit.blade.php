@extends('layouts.admin')
@section('content')
    <x-admin.page-title :page_title="'ویرایش کد تخفیف'" :return="'admin.shop.discount.index'" :breadcrumbs="[
        [
            'title' => 'کد تخفیف ها',
            'link' => 'admin.shop.discount.index',
        ],
        [
            'title' => 'ویرایش کد تخفیف',
            'link' => 'admin.shop.discount.edit',
            'params' => $discount->id,
        ],
    ]"></x-admin.page-title>

    <div>
        <form action="{{ route('admin.shop.discount.update', $discount->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="flex flex-row flex-wrap">

                <div class="xl:basis-1/4 lg:basis-1/3 md:basis-2/3 w-full p-2 relative">
                    <button type="button"
                        class="random-value z-10 absolute bottom-4 left-4 btn btn-sm btn-circle btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>

                    </button>
                    <label for="title" class="block mb-2"> کد
                        تخفیف</label>
                    <input type="text" id="code" spellcheck="false" name="code" placeholder="کد تخفیف"
                        value="{{ $discount->code }}" class="input focus:outline-none w-full">
                    <div class="error text-xs md:text-sm text-error mt-1">
                        @error('code')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="xl:basis-1/4 lg:basis-1/3 md:basis-2/3 w-full p-2">
                    <label for="type" class="block mb-2">نوع
                        تخفیف</label>
                    <select id="type" name="type" class="select focus:outline-none w-full">
                        <option @selected($discount->type == 1) value="1">مبلغ ثابت</option>
                        <option @selected($discount->type == 2) value="2">درصدی</option>

                    </select>
                    <div class="error text-xs md:text-sm text-red-500 mt-1">
                        @error('type')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="xl:basis-1/4 lg:basis-1/3 md:basis-2/3 w-full p-2">
                    <label for="amount" class="block mb-2">مقدار</label>
                    <input type="text" id="amount" name="amount" placeholder="مقدار" value="{{ $discount->amount }}"
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
                    <label for="expire_at" class="block mb-2">تاریخ
                        انقضا</label>
                    <input data-jdp id="expire_at" name="expire_at" autocomplete="off" aria-haspopup="false"
                        value="{{ $discount->expire_at ? verta($discount->expire_at)->format('Y/m/d') : '' }}"
                        class="input focus:outline-none w-full">
                    @error('expire_at')
                        {{ $message }}
                    @enderror
                </div>

                <div class="xl:basis-1/4 lg:basis-1/3 md:basis-2/3 w-full p-2 flex items-end">
                    <label class="inline-flex p-2 items-center cursor-pointer">
                        <input type="checkbox" name="one_time" value="1" @checked($discount->one_time)
                            class="toggle toggle-primary" />
                        <span class="ms-3 ">یکبار مصرف</span>
                    </label>
                </div>
            </div>


            <button class="btn btn-success mt-10">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                ویرایش کد تخفیف
            </button>
        </form>
    </div>
@endsection
