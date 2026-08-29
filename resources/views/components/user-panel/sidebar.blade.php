<div class="bg-base-100 shadow-md shadow-base-300 rounded-box px-4 pt-4 pb-4">

    <div class="lg:hidden">

        <div class="collapse collapse-arrow bg-base-100 border-base-300 border ">
            <input name="links-opener" type="checkbox" />
            <div class="collapse-title font-semibold after:top-2">

                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    class="inline size-10">
                    <g clip-path="url(#clip0_3111_32676prfw1)">
                        <path opacity="0.4"
                            d="M12 22.0098C17.5228 22.0098 22 17.5326 22 12.0098C22 6.48692 17.5228 2.00977 12 2.00977C6.47715 2.00977 2 6.48692 2 12.0098C2 17.5326 6.47715 22.0098 12 22.0098Z"
                            fill="currentColor" />
                        <path
                            d="M12 6.94043C9.93 6.94043 8.25 8.62043 8.25 10.6904C8.25 12.7204 9.84 14.3704 11.95 14.4304C11.98 14.4304 12.02 14.4304 12.04 14.4304C12.06 14.4304 12.09 14.4304 12.11 14.4304C12.12 14.4304 12.13 14.4304 12.13 14.4304C14.15 14.3604 15.74 12.7204 15.75 10.6904C15.75 8.62043 14.07 6.94043 12 6.94043Z"
                            fill="currentColor" />
                        <path
                            d="M18.78 19.3602C17 21.0002 14.62 22.0102 12 22.0102C9.37997 22.0102 6.99997 21.0002 5.21997 19.3602C5.45997 18.4502 6.10997 17.6202 7.05997 16.9802C9.78997 15.1602 14.23 15.1602 16.94 16.9802C17.9 17.6202 18.54 18.4502 18.78 19.3602Z"
                            fill="currentColor" />
                    </g>
                    <defs>
                        <clipPath id="clip0_3111_32676prfw1">
                            <rect width="24" height="24" fill="currentColor" />
                        </clipPath>
                    </defs>
                </svg>
                <div class="mt-2 font-semibold text-right inline">منوی حساب کاربری</div>

            </div>
            <div class="collapse-content text-sm border-t-2 border-base-content/10">
                <div class="mt-4">
                    <div class="space-y-2">
                        <div>
                            <a href="{{ route('user.panel') }}"
                                class=" {{ Route::currentRouteName() === 'dashboard' ? 'btn-primary' : 'text-base-content' }} text-sm items-center justify-start flex p-2 gap-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" class="size-6">
                                    <g clip-path="url(#clip0_4418_4761)">
                                        <path
                                            d="M11 19.9V4.1C11 2.6 10.36 2 8.77 2H4.73C3.14 2 2.5 2.6 2.5 4.1V19.9C2.5 21.4 3.14 22 4.73 22H8.77C10.36 22 11 21.4 11 19.9Z"
                                            fill="currentColor" />
                                        <path opacity="0.4"
                                            d="M21.5 19.64V15.36C21.5 14.06 20.5 13 19.27 13H15.23C14 13 13 14.06 13 15.36V19.64C13 20.94 14 22 15.23 22H19.27C20.5 22 21.5 20.94 21.5 19.64Z"
                                            fill="currentColor" />
                                        <path opacity="0.4"
                                            d="M21.5 8.64V4.36C21.5 3.06 20.5 2 19.27 2H15.23C14 2 13 3.06 13 4.36V8.64C13 9.94 14 11 15.23 11H19.27C20.5 11 21.5 9.94 21.5 8.64Z"
                                            fill="currentColor" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_4418_4761">
                                            <rect width="24" height="24" fill="currentColor" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                <span class="">پیشخوان</span>
                            </a>
                        </div>
                        <div>
                            <a href="{{ route('user.profile.view') }}"
                                class=" {{ str_contains(request()->path(), 'profile') ? 'btn-primary' : 'text-base-content' }} text-sm items-center justify-start flex p-2 gap-x-2">

                                <svg class="size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="#fff">
                                    <g clip-path="url(#clip0_4418_5195swvfg)">
                                        <path opacity="0.4"
                                            d="M18 3H6C3.79 3 2 4.78 2 6.97V17.03C2 19.22 3.79 21 6 21H18C20.21 21 22 19.22 22 17.03V6.97C22 4.78 20.21 3 18 3Z"
                                            fill="currentColor" />
                                        <path
                                            d="M19 8.75H14C13.59 8.75 13.25 8.41 13.25 8C13.25 7.59 13.59 7.25 14 7.25H19C19.41 7.25 19.75 7.59 19.75 8C19.75 8.41 19.41 8.75 19 8.75Z"
                                            fill="currentColor" />
                                        <path
                                            d="M19 12.75H15C14.59 12.75 14.25 12.41 14.25 12C14.25 11.59 14.59 11.25 15 11.25H19C19.41 11.25 19.75 11.59 19.75 12C19.75 12.41 19.41 12.75 19 12.75Z"
                                            fill="currentColor" />
                                        <path
                                            d="M19 16.75H17C16.59 16.75 16.25 16.41 16.25 16C16.25 15.59 16.59 15.25 17 15.25H19C19.41 15.25 19.75 15.59 19.75 16C19.75 16.41 19.41 16.75 19 16.75Z"
                                            fill="currentColor" />
                                        <path
                                            d="M8.49994 11.7899C9.77572 11.7899 10.8099 10.7557 10.8099 9.47992C10.8099 8.20414 9.77572 7.16992 8.49994 7.16992C7.22416 7.16992 6.18994 8.20414 6.18994 9.47992C6.18994 10.7557 7.22416 11.7899 8.49994 11.7899Z"
                                            fill="currentColor" />
                                        <path
                                            d="M9.30003 13.1098C8.77003 13.0598 8.22003 13.0598 7.69003 13.1098C6.01003 13.2698 4.66003 14.5998 4.50003 16.2798C4.49003 16.4198 4.53003 16.5598 4.63003 16.6598C4.73003 16.7598 4.86003 16.8298 5.00003 16.8298H12C12.14 16.8298 12.28 16.7698 12.37 16.6698C12.46 16.5698 12.51 16.4298 12.5 16.2898C12.33 14.5998 10.99 13.2698 9.30003 13.1098Z"
                                            fill="currentColor" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_4418_5195swvfg">
                                            <rect width="24" height="24" fill="currentColor" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                <span class="">حساب کاربری</span>
                            </a>
                        </div>
                        <div>
                            <a href="{{ route('user.messages') }}"
                                class="{{ str_contains(request()->path(), 'messages') ? 'btn-primary' : 'text-base-content' }} text-sm items-center justify-start flex p-2 gap-x-2">

                                <svg class="size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <g clip-path="url(#clip0_4418_4530)">
                                        <path opacity="0.4"
                                            d="M16 2H8C4 2 2 4 2 8V21C2 21.55 2.45 22 3 22H16C20 22 22 20 22 16V8C22 4 20 2 16 2Z"
                                            fill="currentColor" />
                                        <path
                                            d="M17 8.75H7C6.59 8.75 6.25 9.09 6.25 9.5C6.25 9.91 6.59 10.25 7 10.25H17C17.41 10.25 17.75 9.91 17.75 9.5C17.75 9.09 17.41 8.75 17 8.75Z"
                                            fill="currentColor" />
                                        <path
                                            d="M14 13.75H7C6.59 13.75 6.25 14.09 6.25 14.5C6.25 14.91 6.59 15.25 7 15.25H14C14.41 15.25 14.75 14.91 14.75 14.5C14.75 14.09 14.41 13.75 14 13.75Z"
                                            fill="currentColor" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_4418_4530">
                                            <rect width="24" height="24" fill="currentColor" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                <span class="">پیام‌ها</span>
                            </a>
                        </div>
                        <div>
                            <a href="{{ route('user.orders') }}"
                                class="{{ Route::currentRouteName() == 'user.orders' ? 'btn-primary' : 'text-base-content' }} text-sm items-center justify-start flex p-2 gap-x-2">
                                <svg class="size-6" xmlns="http://www.w3.org/2000/svg" width="20" height="21"
                                    viewBox="0 0 20 21">
                                    <g clip-path="url(#clip0_4418_4813ords)">
                                        <path opacity="0.4"
                                            d="M14.19 0.970703H5.81C2.17 0.970703 0 3.1407 0 6.7807V15.1607C0 18.8007 2.17 20.9707 5.81 20.9707H14.19C17.83 20.9707 20 18.8007 20 15.1607V6.7807C20 3.1407 17.83 0.970703 14.19 0.970703Z"
                                            fill="currentColor" />
                                        <path
                                            d="M16.3101 7.83984C16.3101 8.24984 15.9801 8.58984 15.5601 8.58984H10.3101C9.90006 8.58984 9.56006 8.24984 9.56006 7.83984C9.56006 7.42984 9.90006 7.08984 10.3101 7.08984H15.5601C15.9801 7.08984 16.3101 7.42984 16.3101 7.83984Z"
                                            fill="currentColor" />
                                        <path
                                            d="M7.97006 6.87125L5.72006 9.12125C5.57006 9.27125 5.38006 9.34125 5.19006 9.34125C5.00006 9.34125 4.80006 9.27125 4.66006 9.12125L3.91006 8.37125C3.61006 8.08125 3.61006 7.60125 3.91006 7.31125C4.20006 7.02125 4.67006 7.02125 4.97006 7.31125L5.19006 7.53125L6.91006 5.81125C7.20006 5.52125 7.67006 5.52125 7.97006 5.81125C8.26006 6.10125 8.26006 6.58125 7.97006 6.87125Z"
                                            fill="currentColor" />
                                        <path
                                            d="M16.3101 14.8398C16.3101 15.2498 15.9801 15.5898 15.5601 15.5898H10.3101C9.90006 15.5898 9.56006 15.2498 9.56006 14.8398C9.56006 14.4298 9.90006 14.0898 10.3101 14.0898H15.5601C15.9801 14.0898 16.3101 14.4298 16.3101 14.8398Z"
                                            fill="currentColor" />
                                        <path
                                            d="M7.97006 13.8712L5.72006 16.1213C5.57006 16.2713 5.38006 16.3412 5.19006 16.3412C5.00006 16.3412 4.80006 16.2713 4.66006 16.1213L3.91006 15.3713C3.61006 15.0813 3.61006 14.6012 3.91006 14.3112C4.20006 14.0213 4.67006 14.0213 4.97006 14.3112L5.19006 14.5312L6.91006 12.8113C7.20006 12.5213 7.67006 12.5213 7.97006 12.8113C8.26006 13.1012 8.26006 13.5812 7.97006 13.8712Z"
                                            fill="currentColor" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_4418_4813ords">
                                            <rect width="20" height="20" fill="currentColor"
                                                transform="translate(0 0.970703)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                <span class="">سفارش‌ها</span>
                            </a>
                        </div>
                        <div>
                            <a href="{{ route('user.transactions') }}"
                                class="{{ Route::currentRouteName() == 'user.transactions' ? 'btn-primary' : 'text-base-content' }} text-sm items-center justify-start flex p-2 gap-x-2">

                                <svg class="size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <g clip-path="url(#clip0_4418_169775swbvrg)">
                                        <path opacity="0.4"
                                            d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.82 22 21.99 19.83 21.99 16.19V7.81C22 4.17 19.83 2 16.19 2Z"
                                            fill="currentColor" />
                                        <path
                                            d="M14.2602 12L12.7502 11.47V8.08H13.1102C13.9202 8.08 14.5802 8.79 14.5802 9.66C14.5802 10.07 14.9202 10.41 15.3302 10.41C15.7402 10.41 16.0802 10.07 16.0802 9.66C16.0802 7.96 14.7502 6.58 13.1102 6.58H12.7502V6C12.7502 5.59 12.4102 5.25 12.0002 5.25C11.5902 5.25 11.2502 5.59 11.2502 6V6.58H10.6002C9.12016 6.58 7.91016 7.83 7.91016 9.36C7.91016 11.15 8.95016 11.72 9.74016 12L11.2502 12.53V15.91H10.8902C10.0802 15.91 9.42016 15.2 9.42016 14.33C9.42016 13.92 9.08016 13.58 8.67016 13.58C8.26016 13.58 7.92016 13.92 7.92016 14.33C7.92016 16.03 9.25016 17.41 10.8902 17.41H11.2502V18C11.2502 18.41 11.5902 18.75 12.0002 18.75C12.4102 18.75 12.7502 18.41 12.7502 18V17.42H13.4002C14.8802 17.42 16.0902 16.17 16.0902 14.64C16.0802 12.84 15.0402 12.27 14.2602 12ZM10.2402 10.59C9.73016 10.41 9.42016 10.24 9.42016 9.37C9.42016 8.66 9.95016 8.09 10.6102 8.09H11.2602V10.95L10.2402 10.59ZM13.4002 15.92H12.7502V13.06L13.7602 13.41C14.2702 13.59 14.5802 13.76 14.5802 14.63C14.5802 15.34 14.0502 15.92 13.4002 15.92Z"
                                            fill="currentColor" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_4418_169775swbvrg">
                                            <rect width="24" height="24" fill="currentColor" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                <span class="">تراکنش‌ها</span>
                            </a>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="">
                        <a href="{{ route('logout') }}" class="btn btn-error btn-soft btn-block justify-start">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" class="size-6">
                                <path opacity="0.4"
                                    d="M9 7.2V16.79C9 20 11 22 14.2 22H16.79C19.99 22 21.99 20 21.99 16.8V7.2C22 4 20 2 16.8 2H14.2C11 2 9 4 9 7.2Z"
                                    fill="currentColor" />
                                <path
                                    d="M5.57 8.11953L2.22 11.4695C1.93 11.7595 1.93 12.2395 2.22 12.5295L5.57 15.8795C5.86 16.1695 6.34 16.1695 6.63 15.8795C6.92 15.5895 6.92 15.1095 6.63 14.8195L4.56 12.7495H15.25C15.66 12.7495 16 12.4095 16 11.9995C16 11.5895 15.66 11.2495 15.25 11.2495H4.56L6.63 9.17953C6.78 9.02953 6.85 8.83953 6.85 8.64953C6.85 8.45953 6.78 8.25953 6.63 8.11953C6.34 7.81953 5.87 7.81953 5.57 8.11953Z"
                                    fill="currentColor" />
                            </svg>


                            <span class="">خروج از حساب کاربری</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="hidden lg:block">

        <div class="flex gap-x-2 justify-start items-center">
            <svg class="size-12 text-primary/70" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24">
                <g clip-path="url(#clip0_3111_32676prfw)">
                    <path opacity="0.4"
                        d="M12 22.0098C17.5228 22.0098 22 17.5326 22 12.0098C22 6.48692 17.5228 2.00977 12 2.00977C6.47715 2.00977 2 6.48692 2 12.0098C2 17.5326 6.47715 22.0098 12 22.0098Z"
                        fill="currentColor" />
                    <path
                        d="M12 6.94043C9.93 6.94043 8.25 8.62043 8.25 10.6904C8.25 12.7204 9.84 14.3704 11.95 14.4304C11.98 14.4304 12.02 14.4304 12.04 14.4304C12.06 14.4304 12.09 14.4304 12.11 14.4304C12.12 14.4304 12.13 14.4304 12.13 14.4304C14.15 14.3604 15.74 12.7204 15.75 10.6904C15.75 8.62043 14.07 6.94043 12 6.94043Z"
                        fill="currentColor" />
                    <path
                        d="M18.78 19.3602C17 21.0002 14.62 22.0102 12 22.0102C9.37997 22.0102 6.99997 21.0002 5.21997 19.3602C5.45997 18.4502 6.10997 17.6202 7.05997 16.9802C9.78997 15.1602 14.23 15.1602 16.94 16.9802C17.9 17.6202 18.54 18.4502 18.78 19.3602Z"
                        fill="currentColor" />
                </g>
                <defs>
                    <clipPath id="clip0_3111_32676prfw">
                        <rect width="24" height="24" fill="currentColor" />
                    </clipPath>
                </defs>
            </svg>
            <div class="font-medium text-base text-center">حساب کاربری من</div>
        </div>


        <div class="divider"></div>
        <div class="">
            <div class="space-y-2">
                <div>
                    <a href="{{ route('user.panel') }}"
                        class=" {{ Route::currentRouteName() == 'user.panel' ? 'text-primary' : 'text-base-content' }} hover:text-primary duration-200 text-sm items-center justify-start flex p-2 gap-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            class="size-6">
                            <g clip-path="url(#clip0_4418_4761)">
                                <path
                                    d="M11 19.9V4.1C11 2.6 10.36 2 8.77 2H4.73C3.14 2 2.5 2.6 2.5 4.1V19.9C2.5 21.4 3.14 22 4.73 22H8.77C10.36 22 11 21.4 11 19.9Z"
                                    fill="currentColor" />
                                <path opacity="0.4"
                                    d="M21.5 19.64V15.36C21.5 14.06 20.5 13 19.27 13H15.23C14 13 13 14.06 13 15.36V19.64C13 20.94 14 22 15.23 22H19.27C20.5 22 21.5 20.94 21.5 19.64Z"
                                    fill="currentColor" />
                                <path opacity="0.4"
                                    d="M21.5 8.64V4.36C21.5 3.06 20.5 2 19.27 2H15.23C14 2 13 3.06 13 4.36V8.64C13 9.94 14 11 15.23 11H19.27C20.5 11 21.5 9.94 21.5 8.64Z"
                                    fill="currentColor" />
                            </g>
                            <defs>
                                <clipPath id="clip0_4418_4761">
                                    <rect width="24" height="24" fill="currentColor" />
                                </clipPath>
                            </defs>
                        </svg>
                        <span class="">پیشخوان</span>
                    </a>
                </div>
                <div>
                    <a href="{{ route('user.profile.view') }}"
                        class=" {{ str_contains(request()->path(), 'profile') ? 'text-primary' : 'text-base-content' }} hover:text-primary duration-200 text-sm items-center justify-start flex p-2 gap-x-2">

                        <svg class="size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="#fff">
                            <g clip-path="url(#clip0_4418_5195swvfg)">
                                <path opacity="0.4"
                                    d="M18 3H6C3.79 3 2 4.78 2 6.97V17.03C2 19.22 3.79 21 6 21H18C20.21 21 22 19.22 22 17.03V6.97C22 4.78 20.21 3 18 3Z"
                                    fill="currentColor" />
                                <path
                                    d="M19 8.75H14C13.59 8.75 13.25 8.41 13.25 8C13.25 7.59 13.59 7.25 14 7.25H19C19.41 7.25 19.75 7.59 19.75 8C19.75 8.41 19.41 8.75 19 8.75Z"
                                    fill="currentColor" />
                                <path
                                    d="M19 12.75H15C14.59 12.75 14.25 12.41 14.25 12C14.25 11.59 14.59 11.25 15 11.25H19C19.41 11.25 19.75 11.59 19.75 12C19.75 12.41 19.41 12.75 19 12.75Z"
                                    fill="currentColor" />
                                <path
                                    d="M19 16.75H17C16.59 16.75 16.25 16.41 16.25 16C16.25 15.59 16.59 15.25 17 15.25H19C19.41 15.25 19.75 15.59 19.75 16C19.75 16.41 19.41 16.75 19 16.75Z"
                                    fill="currentColor" />
                                <path
                                    d="M8.49994 11.7899C9.77572 11.7899 10.8099 10.7557 10.8099 9.47992C10.8099 8.20414 9.77572 7.16992 8.49994 7.16992C7.22416 7.16992 6.18994 8.20414 6.18994 9.47992C6.18994 10.7557 7.22416 11.7899 8.49994 11.7899Z"
                                    fill="currentColor" />
                                <path
                                    d="M9.30003 13.1098C8.77003 13.0598 8.22003 13.0598 7.69003 13.1098C6.01003 13.2698 4.66003 14.5998 4.50003 16.2798C4.49003 16.4198 4.53003 16.5598 4.63003 16.6598C4.73003 16.7598 4.86003 16.8298 5.00003 16.8298H12C12.14 16.8298 12.28 16.7698 12.37 16.6698C12.46 16.5698 12.51 16.4298 12.5 16.2898C12.33 14.5998 10.99 13.2698 9.30003 13.1098Z"
                                    fill="currentColor" />
                            </g>
                            <defs>
                                <clipPath id="clip0_4418_5195swvfg">
                                    <rect width="24" height="24" fill="currentColor" />
                                </clipPath>
                            </defs>
                        </svg>
                        <span class="">اطلاعات حساب کاربری</span>
                    </a>
                </div>
                <div>
                    <a href="{{ route('user.messages') }}"
                        class="{{ str_contains(request()->path(), 'messages') ? 'text-primary' : 'text-base-content' }} hover:text-primary duration-200 text-sm items-center justify-start flex p-2 gap-x-2">

                        <svg class="size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24">
                            <g clip-path="url(#clip0_4418_4530)">
                                <path opacity="0.4"
                                    d="M16 2H8C4 2 2 4 2 8V21C2 21.55 2.45 22 3 22H16C20 22 22 20 22 16V8C22 4 20 2 16 2Z"
                                    fill="currentColor" />
                                <path
                                    d="M17 8.75H7C6.59 8.75 6.25 9.09 6.25 9.5C6.25 9.91 6.59 10.25 7 10.25H17C17.41 10.25 17.75 9.91 17.75 9.5C17.75 9.09 17.41 8.75 17 8.75Z"
                                    fill="currentColor" />
                                <path
                                    d="M14 13.75H7C6.59 13.75 6.25 14.09 6.25 14.5C6.25 14.91 6.59 15.25 7 15.25H14C14.41 15.25 14.75 14.91 14.75 14.5C14.75 14.09 14.41 13.75 14 13.75Z"
                                    fill="currentColor" />
                            </g>
                            <defs>
                                <clipPath id="clip0_4418_4530">
                                    <rect width="24" height="24" fill="currentColor" />
                                </clipPath>
                            </defs>
                        </svg>
                        <span class="">پیام‌ها</span>
                    </a>
                </div>
                <div>
                    <a href="{{ route('user.orders') }}"
                        class="{{ Route::currentRouteName() == 'user.orders' ? 'text-primary' : 'text-base-content' }} hover:text-primary duration-200 text-sm items-center justify-start flex p-2 gap-x-2">

                        <svg class="size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="#fff">
                            <g clip-path="url(#clip0_4418_4813ords)">
                                <path
                                    d="M19.9999 19.2591H10.9299C10.4799 19.2591 10.1099 18.8891 10.1099 18.4391C10.1099 17.9891 10.4799 17.6191 10.9299 17.6191H19.9999C20.4499 17.6191 20.8199 17.9891 20.8199 18.4391C20.8199 18.8991 20.4499 19.2591 19.9999 19.2591Z"
                                    fill="currentColor" />
                                <path
                                    d="M19.9999 12.9701H10.9299C10.4799 12.9701 10.1099 12.6001 10.1099 12.1501C10.1099 11.7001 10.4799 11.3301 10.9299 11.3301H19.9999C20.4499 11.3301 20.8199 11.7001 20.8199 12.1501C20.8199 12.6001 20.4499 12.9701 19.9999 12.9701Z"
                                    fill="currentColor" />
                                <path
                                    d="M19.9999 6.6693H10.9299C10.4799 6.6693 10.1099 6.2993 10.1099 5.8493C10.1099 5.3993 10.4799 5.0293 10.9299 5.0293H19.9999C20.4499 5.0293 20.8199 5.3993 20.8199 5.8493C20.8199 6.2993 20.4499 6.6693 19.9999 6.6693Z"
                                    fill="currentColor" />
                                <path opacity="0.4"
                                    d="M4.91018 8.02992C4.69018 8.02992 4.48018 7.93992 4.33018 7.78992L3.42018 6.87992C3.10018 6.55992 3.10018 6.03992 3.42018 5.71992C3.74018 5.39992 4.26018 5.39992 4.58018 5.71992L4.91018 6.04992L7.05018 3.90992C7.37018 3.58992 7.89018 3.58992 8.21018 3.90992C8.53018 4.22992 8.53018 4.74992 8.21018 5.06992L5.49018 7.78992C5.33018 7.93992 5.13018 8.02992 4.91018 8.02992Z"
                                    fill="currentColor" />
                                <path opacity="0.4"
                                    d="M4.91018 14.3307C4.70018 14.3307 4.49018 14.2507 4.33018 14.0907L3.42018 13.1807C3.10018 12.8607 3.10018 12.3407 3.42018 12.0207C3.74018 11.7007 4.26018 11.7007 4.58018 12.0207L4.91018 12.3507L7.05018 10.2107C7.37018 9.8907 7.89018 9.8907 8.21018 10.2107C8.53018 10.5307 8.53018 11.0507 8.21018 11.3707L5.49018 14.0907C5.33018 14.2507 5.12018 14.3307 4.91018 14.3307Z"
                                    fill="currentColor" />
                                <path opacity="0.4"
                                    d="M4.91018 20.3307C4.70018 20.3307 4.49018 20.2507 4.33018 20.0907L3.42018 19.1807C3.10018 18.8607 3.10018 18.3407 3.42018 18.0207C3.74018 17.7007 4.26018 17.7007 4.58018 18.0207L4.91018 18.3507L7.05018 16.2107C7.37018 15.8907 7.89018 15.8907 8.21018 16.2107C8.53018 16.5307 8.53018 17.0507 8.21018 17.3707L5.49018 20.0907C5.33018 20.2507 5.12018 20.3307 4.91018 20.3307Z"
                                    fill="currentColor" />
                            </g>
                            <defs>
                                <clipPath id="clip0_4418_4813ords">
                                    <rect width="24" height="24" fill="currentColor" />
                                </clipPath>
                            </defs>
                        </svg>

                        <span class="">سفارش‌ها</span>
                    </a>
                </div>
                <div>
                    <a href="{{ route('user.transactions') }}"
                        class="{{ Route::currentRouteName() === 'user.transactions' ? 'text-primary' : 'text-base-content' }} hover:text-primary duration-200 text-sm items-center justify-start flex p-2 gap-x-2">

                        <svg class="size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24">
                            <g clip-path="url(#clip0_4418_169775swbvrg)">
                                <path opacity="0.4"
                                    d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.82 22 21.99 19.83 21.99 16.19V7.81C22 4.17 19.83 2 16.19 2Z"
                                    fill="currentColor" />
                                <path
                                    d="M14.2602 12L12.7502 11.47V8.08H13.1102C13.9202 8.08 14.5802 8.79 14.5802 9.66C14.5802 10.07 14.9202 10.41 15.3302 10.41C15.7402 10.41 16.0802 10.07 16.0802 9.66C16.0802 7.96 14.7502 6.58 13.1102 6.58H12.7502V6C12.7502 5.59 12.4102 5.25 12.0002 5.25C11.5902 5.25 11.2502 5.59 11.2502 6V6.58H10.6002C9.12016 6.58 7.91016 7.83 7.91016 9.36C7.91016 11.15 8.95016 11.72 9.74016 12L11.2502 12.53V15.91H10.8902C10.0802 15.91 9.42016 15.2 9.42016 14.33C9.42016 13.92 9.08016 13.58 8.67016 13.58C8.26016 13.58 7.92016 13.92 7.92016 14.33C7.92016 16.03 9.25016 17.41 10.8902 17.41H11.2502V18C11.2502 18.41 11.5902 18.75 12.0002 18.75C12.4102 18.75 12.7502 18.41 12.7502 18V17.42H13.4002C14.8802 17.42 16.0902 16.17 16.0902 14.64C16.0802 12.84 15.0402 12.27 14.2602 12ZM10.2402 10.59C9.73016 10.41 9.42016 10.24 9.42016 9.37C9.42016 8.66 9.95016 8.09 10.6102 8.09H11.2602V10.95L10.2402 10.59ZM13.4002 15.92H12.7502V13.06L13.7602 13.41C14.2702 13.59 14.5802 13.76 14.5802 14.63C14.5802 15.34 14.0502 15.92 13.4002 15.92Z"
                                    fill="currentColor" />
                            </g>
                            <defs>
                                <clipPath id="clip0_4418_169775swbvrg">
                                    <rect width="24" height="24" fill="currentColor" />
                                </clipPath>
                            </defs>
                        </svg>
                        <span class="">تراکنش‌ها</span>
                    </a>
                </div>
            </div>
            <div class="divider"></div>
            <div class="">
                <a href="{{ route('logout') }}" class="flex p-2 items-center gap-x-2 text-error text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        class="size-6">
                        <path opacity="0.4"
                            d="M9 7.2V16.79C9 20 11 22 14.2 22H16.79C19.99 22 21.99 20 21.99 16.8V7.2C22 4 20 2 16.8 2H14.2C11 2 9 4 9 7.2Z"
                            fill="currentColor" />
                        <path
                            d="M5.57 8.11953L2.22 11.4695C1.93 11.7595 1.93 12.2395 2.22 12.5295L5.57 15.8795C5.86 16.1695 6.34 16.1695 6.63 15.8795C6.92 15.5895 6.92 15.1095 6.63 14.8195L4.56 12.7495H15.25C15.66 12.7495 16 12.4095 16 11.9995C16 11.5895 15.66 11.2495 15.25 11.2495H4.56L6.63 9.17953C6.78 9.02953 6.85 8.83953 6.85 8.64953C6.85 8.45953 6.78 8.25953 6.63 8.11953C6.34 7.81953 5.87 7.81953 5.57 8.11953Z"
                            fill="currentColor" />
                    </svg>
                    <span class="">خروج از حساب کاربری</span>
                </a>
            </div>
        </div>

    </div>


</div>
