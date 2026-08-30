<div class="drawer drawer-start z-20">
    <input id="menu-drawer" type="checkbox" class="drawer-toggle"/>
    <div class="drawer-content">
    </div>
    <div class="drawer-side z-20">
        <label for="menu-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
        <div class="w-full xs:w-sm bg-base-100 h-full relative">
            <div class="p-2 border-b-2 border-base-300 flex items-center justify-between">
                <a href="{{ route('home') }}"
                   class="text-primary text-lg sm:text-xl lg:text-3xl font-bold flex gap-x-2 items-center">
                    <img src="{{ asset('logo.png') }}" class="size-10 lg:size-12" alt="">
                    {{ config('app.site_name') }}
                </a>
                <label for="menu-drawer" class="btn btn-sm btn-circle btn-ghost">
                    <x-heroicon-o-x-mark class="size-6"/>
                </label>
            </div>

            <div class=" mt-2 p-2 text-lg">

                <div class="">
                    <a class="p-2 block space-x-1 hover:text-primary duration-200" href="{{ route('home') }}">
                        <x-heroicon-o-home class="inline size-6"/>
                        <span class="">صفحه اصلی</span>
                    </a>
                </div>
                <div class="divider my-2"></div>
                <div class="">
                    <a class="p-2 block space-x-1 hover:text-primary duration-200"
                       href="{{ route('shop.product.list') }}">
                        <x-heroicon-o-squares-2x2 class="inline size-6"/>
                        <span class="">محصولات</span>
                    </a>
                </div>
                <div class="divider my-2"></div>
                <div class="">
                    <a class="p-2 block space-x-1 hover:text-primary duration-200" href="{{ route('shop.offers') }}">
                        <x-heroicon-o-percent-badge class="inline size-6"/>
                        <span class="">فروش ویژه</span>
                    </a>
                </div>

            </div>
            <div class="bottom-0 absolute w-full space-y-2">
                @if (auth()->check() && auth()->user()->hasRole('admin'))
                    <a href="{{ route('admin.panel') }}"
                       class="block p-4 bg-primary group text-primary-content w-full text-xl">
                        <x-heroicon-s-user class="inline size-6"/>
                        <span class="group-hover:mr-2 duration-200">پنل مدیریت</span>
                    </a>
                @endif
                <a href="{{ auth()->check() ? route('user.panel') : route('login') }}"
                   class="block p-4 bg-primary group text-primary-content w-full text-xl">
                    <x-heroicon-s-user class="inline size-6"/>
                    <span
                        class="group-hover:mr-2 duration-200">{{ auth()->check() ? 'حساب کاربری' : 'ورود - ثبت نام' }}</span>
                </a>
            </div>
        </div>
    </div>
</div>
