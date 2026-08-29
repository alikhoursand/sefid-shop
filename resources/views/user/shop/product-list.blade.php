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
                <div class="my-10 text-center opacity-75 font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-20 text-primary mx-auto" width="24"
                        height="24" viewBox="0 0 24 24">
                        <path
                            d="M14.5 10.75H8.5C8.09 10.75 7.75 10.41 7.75 10C7.75 9.59 8.09 9.25 8.5 9.25H14.5C14.91 9.25 15.25 9.59 15.25 10C15.25 10.41 14.91 10.75 14.5 10.75Z"
                            fill="currentColor" />
                        <path
                            d="M11.5 13.75H8.5C8.09 13.75 7.75 13.41 7.75 13C7.75 12.59 8.09 12.25 8.5 12.25H11.5C11.91 12.25 12.25 12.59 12.25 13C12.25 13.41 11.91 13.75 11.5 13.75Z"
                            fill="currentColor" />
                        <path opacity="0.4"
                            d="M11.5 21C16.7467 21 21 16.7467 21 11.5C21 6.25329 16.7467 2 11.5 2C6.25329 2 2 6.25329 2 11.5C2 16.7467 6.25329 21 11.5 21Z"
                            fill="currentColor" />
                        <path
                            d="M21.3001 22.0001C21.1201 22.0001 20.9401 21.9301 20.8101 21.8001L18.9501 19.9401C18.6801 19.6701 18.6801 19.2301 18.9501 18.9501C19.2201 18.6801 19.6601 18.6801 19.9401 18.9501L21.8001 20.8101C22.0701 21.0801 22.0701 21.5201 21.8001 21.8001C21.6601 21.9301 21.4801 22.0001 21.3001 22.0001Z"
                            fill="currentColor" />
                    </svg>
                    <div class="text-primary">محصولی پیدا نشد :(</div>
                    <div class="mt-4 text-sm"> لطفا دوباره تلاش کنید یا فیلتر ها را حذف کنید</div>
                </div>
            @endif
        </section>
    </section>
@endsection
