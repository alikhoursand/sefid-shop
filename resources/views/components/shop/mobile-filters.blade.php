<section class="block lg:hidden max-w-md mx-auto">
    <div class="collapse collapse-arrow bg-base-100 shadow-base-300 shadow-md">
        <input type="checkbox" name="filter-opener" class="!p-2"/>
        <div
            class="bg-primary rounded-box flex justify-center items-center text-primary-content gap-x-2 font-medium collapse-title">
            <x-heroicon-s-funnel class="size-6"/>
            فیلتر‌ها
        </div>
        <div class="collapse-content p-0 shadow-base-300 shadow-md">
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
                <div class="p-2 flex items-center gap-2">
                    <label class="block w-30 h-6" for="mobile-avail">فقط موجود</label>
                    <div
                        class="flex border-2 border-base-300 bg-base-100 rounded-box items-center justify-between gap-1">
                        <button type="button" id="mobile-avail-on" onclick="mobileChangeAvail(1)"
                                class="btn w-5/12 {{ request('avail') == '1' ? 'btn-primary' : 'btn-ghost' }}">
                            فعال
                        </button>
                        <button type="button" id="mobile-avail-off" onclick="mobileChangeAvail(0)"
                                class="btn w-6/12 {{ request('avail') == '1' ? 'btn-ghost' : 'btn-primary' }}">
                            غیرفعال
                        </button>
                    </div>
                </div>
                <div class="p-2 flex items-center gap-2">
                    <label class="block w-30 h-6" for="mobile-offer">فقط تخفیف‌دار</label>
                    <div
                        class="flex border-2 border-base-300 bg-base-100 rounded-box items-center justify-between gap-1">
                        <button type="button" id="mobile-offer-on" onclick="mobileChangeOffer(1)"
                                class="btn w-5/12 {{ request('offer') == '1' ? 'btn-primary' : 'btn-ghost' }}">
                            فعال
                        </button>
                        <button type="button" id="mobile-offer-off" onclick="mobileChangeOffer(0)"
                                class="btn w-1/2 {{ request('offer') == '1' ? 'btn-ghost' : 'btn-primary' }}">
                            غیرفعال
                        </button>
                    </div>
                </div>
                <div class="p-2 flex flex-col gap-2 justify-between">
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
                               class="range w-full range-primary range-xs"/>
                    </div>
                </div>
                <button class="btn btn-primary" onclick="filtersChanged()">
                    <x-heroicon-s-funnel class="size-5"/>
                    <span>اعمال فیلتر</span>
                </button>
            </div>
        </div>
    </div>
</section>
