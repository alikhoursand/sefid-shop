<div class="bg-base-100 shadow-md shadow-base-300 rounded-box px-4 pt-4 pb-4">

    <div class="lg:hidden">

        <div class="collapse collapse-arrow bg-base-100 border-base-300 border ">
            <input name="links-opener" type="checkbox" />
            <div class="collapse-title font-semibold after:top-10">

                <x-heroicon-m-user-circle class="inline size-10" />
                <div class="mt-2 font-semibold text-right inline">منوی حساب کاربری</div>

            </div>
            <div class="collapse-content text-sm">
                <div class="divider mt-0"></div>
                <div class="mt-4">
                    <div class="space-y-2">
                        <div>
                            <a href="{{ route('user.panel') }}"
                                class="{{ Route::currentRouteName() === 'user.panel' ? 'text-primary' : '' }} text-sm items-center justify-start flex p-2 gap-x-2">
                                <x-heroicon-m-rectangle-group class="size-6" />
                                <span class="">پیشخوان</span>
                            </a>
                        </div>
                        <div>
                            <a href="{{ route('user.profile.view') }}"
                                class="{{ str_contains(request()->path(), 'profile') ? 'text-primary' : '' }} text-sm items-center justify-start flex p-2 gap-x-2">
                                <x-heroicon-m-user class="size-6" />
                                <span class="">حساب کاربری</span>
                            </a>
                        </div>
                        <div>
                            <a href="{{ route('user.orders') }}"
                                class="{{ Route::currentRouteName() == 'user.orders' ? 'text-primary' : '' }} text-sm items-center justify-start flex p-2 gap-x-2">
                                <x-heroicon-m-list-bullet class="size-6" />
                                <span class="">سفارش‌ها</span>
                            </a>
                        </div>
                        <div>
                            <a href="{{ route('user.transactions') }}"
                                class="{{ Route::currentRouteName() == 'user.transactions' ? 'text-primary' : '' }} text-sm items-center justify-start flex p-2 gap-x-2">
                                <x-heroicon-s-banknotes class="size-6" />
                                <span class="">تراکنش‌ها</span>
                            </a>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="">
                        <a href="{{ route('logout') }}"
                            class="text-error text-sm items-center justify-start flex p-2 gap-x-2">
                            <x-heroicon-s-arrow-right-start-on-rectangle class="size-6" />
                            <span class="">خروج از حساب کاربری</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="hidden lg:block">

        <div class="flex gap-x-2 justify-start items-center">
            <x-heroicon-m-user-circle class="text-primary size-12" />
            <div class="font-medium text-base text-center">حساب کاربری من</div>
        </div>


        <div class="divider"></div>
        <div class="">
            <div class="space-y-2">
                <div>
                    <a href="{{ route('user.panel') }}"
                        class=" {{ Route::currentRouteName() == 'user.panel' ? 'text-primary' : 'text-base-content' }} hover:text-primary duration-200 text-sm items-center justify-start flex p-2 gap-x-2">
                        <x-heroicon-s-rectangle-group class="size-6" />
                        <span class="">پیشخوان</span>
                    </a>
                </div>
                <div>
                    <a href="{{ route('user.profile.view') }}"
                        class=" {{ str_contains(request()->path(), 'profile') ? 'text-primary' : 'text-base-content' }} hover:text-primary duration-200 text-sm items-center justify-start flex p-2 gap-x-2">
                        <x-heroicon-s-user class="size-6" />
                        <span class="">اطلاعات حساب کاربری</span>
                    </a>
                </div>
                <div>
                    <a href="{{ route('user.orders') }}"
                        class="{{ Route::currentRouteName() == 'user.orders' ? 'text-primary' : 'text-base-content' }} hover:text-primary duration-200 text-sm items-center justify-start flex p-2 gap-x-2">
                        <x-heroicon-m-list-bullet class="size-6" />
                        <span class="">سفارش‌ها</span>
                    </a>
                </div>
                <div>
                    <a href="{{ route('user.transactions') }}"
                        class="{{ Route::currentRouteName() === 'user.transactions' ? 'text-primary' : 'text-base-content' }} hover:text-primary duration-200 text-sm items-center justify-start flex p-2 gap-x-2">
                        <x-heroicon-s-banknotes class="size-6" />
                        <span class="">تراکنش‌ها</span>
                    </a>
                </div>
            </div>
            <div class="divider"></div>
            <div class="">
                <a href="{{ route('logout') }}" class="flex p-2 items-center gap-x-2 text-error text-sm">
                    <x-heroicon-s-arrow-right-start-on-rectangle class="size-6" />
                    <span class="">خروج از حساب کاربری</span>
                </a>
            </div>
        </div>

    </div>


</div>
