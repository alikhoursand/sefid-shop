<section class="hidden lg:block sticky top-32">
    <form action="{{ $searchRoute }}" method="get">
        <div class="bg-base-100 shadow-md shadow-base-300 rounded-box p-4 space-y-6">
            <div>
                <div class="flex items-center justify-between gap-x-2">
                    <div>
                        <x-heroicon-s-magnifying-glass class="size-6 inline text-secondary" />
                        <label for="search-text">جستجو</label>
                    </div>
                    <div>
                        @if (request()->input('q') || request()->input('avail') || request()->input('offer'))
                            <a href="{{ $searchRoute }}" class="text-xs cursor-pointer text-error">
                                <x-heroicon-s-x-mark class="size-4 inline" />
                                حذف فیلترها
                            </a>
                        @endif
                    </div>
                </div>
                <div>
                    <input id="search-text" type="text" name="q" value="{{ request()->input('q') }}"
                        class="input w-full outline-0 mt-2">
                </div>
            </div>
            <div>
                <div class="flex items-center justify-between">
                    <label for="avail">فقط کالاهای موجود</label>
                    <input name="avail" value="1" id="avail"
                        {{ request()->input('avail') == '1' ? 'checked' : '' }} type="checkbox"
                        class="toggle toggle-primary" />
                </div>
            </div>
            @if ($showOffer)
                <div>
                    <div class="flex items-center justify-between">
                        <label for="offer">فقط کالاهای تخفیف دار</label>
                        <input name="offer" value="1" id="offer"
                            {{ request()->input('offer') == '1' ? 'checked' : '' }} type="checkbox"
                            class="toggle toggle-primary" />
                    </div>
                </div>
            @endif

            <button class="btn btn-primary w-full">اعمال فیلترها</button>
        </div>
    </form>
</section>
