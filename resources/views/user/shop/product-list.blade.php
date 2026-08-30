@extends('layouts.index')
@section('content')
    <section class="mt-4 md:mt-8 lg:mt-12 max-w-screen-xl mx-auto px-2 relative">
        <div id="shop-loader" class="absolute hidden left-0 top-0 z-1 w-full h-full rounded-box bg-base-200 opacity-60">
        </div>

        <x-main.section-title :icon="'category'" :title="'محصولات'" :position="'center'"
            :show_divider="false"></x-main.section-title>

        {{-- filter --}}

        <x-shop.filters></x-shop.filters>

        <section class="my-12">
            @if (count($products) > 0)
                <x-shop.product-grid :products="$products" :type="'normal'"></x-shop.product-grid>
            @else
                <div class="my-10 h-[50vh] text-center opacity-75 font-medium">
                    <div class="h-full content-center">
                        <x-heroicon-s-magnifying-glass class="size-30 text-primary mx-auto"/>
                        <div class="text-primary">محصولی پیدا نشد :(</div>
                        <div class="mt-4 text-sm"> لطفا دوباره تلاش کنید یا فیلتر ها را حذف کنید</div>
                    </div>
                </div>
            @endif
        </section>
    </section>
@endsection
