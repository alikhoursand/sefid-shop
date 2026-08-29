@extends('layouts.index')
@section('content')
    <section class="md:mt-4 lg:mt-12 max-w-screen-xl mx-auto">

        <section class="md:px-2">
            <x-main.hero :sliders="$banners_sliders['slider']"></x-main.hero>
        </section>

        <section class="mt-12 px-2">
            <x-main.section-title :title="'پرفروش‌ها'" :show_divider="true" :link="[
                'link' => route('shop.product.list', ['sort' => 'most_sold']),
                'title' => 'مشاهده همه',
            ]"></x-main.section-title>

            <x-shop.product-slider :products="$most_sold"></x-shop.product-slider>
        </section>

        <section class="mt-12 px-2">
            <x-main.section-title :show_divider="true" :title="'دسته‌بندی‌ها'"></x-main.section-title>
            <x-main.categories :categories="$special_categories"></x-main.categories>
        </section>

        <section class="mt-12 px-2">
            <x-main.banners :banners="$banners_sliders['banner']"></x-main.banners>
        </section>

        <section class="mt-12 px-2">
            <x-main.section-title :title="'جدیدترین‌ها'" :show_divider="true"></x-main.section-title>
            <x-shop.product-grid :products="$new_products" :has_fade="['show' => true, 'link' => route('shop.product.list', ['sort' => 'newest'])]" :type="'normal'"></x-shop.product-grid>
        </section>

        <section class="my-12 px-2">
            <x-main.section-title :show_divider="true" :title="'سوالات متداول'"></x-main.section-title>
            <x-main.faq :faqs="$faqs"></x-main.faq>
        </section>

        <section class="mt-12 px-2">
            <x-main.services></x-main.services>
        </section>
    </section>
@endsection
