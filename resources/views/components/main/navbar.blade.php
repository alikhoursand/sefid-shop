<div class="bg-base-100 shadow-md shadow-base-300 sticky top-0 z-5 p-2">
    <div class="flex justify-between items-center gap-y-6 flex-wrap h-full max-w-screen-xl mx-auto">
        <div class="flex gap-4 justify-start items-center h-full ">
            <label for="menu-drawer" class="block sm:hidden">
                <div class="dropdown">
                    <div tabindex="0" role="button" class="btn btn-square btn-ghost flex">
                        <x-heroicon-s-bars-3 class="size-6" />
                    </div>
                </div>
            </label>
            <a href="{{ route('home') }}"
                class="text-primary text-lg sm:text-xl lg:text-3xl font-bold flex gap-x-2 items-center">
                <img src="{{ asset('logo.png') }}" class="size-10 lg:size-12" alt="">
                <span>{{ config('app.site_name') }}</span>
            </a>
        </div>
        <div class="flex gap-2 justify-end items-center h-full">
            @if (auth()->check() && auth()->user()->hasRole('admin'))
                <a href="{{ route('admin.panel') }}" class="btn btn-secondary btn-soft hidden lg:flex">
                    <x-heroicon-s-user class="size-6" />
                    <span class="">
                        پنل مدیریت
                    </span>
                </a>
            @endif

            <a href="{{ auth()->check() ? route('user.panel') : route('login') }}"
                class="btn btn-secondary btn-soft btn-square lg:w-auto lg:px-4">
                <x-heroicon-s-user class="size-6" />
                <span class="lg:block hidden">
                    {{ auth()->check() ? 'حساب کاربری' : 'ورود - ثبت نام' }}
                </span>
            </a>

            <label for="cart-drawer" id="drawer-handle"
                class="btn mr-2 btn-primary btn-soft btn-square relative sm:flex">
                <div
                    class="bg-primary text-primary-content size-5 rounded-full text-xs absolute -top-1 -right-2 flex items-center justify-center">
                    {{ count($cart) }}
                </div>
                <x-heroicon-s-shopping-bag class="size-6" />
            </label>
        </div>
        <div class="sm:flex basis-full hidden gap-4 items-center h-full ">
            <div>
                <a class="{{ Route::currentRouteName() === 'home' ? 'border-b-2 border-primary text-primary' : 'opacity-75 hover:opacity-100 hover:text-primary' }} space-x-1 pb-1 transition-all duration-100 font-medium"
                    href="{{ route('home') }}">
                    <x-heroicon-o-home class="inline size-5"/>
                    <span class="">صفحه اصلی</span>
                </a>
            </div>
            <div>
                <a class="{{ Route::currentRouteName() === 'shop.product.list' ? 'border-b-2 border-primary text-primary' : 'opacity-75 hover:opacity-100 hover:text-primary' }} space-x-1 pb-1 hover:text-primary transition-all duration-100 opacity-75 font-medium hover:opacity-100"
                    href="{{ route('shop.product.list') }}">
                    <x-heroicon-o-squares-2x2 class="inline size-5"/>
                    <span class="">محصولات</span>
                </a>
            </div>
        </div>
    </div>
</div>

@include('components.main.cart-drawer')
@include('components.main.menu-drawer')
