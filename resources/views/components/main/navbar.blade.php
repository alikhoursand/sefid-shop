<div class="bg-base-100 shadow-md shadow-base-300 sticky top-0 z-5 p-2">
    <div class="flex justify-between items-center gap-y-6 flex-wrap h-full max-w-screen-xl mx-auto">
        <div class="flex gap-4 justify-start items-center h-full ">
            <label for="menu-drawer" class="block sm:hidden">
                <div class="dropdown">
                    <div tabindex="0" role="button" class="btn btn-square btn-ghost flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
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
                    <svg class="size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none">
                        <g clip-path="url(#clip0_3111_327422s)">
                            <path
                                d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M3.41016 22C3.41016 18.13 7.26015 15 12.0002 15C12.9602 15 13.8902 15.13 14.7602 15.37"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M22 18C22 18.75 21.79 19.46 21.42 20.06C21.21 20.42 20.94 20.74 20.63 21C19.93 21.63 19.01 22 18 22C16.54 22 15.27 21.22 14.58 20.06C14.21 19.46 14 18.75 14 18C14 16.74 14.58 15.61 15.5 14.88C16.19 14.33 17.06 14 18 14C20.21 14 22 15.79 22 18Z"
                                stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M16.4399 17.9995L17.4299 18.9895L19.5599 17.0195" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </g>
                        <defs>
                            <clipPath id="clip0_3111_327422s">
                                <rect width="24" height="24" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                    <span class="">
                        پنل مدیریت
                    </span>
                </a>
            @endif

            <a href="{{ auth()->check() ? route('user.panel') : route('login') }}"
                class="btn btn-secondary btn-soft btn-square lg:w-auto lg:px-4">
                <svg class="size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none">
                    <g clip-path="url(#clip0_3111_32739)">
                        <path
                            d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M20.5901 22C20.5901 18.13 16.7402 15 12.0002 15C7.26015 15 3.41016 18.13 3.41016 22"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </g>
                    <defs>
                        <clipPath id="clip0_3111_32739">
                            <rect width="24" height="24" fill="currentColor" />
                        </clipPath>
                    </defs>
                </svg>
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
                <svg class="size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none">
                    <g clip-path="url(#clip0_4418_9661)">
                        <path
                            d="M8.40002 6.5H15.6C19 6.5 19.34 8.09 19.57 10.03L20.47 17.53C20.76 19.99 20 22 16.5 22H7.51003C4.00003 22 3.24002 19.99 3.54002 17.53L4.44003 10.03C4.66003 8.09 5.00002 6.5 8.40002 6.5Z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M8 8V4.5C8 3 9 2 10.5 2H13.5C15 2 16 3 16 4.5V8" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M20.41 17.0293H8" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </g>
                    <defs>
                        <clipPath id="clip0_4418_9661">
                            <rect width="24" height="24" fill="currentColor" />
                        </clipPath>
                    </defs>
                </svg>
            </label>
        </div>
        <div class="sm:flex basis-full hidden gap-4 items-center h-full ">
            <div>
                <a class="{{ Route::currentRouteName() == 'home' ? 'border-b-2 border-primary text-primary' : 'opacity-75 hover:opacity-100 hover:text-primary' }} space-x-1 pb-1 transition-all duration-100 font-medium"
                    href="{{ route('home') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline size-5" width="24" height="24"
                        viewBox="0 0 24 24" fill="none">
                        <g clip-path="url(#clip0_4418_9816)">
                            <path
                                d="M9.02 2.84016L3.63 7.04016C2.73 7.74016 2 9.23016 2 10.3602V17.7702C2 20.0902 3.89 21.9902 6.21 21.9902H17.79C20.11 21.9902 22 20.0902 22 17.7802V10.5002C22 9.29016 21.19 7.74016 20.2 7.05016L14.02 2.72016C12.62 1.74016 10.37 1.79016 9.02 2.84016Z"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M12 17.9902V14.9902" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </g>
                        <defs>
                            <clipPath id="clip0_4418_9816">
                                <rect width="24" height="24" fill="currentColor" />
                            </clipPath>
                        </defs>
                    </svg>
                    <span class="">صفحه اصلی</span>
                </a>
            </div>
            <div>
                <a class="{{ Route::currentRouteName() == 'shop.product.list' ? 'border-b-2 border-primary text-primary' : 'opacity-75 hover:opacity-100 hover:text-primary' }} space-x-1 pb-1 hover:text-primary transition-all duration-100 opacity-75 font-medium hover:opacity-100"
                    href="{{ route('shop.product.list') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline size-5" width="24" height="24"
                        viewBox="0 0 24 24" fill="none">
                        <g clip-path="url(#clip0_4418_9941123)">
                            <path d="M17 10H19C21 10 22 9 22 7V5C22 3 21 2 19 2H17C15 2 14 3 14 5V7C14 9 15 10 17 10Z"
                                stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M5 22H7C9 22 10 21 10 19V17C10 15 9 14 7 14H5C3 14 2 15 2 17V19C2 21 3 22 5 22Z"
                                stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M6 10C8.20914 10 10 8.20914 10 6C10 3.79086 8.20914 2 6 2C3.79086 2 2 3.79086 2 6C2 8.20914 3.79086 10 6 10Z"
                                stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M18 22C20.2091 22 22 20.2091 22 18C22 15.7909 20.2091 14 18 14C15.7909 14 14 15.7909 14 18C14 20.2091 15.7909 22 18 22Z"
                                stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </g>
                        <defs>
                            <clipPath id="clip0_4418_9941123">
                                <rect width="24" height="24" fill="currentColor" />
                            </clipPath>
                        </defs>
                    </svg>
                    <span class="">محصولات</span>
                </a>
            </div>
        </div>
    </div>
</div>

@include('components.main.search-modal')
@include('components.main.cart-drawer')
@include('components.main.menu-drawer')
