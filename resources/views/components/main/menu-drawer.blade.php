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
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                    </svg>
                </label>
            </div>

            <div class=" mt-2 p-2 text-lg">

                <div class="">
                    <a class="p-2 block space-x-1 hover:text-primary duration-200" href="{{ route('home') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="inline size-6" width="24" height="24"
                             viewBox="0 0 24 24" fill="none">
                            <g clip-path="url(#clip0_4418_9816)">
                                <path
                                    d="M9.02 2.84016L3.63 7.04016C2.73 7.74016 2 9.23016 2 10.3602V17.7702C2 20.0902 3.89 21.9902 6.21 21.9902H17.79C20.11 21.9902 22 20.0902 22 17.7802V10.5002C22 9.29016 21.19 7.74016 20.2 7.05016L14.02 2.72016C12.62 1.74016 10.37 1.79016 9.02 2.84016Z"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"/>
                                <path d="M12 17.9902V14.9902" stroke="currentColor" stroke-width="2"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_4418_9816">
                                    <rect width="24" height="24" fill="currentColor"/>
                                </clipPath>
                            </defs>
                        </svg>
                        <span class="">صفحه اصلی</span>
                    </a>
                </div>
                <div class="divider my-2"></div>
                <div class="">
                    <a class="p-2 block space-x-1 hover:text-primary duration-200" href="{{ route('shop.product.list') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="inline size-6" width="24" height="24"
                             viewBox="0 0 24 24" fill="none">
                            <g clip-path="url(#clip0_4418_99411230)">
                                <path
                                    d="M17 10H19C21 10 22 9 22 7V5C22 3 21 2 19 2H17C15 2 14 3 14 5V7C14 9 15 10 17 10Z"
                                    stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round"/>
                                <path
                                    d="M5 22H7C9 22 10 21 10 19V17C10 15 9 14 7 14H5C3 14 2 15 2 17V19C2 21 3 22 5 22Z"
                                    stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round"/>
                                <path
                                    d="M6 10C8.20914 10 10 8.20914 10 6C10 3.79086 8.20914 2 6 2C3.79086 2 2 3.79086 2 6C2 8.20914 3.79086 10 6 10Z"
                                    stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round"/>
                                <path
                                    d="M18 22C20.2091 22 22 20.2091 22 18C22 15.7909 20.2091 14 18 14C15.7909 14 14 15.7909 14 18C14 20.2091 15.7909 22 18 22Z"
                                    stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_4418_99411230">
                                    <rect width="24" height="24" fill="currentColor"/>
                                </clipPath>
                            </defs>
                        </svg>
                        <span class="">محصولات</span>
                    </a>
                </div>
                <div class="divider my-2"></div>
                <div class="">
                    <a class="p-2 block space-x-1 hover:text-primary duration-200" href="{{ route('shop.offers') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="inline size-6" width="24" height="24"
                             viewBox="0 0 24 24" fill="none">
                            <g clip-path="url(#clip0_4418_169804offw)">
                                <path d="M9 2H15C20 2 22 4 22 9V15C22 20 20 22 15 22H9C4 22 2 20 2 15V9C2 4 4 2 9 2Z"
                                      stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                                <path d="M8.57007 15.2704L15.11 8.73047" stroke="currentColor" stroke-width="1.5"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                                <path
                                    d="M8.98001 10.3701C9.65932 10.3701 10.21 9.81948 10.21 9.14017C10.21 8.46086 9.65932 7.91016 8.98001 7.91016C8.3007 7.91016 7.75 8.46086 7.75 9.14017C7.75 9.81948 8.3007 10.3701 8.98001 10.3701Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"/>
                                <path
                                    d="M15.52 16.0899C16.1993 16.0899 16.75 15.5392 16.75 14.8599C16.75 14.1806 16.1993 13.6299 15.52 13.6299C14.8407 13.6299 14.29 14.1806 14.29 14.8599C14.29 15.5392 14.8407 16.0899 15.52 16.0899Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_4418_169804offw">
                                    <rect width="24" height="24" fill="currentColor"/>
                                </clipPath>
                            </defs>
                        </svg>
                        <span class="">فروش ویژه</span>
                    </a>
                </div>

            </div>
            <div class="bottom-0 absolute w-full space-y-2">
                @if (auth()->check() && auth()->user()->hasRole('admin'))
                    <a href="{{ route('admin.panel') }}"
                       class="block p-4 bg-primary group text-primary-content w-full text-xl">
                        <svg class="inline size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24" fill="none">
                            <g clip-path="url(#clip0_3111_327422sw)">
                                <path
                                    d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"/>
                                <path
                                    d="M3.41016 22C3.41016 18.13 7.26015 15 12.0002 15C12.9602 15 13.8902 15.13 14.7602 15.37"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"/>
                                <path
                                    d="M22 18C22 18.75 21.79 19.46 21.42 20.06C21.21 20.42 20.94 20.74 20.63 21C19.93 21.63 19.01 22 18 22C16.54 22 15.27 21.22 14.58 20.06C14.21 19.46 14 18.75 14 18C14 16.74 14.58 15.61 15.5 14.88C16.19 14.33 17.06 14 18 14C20.21 14 22 15.79 22 18Z"
                                    stroke="currentColor" stroke-width="2" stroke-miterlimit="10"
                                    stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M16.4399 17.9995L17.4299 18.9895L19.5599 17.0195" stroke="currentColor"
                                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_3111_327422sw">
                                    <rect width="24" height="24" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                        <span class="group-hover:mr-2 duration-200">پنل مدیریت</span>
                    </a>
                @endif
                <a href="{{ auth()->check() ? route('user.panel') : route('login') }}"
                   class="block p-4 bg-primary group text-primary-content w-full text-xl">
                    <svg class="inline size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none">
                        <g clip-path="url(#clip0_3111_32739)">
                            <path
                                d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"/>
                            <path
                                d="M20.5901 22C20.5901 18.13 16.7402 15 12.0002 15C7.26015 15 3.41016 18.13 3.41016 22"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_3111_32739">
                                <rect width="24" height="24" fill="currentColor"/>
                            </clipPath>
                        </defs>
                    </svg>
                    <span
                        class="group-hover:mr-2 duration-200">{{ auth()->check() ? 'حساب کاربری' : 'ورود - ثبت نام' }}</span>
                </a>
            </div>
        </div>
    </div>
</div>
