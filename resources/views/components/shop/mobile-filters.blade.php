<dialog id="mobile_filters" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
        <div class="flex items-center justify-between">
            <div>
                <x-heroicon-s-funnel class="size-6 inline text-secondary" />
                <label for="search-text" class="font-medium">فیلتر ها</label>
            </div>
            <div>
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost">
                        <x-heroicon-o-x-circle class="size-6 inline" />
                    </button>
                </form>
            </div>
        </div>
        <div class="divider mt-0 mb-2"></div>
        <div>
            <form action="{{ $searchRoute }}" method="get">
                <div class="space-y-6">
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
        </div>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
