<section class="hidden lg:block">
    <div class="rounded-box bg-base-100 shadow-md shadow-base-300 p-4">
        <div class="flex justify-between align-center">
            <div class="basis-1/5 p-2 flex flex-col gap-2">
                <label class="block text-sm h-6" for="sort">ترتیب نمایش</label>
                <select id="sort" onchange="filtersChanged()" name="sort"
                        class="select border-base-300 border-2 focus:outline-none w-full h-12">
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
                <label class="block w-fit text-sm h-6" id="avail-label" for="avail">فقط موجود</label>
                <div
                    class="h-12 flex border-2 bg-base-100 border-base-300 rounded-box items-center justify-between gap-1">
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
            <div class="basis-1/6 p-2 flex flex-col gap-2 justify-between ">
                <label class="block w-fit text-sm h-6" id="offer-label" for="offer">فقط تخفیف‌دار</label>
                <div
                    class=" h-12 flex border-2 bg-base-100 border-base-300 rounded-box items-center justify-between gap-1">
                    <button type="button" id="offer-on" onclick="changeOffer(1,true)"
                            class="btn w-5/12  {{ request('offer') == '1' ? 'btn-primary' : 'btn-ghost' }}">فعال
                    </button>
                    <button type="button" id="offer-off" onclick="changeOffer(0,true)"
                            class="btn w-6/12 {{ request('offer') == '1' ? 'btn-ghost' : 'btn-primary' }}">غیرفعال
                    </button>
                </div>
                <input type="number" class="hidden" name="offer" id="offer"
                       value="{{ request('offer') ?? 0 }}">
            </div>
            <div class="divider mx-2 divider-horizontal"></div>
            <div class="basis-1/3 p-2 flex flex-col gap-2 justify-between">
                <div class="flex h-6 items-center justify-between">
                    <div class="badge badge-md badge-soft font-medium badge-primary">
                        <span>{{ number_format('1000') }}</span>
                        <span class="text-sm">تومان</span>
                    </div>
                    <div class="text-sm">تا</div>
                    <div class="badge badge-md badge-soft font-medium badge-primary">
                        <span id="max-price">{{ number_format(request('max_price') ?? 100000000) }}</span>
                        <span class="text-sm">تومان</span>
                    </div>
                </div>
                <div class="h-12 w-full flex items-center">
                    <input type="hidden" name="min_price" id="min-price"
                           value="{{ request('min_price') ?? 1000 }}">
                    <input id="price-range" type="range" name="max_price" min="1000" max="100000000"
                           value="{{ request('max_price') ?? 100000000 }}"
                           class="range w-full range-primary range-xs" />
                </div>
            </div>
        </div>
    </div>
</section>
