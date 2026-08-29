@extends('layouts.admin')
@section('content')
    <x-admin.page-title :page_title="'ثبت محصول جدید'" :return="'shop.product.index'" :breadcrumbs="[
        [
            'title' => 'محصولات',
            'link' => 'shop.product.index',
        ],
        [
            'title' => 'ثبت محصول',
        ],
    ]"></x-admin.page-title>

    <div>
        <form action="{{ route('shop.product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-row flex-wrap">
                <div class="xl:basis-1/4 lg:basis-1/3 md:basis-2/3 w-full p-2">
                    <label for="title" class="block mb-2">نام
                        محصول</label>
                    <input type="text" id="title" name="title" placeholder="نام محصول" value="{{ old('title') }}"
                        class="input focus:outline-none w-full">
                    <div class="error text-xs md:text-sm text-error mt-1">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="xl:basis-1/4 lg:basis-1/3 md:basis-2/3 w-full p-2">
                    <label for="code" class="block mb-2">کد
                        محصول</label>
                    <input type="text" value="{{ old('code') }}" id="code" name="code" placeholder="کد محصول"
                        class="input focus:outline-none w-full">
                    <div class="error text-xs md:text-sm text-error mt-1">
                        @error('code')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="flex flex-row flex-wrap">
                <div class="xl:basis-1/4 lg:basis-1/3 md:basis-1/2 w-full p-2">
                    <label for="category_id" class="block mb-2 font-medium">دسته‌بندی</label>
                    <select id="category_id" name="category_id" class="select focus:outline-none w-full">
                        <option selected value="">انتخاب کنید</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if (old('category_id') == $category->id) selected @endif>
                                {{ $category->title }}</option>
                        @endforeach

                    </select>
                    <div class="error text-xs md:text-sm text-error mt-1">
                        @error('category_id')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="flex-row flex-wrap flex">
                <div class="xl:basis-1/4 lg:basis-1/3 md:basis-1/2 basis-full p-2">
                    <label for="price" class="block mb-2">قیمت</label>
                    <input type="number" id="price" name="price" placeholder="قیمت" value="{{ old('price') }}"
                        class="input focus:outline-none no-arrows w-full">

                    <div class="error text-xs md:text-sm text-error mt-1">
                        @error('price')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="xl:basis-1/4 lg:basis-1/3 md:basis-1/2 w-full p-2">
                    <label for="off_price" class="block mb-2">قیمت
                        با
                        تخفیف</label>
                    <input type="number" id="off_price" name="off_price" placeholder="قیمت با تخفیف"
                        value="{{ old('off_price') }}" class="input focus:outline-none w-full no-arrows">
                    <div class="error text-xs md:text-sm text-error mt-1">
                        @error('off_price')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="p-2 mt-5 lg:w-2/3 w-full">
                <label for="desc" class="block mb-2">توضیحات
                </label>
                <textarea class="textarea focus:outline-none w-full" name="desc" id="desc" placeholder="توضیحات محصول"></textarea>
                <div class="error text-xs md:text-sm text-error mt-1">
                    @error('desc')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="p-2 mt-5 xl:w-1/3 lg:w-1/2 md:w-2/3 w-full">

                <label for="image" class="block mb-2">عکس
                    شاخص</label>
                <input name="image" class="file-input w-full max-w-[350px] block mt-2 focus:outline-none" id="image"
                    type="file">
                <div class="error text-xs md:text-sm text-error mt-1">
                    @error('image')
                        {{ $message }}
                    @enderror
                </div>

                <div class="mt-5">
                    <img id="imagePreview" class="" src="" alt="Image Preview">
                </div>
            </div>


            <button class="btn btn-success mt-10">ثبت محصول</button>
        </form>
    </div>
@endsection
