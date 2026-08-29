@extends('layouts.index')
@section('content')
    <section>
        @include('components.main.landing-hero')
    </section>
    <section class="bg-base-300 py-8 px-2" id="start_landing">
        <section class="max-w-screen-xl mx-auto">
            <x-main.section-title :title="'محصولات'" :show_divider="true" :icon="'products'"
                                  :link="['link'=>route('shop.product.list',['sort'=>'most_sold']),'title'=>'مشاهده همه']"></x-main.section-title>
            <x-shop.product-slider :products="$new_products"></x-shop.product-slider>
        </section>

    </section>
    <section class="bg-base-200 py-8">
        <section class="max-w-screen-lg mx-auto">
            <x-main.section-title :title="'مناسب برای'" :show_divider="false" :position="'center'" :icon="'people'"
                                  :icon_color="'text-accent'"></x-main.section-title>
            <x-main.targets></x-main.targets>
        </section>
    </section>
    <section class="bg-base-100 py-12">
        <section class="max-w-screen-xl mx-auto">
            <x-main.section-title :title="'به ما اعتماد کردند'" :show_divider="false" :position="'center'"
                                  :icon="'special_users'" :icon_color="'text-primary'"></x-main.section-title>
            <x-main.testimonials :testimonials="$testimonials"></x-main.testimonials>
        </section>
    </section>
    <section class="bg-base-300 py-8 px-2">
        <section class="max-w-screen-xl mx-auto">
            <x-main.section-title :show_divider="false" :position="'center'" :title="'سوالات متداول'"
                                  :icon="'faq'"></x-main.section-title>
            <x-main.faq :faqs="$faqs"></x-main.faq>
        </section>

    </section>
@endsection
