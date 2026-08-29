<section class="block lg:hidden max-w-md mx-auto">
    <div class="collapse collapse-arrow bg-base-100 shadow-base-300 shadow-md">
        <input type="checkbox" name="filter-opener" class="!p-2" />
        <div
            class="bg-primary flex justify-center items-center text-primary-content gap-x-2 p-0 font-medium collapse-title !min-height-[100px]">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                 fill="none">
                <g clip-path="url(#clip0_4418_8580f)">
                    <path
                        d="M20.7199 18.24L19.7799 17.3C20.2699 16.56 20.5599 15.67 20.5599 14.71C20.5599 12.11 18.4499 10 15.8499 10C13.2499 10 11.1399 12.11 11.1399 14.71C11.1399 17.31 13.2499 19.42 15.8499 19.42C16.8099 19.42 17.6899 19.13 18.4399 18.64L19.3799 19.58C19.5699 19.77 19.8099 19.86 20.0599 19.86C20.3099 19.86 20.5499 19.77 20.7399 19.58C21.0899 19.22 21.0899 18.62 20.7199 18.24Z"
                        fill="currentColor" />
                    <path
                        d="M19.5799 4.02V6.24C19.5799 7.05 19.0799 8.06 18.5799 8.57L18.3999 8.73C18.2599 8.86 18.0499 8.89 17.8699 8.83C17.6699 8.76 17.4699 8.71 17.2699 8.66C16.8299 8.55 16.3599 8.5 15.8799 8.5C12.4299 8.5 9.62992 11.3 9.62992 14.75C9.62992 15.89 9.93992 17.01 10.5299 17.97C11.0299 18.81 11.7299 19.51 12.4899 19.98C12.7199 20.13 12.8099 20.45 12.6099 20.63C12.5399 20.69 12.4699 20.74 12.3999 20.79L10.9999 21.7C9.69992 22.51 7.90992 21.6 7.90992 19.98V14.63C7.90992 13.92 7.50992 13.01 7.10992 12.51L3.31992 8.47C2.81992 7.96 2.41992 7.05 2.41992 6.45V4.12C2.41992 2.91 3.31992 2 4.40992 2H17.5899C18.6799 2 19.5799 2.91 19.5799 4.02Z"
                        fill="currentColor" />
                </g>
                <defs>
                    <clipPath id="clip0_4418_8580f">
                        <rect width="24" height="24" fill="currentColor" />
                    </clipPath>
                </defs>
            </svg>
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
                               class="range w-full range-primary range-xs" />
                    </div>
                </div>
                <button class="btn btn-primary" onclick="filtersChanged()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none">
                        <g clip-path="url(#clip0_4418_8582)">
                            <path
                                d="M17.9199 10.12C17.5899 10.04 17.2399 10 16.8799 10C14.2599 10 12.1299 12.13 12.1299 14.75C12.1299 15.64 12.3799 16.48 12.8199 17.2C13.1899 17.82 13.6999 18.35 14.3199 18.73C15.0599 19.22 15.9399 19.5 16.8799 19.5C18.6199 19.5 20.1299 18.57 20.9499 17.2C21.3899 16.48 21.6299 15.64 21.6299 14.75C21.6299 12.49 20.0499 10.59 17.9199 10.12ZM19.2499 14.13L16.7099 16.47C16.5699 16.6 16.3799 16.67 16.1999 16.67C16.0099 16.67 15.8199 16.6 15.6699 16.45L14.4999 15.28C14.2099 14.99 14.2099 14.51 14.4999 14.22C14.7899 13.93 15.2699 13.93 15.5599 14.22L16.2199 14.88L18.2299 13.03C18.5399 12.75 19.0099 12.77 19.2899 13.07C19.5699 13.38 19.5499 13.85 19.2499 14.13Z"
                                fill="currentColor" />
                            <path
                                d="M20.5799 4.02V6.24C20.5799 7.05 20.0799 8.06 19.5799 8.57L19.3999 8.73C19.2599 8.86 19.0499 8.89 18.8699 8.83C18.6699 8.76 18.4699 8.71 18.2699 8.66C17.8299 8.55 17.3599 8.5 16.8799 8.5C13.4299 8.5 10.6299 11.3 10.6299 14.75C10.6299 15.89 10.9399 17.01 11.5299 17.97C12.0299 18.81 12.7299 19.51 13.4899 19.98C13.7199 20.13 13.8099 20.45 13.6099 20.63C13.5399 20.69 13.4699 20.74 13.3999 20.79L11.9999 21.7C10.6999 22.51 8.90992 21.6 8.90992 19.98V14.63C8.90992 13.92 8.50992 13.01 8.10992 12.51L4.31992 8.47C3.81992 7.96 3.41992 7.05 3.41992 6.45V4.12C3.41992 2.91 4.31992 2 5.40992 2H18.5899C19.6799 2 20.5799 2.91 20.5799 4.02Z"
                                fill="currentColor" />
                        </g>
                        <defs>
                            <clipPath id="clip0_4418_8582">
                                <rect width="24" height="24" fill="currentColor" />
                            </clipPath>
                        </defs>
                    </svg>
                    <span>اعمال فیلتر</span>
                </button>
            </div>
        </div>
    </div>
</section>
