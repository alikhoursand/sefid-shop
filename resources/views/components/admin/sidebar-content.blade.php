<div class="h-full px-2 py-4 overflow-y-auto bg-base-100 w-64 space-y-1">
    <div class=" text-center">
        <x-heroicon-s-user-circle class="size-20 md:size-30 mx-auto mb-2 md:mb-4 opacity-75"/>
        <div class="flex items-center justify-center gap-x-2">
            <x-heroicon-s-cog-6-tooth class="size-6 animate-spin"/>
            <span class="md:text-2xl font-bold">
                پنل مدیریت
            </span>
        </div>
    </div>
    <div class="divider"></div>

    <div>
        <a href="{{ route('admin.panel') }}"
           class="btn btn-block justify-start {{ Route::currentRouteName() === 'admin.panel' ? 'btn-primary' : 'btn-ghost' }}">
            <x-heroicon-s-rectangle-group class="size-6"/>
            <span class="">پیشخوان</span>
        </a>
    </div>

    <div class="collapse collapse-arrow">
        <input type="checkbox" name="menu-drop_{{ $type }}" @checked(in_array(Route::currentRouteName(), [
                'admin.shop.product.index',
                'admin.shop.product.create',
                'admin.shop.category.index',
                'admin.shop.product.edit',
                'admin.shop.discount.index',
            ])) />
        <div class=" collapse-title btn btn-block justify-start btn-ghost">
            <x-heroicon-s-building-storefront class="size-6 @if (in_array(Route::currentRouteName(), [
                        'admin.shop.product.index',
                        'admin.shop.product.create',
                        'admin.shop.category.index',
                        'admin.shop.product.edit',
                        'admin.shop.discount.index',
                    ])) text-primary @endif"/>
            <span class="">فروشگاه</span>
        </div>
        <div class="collapse-content text-sm">
            <div class="space-y-1">
                <a href="{{ route('admin.shop.discount.index') }}"
                   class="{{ Route::currentRouteName() === 'admin.shop.discount.index' ? 'btn-primary' : 'btn-ghost' }} btn btn-block justify-start ">
                    <x-heroicon-s-percent-badge class="size-6"/>
                    <span class="">کد تخفیف</span>
                </a>
                <a href="{{ route('admin.shop.category.index') }}"
                   class="{{ Route::currentRouteName() === 'admin.shop.category.index' ? 'btn-primary' : 'btn-ghost' }} btn btn-block justify-start ">
                    <x-heroicon-s-squares-2x2 class="size-6"/>
                    <span>دسته بندی ها</span>
                </a>
                <a href="{{ route('admin.shop.product.index') }}"
                   class="{{ Route::currentRouteName() === 'admin.shop.product.index' ? 'btn-primary' : 'btn-ghost' }}  btn btn-block justify-start">
                    <x-heroicon-s-cube class="size-6"/>
                    <span>محصولات</span>
                </a>
            </div>

        </div>
    </div>

    @if (auth()->user()->hasAccess('superadmin'))
        <div class="collapse collapse-arrow">
            <input type="checkbox" name="menu-drop_{{ $type }}" @checked(in_array(Route::currentRouteName(),[
                'admin.user.list',
                'admin.user.admin.list',
            ]))
            />
            <div class=" collapse-title btn btn-block justify-start btn-ghost">
                <x-heroicon-s-user-group class="size-6 @if (in_array(Route::currentRouteName(), [
                    'admin.user.list',
                    'admin.user.admin.list',
                    ])) text-primary @endif"/>
                <span class="pr-2 ">کاربران</span>
            </div>
            <div class="collapse-content text-sm">
                <div class="space-y-1">
                    <a href="{{ route('admin.user.list') }}"
                       class="{{ Route::currentRouteName() === 'admin.user.list' ? 'btn-primary' : 'btn-ghost' }} btn btn-block justify-start">
                        <x-heroicon-s-user-group class="size-6"/>
                        <span>کاربران</span>
                    </a>
                    <a href="{{ route('admin.user.admin.list') }}"
                       class="{{ Route::currentRouteName() === 'admin.user.admin.list' ? 'btn-primary' : 'btn-ghost' }} btn btn-block justify-start">
                        <x-heroicon-s-users class="size-6"/>
                        <span>مدیران</span>
                    </a>
                </div>
            </div>
        </div>
    @endif

    <div>
        <a href="{{ route('admin.order.list') }}"
           class="{{ Route::currentRouteName() === 'admin.order.list' ? 'btn-primary' : 'btn-ghost' }} btn btn-block justify-start">
            <x-heroicon-s-list-bullet class="size-6"/>
            <span class="">سفارش‌ها</span>
        </a>
    </div>
    <div>
        <a href="{{ route('admin.transactions') }}"
           class="{{ Route::currentRouteName() === 'admin.transactions' ? 'btn-primary' : 'btn-ghost' }} btn btn-block justify-start">
            <x-heroicon-s-clipboard-document-list class="size-6"/>
            <span class="">تراکنش‌ها</span>
        </a>
    </div>
    <div>
        <a href="{{ route('admin.banners') }}"
           class="{{ Route::currentRouteName() === 'admin.banners' ? 'btn-primary' : 'btn-ghost' }} btn btn-block justify-start">
            <x-heroicon-s-photo class="size-6"/>
            <span class="">بنرها</span>
        </a>
    </div>
    <div>
        <a href="{{ route('admin.sliders') }}"
           class="{{ Route::currentRouteName() === 'admin.sliders' ? 'btn-primary' : 'btn-ghost' }} btn btn-block justify-start">
            <x-heroicon-s-photo class="size-6"/>
            <span class="">اسلایدرها</span>
        </a>
    </div>
    <div>
        <a href="{{ route('admin.settings') }}"
           class="{{ Route::currentRouteName() === 'admin.settings' ? 'btn-primary' : 'btn-ghost' }} btn btn-block justify-start">
            <x-heroicon-s-cog-8-tooth class="size-6"/>
            <span class="">تنظیمات</span>
        </a>
    </div>
    <div class="divider"></div>

    <div class="">
        <a href="{{ route('logout') }}" class="btn btn-error btn-soft btn-block justify-start">
            <x-heroicon-s-arrow-right-start-on-rectangle class="size-6"/>
            <span class="">خروج از حساب کاربری</span>
        </a>
    </div>
</div>
