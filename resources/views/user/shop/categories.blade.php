@extends('layouts.index')
@section('content')
    <section class="mt-4 md:mt-8 lg:mt-12 max-w-screen-xl mx-auto px-2 ">

        <x-main.section-title :icon="'category'" :title="'لیست دسته‌بندی‌ها'" :position="'center'"
            :show_divider="false"></x-main.section-title>

        <section class="mt-12">
            @foreach ($categories as $category)
                <div class="pt-12">
                    <x-main.section-title :title="$category->title" :show_divider="false"></x-main.section-title>
                </div>
                @foreach ($category->children as $cat)
                    <div class="flex flex-wrap items-center">
                        <div class="basis-1/2 xs:basis-1/3 sm:basis-1/3 md:basis-2/8 lg:basis-1/6 p-2">
                            <x-shop.category-single :category="$cat"></x-shop.category-single>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </section>

    </section>
@endsection
