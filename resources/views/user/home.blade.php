@extends('layouts.index')
@section('content')
    <section class="md:mt-4 lg:mt-12 max-w-screen-xl mx-auto">

        <section class="md:px-2">
            <x-main.hero :sliders="$banners_sliders['slider']" />
        </section>

        <section class="mt-12 px-2">
            <x-main.section-title :title="'پرفروش‌ها'" :show_divider="true" :link="[
                'link' => route('shop.product.list', ['sort' => 'most_sold']),
                'title' => 'مشاهده همه',
            ]" />

            <x-shop.product-slider :products="$most_sold" />
        </section>

        <section class="mt-12 px-2">
            <x-main.section-title :show_divider="true" :link="[
                'title' => 'مشاهده همه',
                'link' => route('shop.category.list'),
            ]" :title="'دسته‌بندی‌ها'" />
            <x-main.categories :categories="$special_categories" />
        </section>

        <section class="mt-12 px-2">
            <x-main.banners :banners="$banners_sliders['banner']" />
        </section>

        <section class="mt-12 px-2">
            <x-main.section-title :title="'جدیدترین‌ها'" :show_divider="true" />
            <x-shop.product-slider :products="$new_products" />
        </section>

        <section class="mt-12 px-2">
            <x-main.services />
        </section>
    </section>
@endsection
