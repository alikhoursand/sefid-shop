@extends('layouts.index')
@section('content')
    <section class="mt-4 md:mt-8 lg:mt-12 max-w-screen-xl mx-auto px-2 relative">
        <div id="shop-loader" class="absolute hidden left-0 top-0 z-1 w-full h-full rounded-box bg-base-200 opacity-60">
        </div>

        <x-main.section-title :color="$shop_type == 'normal' ? '' : 'error'" :icon="$shop_type == 'normal' ? 'category' : 'offer'" :title="$shop_type == 'normal' ? 'محصولات' : 'محصولات تخفیف دار'" :position="'center'"
            :show_divider="false"></x-main.section-title>

        <section class="my-12">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12">
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 lg:col-start-4 lg:col-end-13 text-left">
                            <div class="flex items-center justify-between">
                                <button class="btn btn-primary btn-sm sm:btn-md" onclick="mobile_filters.showModal()">
                                    <x-heroicon-s-funnel class="size-4 inline" />
                                    فیلتر ها
                                </button>
                                <button class="btn btn-sm sm:btn-md" popovertarget="popover-1"
                                    style="anchor-name:--anchor-1">
                                    <x-heroicon-s-arrows-up-down class="size-4 inline" />
                                    ترتیب نمایش
                                </button>
                                <ul class="dropdown menu w-52 space-y-1 rounded-box bg-base-100 shadow-sm" popover
                                    id="popover-1" style="position-anchor:--anchor-1">
                                    <li><a class="{{ request()->input('sort') == 'newest' ? 'bg-primary font-medium text-primary-content' : '' }}"
                                            onclick="setSortParam('newest')">جدیدترین</a></li>
                                    <li><a class="{{ request()->input('sort') == 'lowest_price' ? 'bg-primary font-medium text-primary-content' : '' }}"
                                            onclick="setSortParam('lowest_price')">ارزان‌ترین</a></li>
                                    <li><a class="{{ request()->input('sort') == 'highest_price' ? 'bg-primary font-medium text-primary-content' : '' }}"
                                            onclick="setSortParam('highest_price')">گران‌ترین</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-3 hidden lg:block">
                    <x-shop.desktop-filters :search-route="$search_route" :show-offer="$shop_type !== 'offers'" />
                </div>
                <div class="col-span-12 lg:col-span-9">
                    @if (count($products) > 0)
                        <x-shop.product-grid :products="$products" :type="'normal'" />
                    @else
                        <div class="my-10 h-[50vh] text-center opacity-75 font-medium">
                            <div class="h-full content-center">
                                <x-heroicon-s-magnifying-glass class="size-30 text-primary mx-auto" />
                                <div class="text-primary">محصولی پیدا نشد :(</div>
                                <div class="mt-4 text-sm"> لطفا دوباره تلاش کنید یا فیلتر ها را حذف کنید</div>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </section>

        <x-shop.mobile-filters :search-route="$search_route" :show-offer="$shop_type !== 'offers'" />
    </section>
@endsection


@push('footer_scripts')
    <script>
        function setSortParam(value) {
            const params = new URLSearchParams(window.location.search);
            params.set('sort', value);
            window.location.href = `${window.location.pathname}?${params.toString()}`;
        }
    </script>
@endpush
