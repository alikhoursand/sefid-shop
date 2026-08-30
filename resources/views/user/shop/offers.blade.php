@extends('layouts.index')
@section('content')
    <section class="mt-4 md:mt-8 lg:mt-12 max-w-screen-xl mx-auto px-2 relative">
        <div id="shop-loader" class="absolute hidden left-0 top-0 z-1 w-full h-full rounded-box bg-base-200 opacity-60">
        </div>

        <x-main.section-title :icon="'offer'" :title="'فروش ویژه'" :position="'center'" :show_divider="false"
            :color="'error'"></x-main.section-title>

        {{-- filter --}}
        <section class="hidden lg:block">
            <div class="rounded-box bg-base-300 p-4">
                <div class="flex justify-between align-center">
                    <div class="basis-1/5 p-2 flex flex-col gap-2">
                        <label class="block h-6" for="sort">ترتیب نمایش</label>
                        <select id="sort" onchange="filtersChanged()" name="sort"
                            class="select focus:outline-none w-full h-12">
                            <option @selected(request('sort') === 'newest') value="newest">
                                جدیدترین
                            </option>
                            <option @selected(request('sort') === 'most_sold') value="most_sold">
                                پرفروش‌ترین
                            </option>
                            <option @selected(request('sort') === 'lowest_price') value="lowest_price">
                                کمترین قیمت
                            </option>
                            <option @selected(request('sort') === 'highest_price') value="highest_price">
                                بیشترین قیمت
                            </option>
                        </select>
                    </div>
                    <div class="divider mx-2 divider-horizontal"></div>
                    <div class="basis-1/6 p-2 flex flex-col gap-2 justify-between ">
                        <label class="block w-fit h-6" id="avail-label" for="avail">فقط موجود</label>
                        <div
                            class=" h-12 flex border-2 border-base-300 bg-base-100 rounded-box items-center justify-between gap-1">
                            <button type="button" id="avail-on" onclick="changeAvail(1,true)"
                                class="btn w-5/12  {{ request('avail') == '1' ? 'btn-primary' : 'btn-ghost' }}">فعال
                            </button>
                            <button type="button" id="avail-off" onclick="changeAvail(0,true)"
                                class="btn w-6/12 {{ request('avail') == '1' ? 'btn-ghost' : 'btn-primary' }}">غیرفعال
                            </button>
                        </div>
                        <input type="number" class="hidden" name="avail" id="avail"
                            value="{{ request('avail') ?? 0 }}">
                    </div>
                    <div class="divider mx-2 divider-horizontal"></div>
                    <div class="basis-1/3 p-2 flex flex-col gap-2 justify-between">
                        <div class="flex h-6 items-center justify-between">
                            <div class="badge badge-md badge-soft font-medium badge-primary">
                                <span>{{ number_format('100000') }}</span>
                                تومان
                            </div>
                            <div>تا</div>
                            <div class="badge badge-md badge-soft font-medium badge-primary">
                                <span id="max-price">{{ number_format(request('max_price') ?? 100000000) }}</span>
                                تومان
                            </div>
                        </div>
                        <div class="h-12 w-full flex items-center">
                            <input type="hidden" name="min_price" id="min-price"
                                value="{{ request('min_price') ?? 100000 }}">
                            <input id="price-range" type="range" name="max_price" min="100000" max="100000000"
                                value="{{ request('max_price') ?? 100000000 }}"
                                class="range w-full range-primary range-xs" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="block lg:hidden max-w-lg mx-auto">

            <div class="collapse bg-base-300">
                <input type="checkbox" name="filter-opener" />
                <div
                    class="bg-primary flex justify-center items-center text-primary-content gap-x-2 font-medium collapse-title">
                    <x-heroicon-s-funnel class="size-5" />
                    فیلتر‌ها
                </div>
                <div class="collapse-content p-0 text-sm ">
                    <div class="flex flex-col gap-4 p-2 xs:p-4">
                        <div class=" p-2 flex flex-col gap-2">
                            <label class="block " for="sort">ترتیب نمایش</label>
                            <select id="mobile-sort" class="select focus:outline-none w-full max-w-[300px]">
                                <option @selected(request('sort') === 'newest') value="newest">
                                    جدیدترین
                                </option>
                                <option @selected(request('sort') === 'most_sold') value="most_sold">
                                    پرفروش‌ترین
                                </option>
                                <option @selected(request('sort') === 'lowest_price') value="lowest_price">
                                    کمترین قیمت
                                </option>
                                <option @selected(request('sort') === 'highest_price') value="highest_price">
                                    بیشترین قیمت
                                </option>
                            </select>
                        </div>
                        <div class=" p-2 flex items-center gap-2">
                            <label class=" w-30 h-6" for="mobile-avail">فقط موجود</label>
                            <div
                                class="  flex border-2 border-base-300 bg-base-100 rounded-box items-center justify-between gap-1">
                                <button type="button" id="mobile-avail-on" onclick="mobileChangeAvail(1)"
                                    class="btn w-5/12 btn-sm {{ request('avail') == '1' ? 'btn-primary' : 'btn-ghost' }}">
                                    فعال
                                </button>
                                <button type="button" id="mobile-avail-off" onclick="mobileChangeAvail(0)"
                                    class="btn w-6/12 btn-sm {{ request('avail') == '1' ? 'btn-ghost' : 'btn-primary' }}">
                                    غیرفعال
                                </button>
                            </div>
                        </div>
                        <div class=" p-2 flex flex-col gap-2 justify-between">
                            <div class="flex h-6 items-center justify-between">
                                <div class="badge badge-md badge-soft font-medium badge-primary">
                                    <span>{{ number_format('100000') }}</span>
                                    تومان
                                </div>
                                <div>تا</div>
                                <div class="badge badge-md badge-soft font-medium badge-primary">
                                    <span
                                        id="mobile-max-price">{{ number_format(request('max_price') ?? 100000000) }}</span>
                                    تومان
                                </div>
                            </div>
                            <div class="h-12 w-full flex items-center">
                                <input type="hidden" name="min_price" id="min-price"
                                    value="{{ request('min_price') ?? 100000 }}">
                                <input id="mobile-price-range" type="range" name="max_price" min="100000"
                                    max="100000000" value="{{ request('max_price') ?? 100000000 }}"
                                    class="range w-full range-primary range-xs" />
                            </div>
                        </div>
                        <button class="btn btn-primary" onclick="filtersChanged()">
                            <x-heroicon-s-funnel class="size-5" />
                            <span>اعمال فیلتر</span>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section class="my-12">
            @if (count($offers) > 0)
                <x-shop.product-grid :products="$offers" :type="'offer'"></x-shop.product-grid>
            @else
                <div class="my-10 text-center opacity-75 font-medium">
                    <x-heroicon-s-magnifying-glass class="size-20 text-primary mx-auto" />
                    <div class="text-primary">محصولی پیدا نشد :(</div>
                    <div class="mt-4 text-sm"> لطفا دوباره تلاش کنید یا فیلتر ها را حذف کنید</div>
                </div>
            @endif
        </section>
    </section>
@endsection

@push('header_scripts')
    <script>
        let currentPage = {{ request('page') ?? 1 }};
        let sort = 'newest';
        let avail = 0;
        let minPrice = 100000;
        let maxPrice = 100000000;

        function filtersChanged() {
            document.querySelector('#shop-loader').classList.remove('hidden');

            sort = document.querySelector('#sort').value;
            avail = document.querySelector('#avail').value;
            minPrice = document.querySelector('#min-price').value;
            maxPrice = document.querySelector('#price-range').value;

            // submit filters
            window.location.href =
                `{{ route('shop.offers') }}?sort=${sort}&avail=${avail}&min_price=${minPrice}&max_price=${maxPrice}&page=${currentPage}`;

        }

        function changeAvail(value) {
            if (value == 1) {
                document.querySelector('#avail').value = 1;
                document.querySelector('#avail-on').classList.remove('btn-ghost');
                document.querySelector('#avail-on').classList.add('btn-primary');
                document.querySelector('#avail-off').classList.add('btn-ghost');
                document.querySelector('#avail-off').classList.remove('btn-primary');
            } else {
                document.querySelector('#avail').value = 0;
                document.querySelector('#avail-on').classList.add('btn-ghost');
                document.querySelector('#avail-on').classList.remove('btn-primary');
                document.querySelector('#avail-off').classList.remove('btn-ghost');
                document.querySelector('#avail-off').classList.add('btn-primary');
            }

            filtersChanged()
        }

        function mobileChangeAvail(value) {
            if (value == 1) {
                document.querySelector('#avail').value = 1;
                document.querySelector('#mobile-avail-on').classList.remove('btn-ghost');
                document.querySelector('#mobile-avail-on').classList.add('btn-primary');
                document.querySelector('#mobile-avail-off').classList.add('btn-ghost');
                document.querySelector('#mobile-avail-off').classList.remove('btn-primary');
            } else {
                document.querySelector('#avail').value = 0;
                document.querySelector('#mobile-avail-on').classList.add('btn-ghost');
                document.querySelector('#mobile-avail-on').classList.remove('btn-primary');
                document.querySelector('#mobile-avail-off').classList.remove('btn-ghost');
                document.querySelector('#mobile-avail-off').classList.add('btn-primary');
            }
        }
    </script>
@endpush

@push('footer_scripts')
    <script>
        document.addEventListener("DOMContentLoaded", () => {

            let priceRange = document.querySelector('#price-range');
            priceRange.addEventListener('change', function() {
                document.querySelector('#max-price').innerText = new Intl.NumberFormat('fa-IR', {
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0,
                }).format(priceRange.value);

                filtersChanged();
            })

            let mobilePriceRange = document.querySelector('#mobile-price-range');
            mobilePriceRange.addEventListener('change', function() {
                document.querySelector('#mobile-max-price').innerText = new Intl.NumberFormat('fa-IR', {
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0,
                }).format(mobilePriceRange.value);

                document.querySelector('#price-range').value = mobilePriceRange.value;

            })

            let mobileSort = document.querySelector('#mobile-sort');
            mobileSort.addEventListener('change', function() {
                document.querySelector('#sort').value = mobileSort.value
            })

        });
    </script>
@endpush
