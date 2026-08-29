@php
    if($step == 1){
        $backUrl = route('home');
    }else if($step == 2){
        $backUrl = route('shop.cart.index');
    }else if($step == 3){
        $backUrl = route('shop.order.details');
    }else{
        $backUrl = false;
    }
@endphp

<div
    class="hidden sm:flex flex-wrap items-center justify-center gap-x-4 sm:gap-0 px-4 border-b-2 sm:border-none pb-4 border-base-300 pt-4 md:pt-8 lg:pt-12 ">
    <div
        class="flex {{$step >= 1 ? 'text-primary' : ''}} flex-col items-center justify-center w-10 sm:w-30 md:w-34 text-base md:text-lg gap-y-2">
        <div class="">
            @if($step == 1)
                <svg xmlns="http://www.w3.org/2000/svg" class="sm:block size-8 md:size-10 " width="24" height="24"
                     viewBox="0 0 24 24"
                     fill="none">
                    <g clip-path="url(#clip0_4418_8432)">
                        <path
                            d="M16.25 22.5C17.2165 22.5 18 21.7165 18 20.75C18 19.7835 17.2165 19 16.25 19C15.2835 19 14.5 19.7835 14.5 20.75C14.5 21.7165 15.2835 22.5 16.25 22.5Z"
                            fill="currentColor"/>
                        <path
                            d="M8.25 22.5C9.2165 22.5 10 21.7165 10 20.75C10 19.7835 9.2165 19 8.25 19C7.2835 19 6.5 19.7835 6.5 20.75C6.5 21.7165 7.2835 22.5 8.25 22.5Z"
                            fill="currentColor"/>
                        <path
                            d="M4.84 3.94L4.64 6.39C4.6 6.86 4.97 7.25 5.44 7.25H20.75C21.17 7.25 21.52 6.93 21.55 6.51C21.68 4.74 20.33 3.3 18.56 3.3H6.27C6.17 2.86 5.97 2.44 5.66 2.09C5.16 1.56 4.46 1.25 3.74 1.25H2C1.59 1.25 1.25 1.59 1.25 2C1.25 2.41 1.59 2.75 2 2.75H3.74C4.05 2.75 4.34 2.88 4.55 3.1C4.76 3.33 4.86 3.63 4.84 3.94Z"
                            fill="currentColor"/>
                        <path
                            d="M20.5101 8.75H5.17005C4.75005 8.75 4.41005 9.07 4.37005 9.48L4.01005 13.83C3.87005 15.54 5.21005 17 6.92005 17H18.0401C19.5401 17 20.8601 15.77 20.9701 14.27L21.3001 9.6C21.3401 9.14 20.9801 8.75 20.5101 8.75Z"
                            fill="currentColor"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_4418_8432">
                            <rect width="24" height="24" fill="currentColor"/>
                        </clipPath>
                    </defs>
                </svg>
            @else
                <svg xmlns="http://www.w3.org/2000/svg" class="sm:block size-8 md:size-10 " width="24" height="24"
                     viewBox="0 0 24 24"
                     fill="none">
                    <g clip-path="url(#clip0_4418_9660)">
                        <path
                            d="M2 2H3.74001C4.82001 2 5.67 2.93 5.58 4L4.75 13.96C4.61 15.59 5.89999 16.99 7.53999 16.99H18.19C19.63 16.99 20.89 15.81 21 14.38L21.54 6.88C21.66 5.22 20.4 3.87 18.73 3.87H5.82001"
                            stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round"/>
                        <path
                            d="M16.25 22C16.9404 22 17.5 21.4404 17.5 20.75C17.5 20.0596 16.9404 19.5 16.25 19.5C15.5596 19.5 15 20.0596 15 20.75C15 21.4404 15.5596 22 16.25 22Z"
                            stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round"/>
                        <path
                            d="M8.25 22C8.94036 22 9.5 21.4404 9.5 20.75C9.5 20.0596 8.94036 19.5 8.25 19.5C7.55964 19.5 7 20.0596 7 20.75C7 21.4404 7.55964 22 8.25 22Z"
                            stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round"/>
                        <path d="M9 8H21" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                              stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_4418_9660">
                            <rect width="24" height="24" fill="currentColor"/>
                        </clipPath>
                    </defs>
                </svg>
            @endif
        </div>
        <div class="hidden sm:block {{$step == 1? 'font-medium':''}}">بررسی سبد خرید</div>
    </div>
    <div class="divider border-base-300 grow-1 {{$step >= 2 ? 'divider-primary' : ''}}"></div>
    <div
        class="flex {{$step >= 2 ? 'text-primary' : 'opacity-75'}} flex-col items-center justify-center w-10 sm:w-30 md:w-34 text-base md:text-lg gap-y-2">
        <div class="">
            @if($step == 2)
                <svg xmlns="http://www.w3.org/2000/svg" class="sm:block size-8 md:size-10" width="24" height="24"
                     viewBox="0 0 24 24"
                     fill="none">
                    <g clip-path="url(#clip0_4418_8281)">
                        <path
                            d="M14 2.92V11.23C14 12.25 13.17 13.08 12.15 13.08H3C2.45 13.08 2 12.63 2 12.08V5.69C2 3.65 3.65 2 5.69 2H13.07C13.59 2 14 2.41 14 2.92Z"
                            fill="currentColor"/>
                        <path
                            d="M21.5 15.5C21.78 15.5 22 15.72 22 16V17C22 18.66 20.66 20 19 20C19 18.35 17.65 17 16 17C14.35 17 13 18.35 13 20H11C11 18.35 9.65 17 8 17C6.35 17 5 18.35 5 20C3.34 20 2 18.66 2 17V15C2 14.45 2.45 14 3 14H12.5C13.88 14 15 12.88 15 11.5V6C15 5.45 15.45 5 16 5H16.84C17.56 5 18.22 5.39 18.58 6.01L19.22 7.13C19.31 7.29 19.19 7.5 19 7.5C17.62 7.5 16.5 8.62 16.5 10V13C16.5 14.38 17.62 15.5 19 15.5H21.5Z"
                            fill="currentColor"/>
                        <path
                            d="M8 22C9.10457 22 10 21.1046 10 20C10 18.8954 9.10457 18 8 18C6.89543 18 6 18.8954 6 20C6 21.1046 6.89543 22 8 22Z"
                            fill="currentColor"/>
                        <path
                            d="M16 22C17.1046 22 18 21.1046 18 20C18 18.8954 17.1046 18 16 18C14.8954 18 14 18.8954 14 20C14 21.1046 14.8954 22 16 22Z"
                            fill="currentColor"/>
                        <path
                            d="M22 12.53V14H19C18.45 14 18 13.55 18 13V10C18 9.45 18.45 9 19 9H20.29L21.74 11.54C21.91 11.84 22 12.18 22 12.53Z"
                            fill="currentColor"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_4418_8281">
                            <rect width="24" height="24" fill="currentColor"/>
                        </clipPath>
                    </defs>
                </svg>
            @else
                <svg xmlns="http://www.w3.org/2000/svg" class="sm:block size-8 md:size-10" width="24" height="24"
                     viewBox="0 0 24 24"
                     fill="none">
                    <g clip-path="url(#clip0_4418_9500)">
                        <path d="M15 2V12C15 13.1 14.1 14 13 14H2V6C2 3.79 3.79 2 6 2H15Z" stroke="currentColor"
                              stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round"/>
                        <path
                            d="M22 14V17C22 18.66 20.66 20 19 20H18C18 18.9 17.1 18 16 18C14.9 18 14 18.9 14 20H10C10 18.9 9.1 18 8 18C6.9 18 6 18.9 6 20H5C3.34 20 2 18.66 2 17V14H13C14.1 14 15 13.1 15 12V5H16.84C17.56 5 18.22 5.39001 18.58 6.01001L20.29 9H19C18.45 9 18 9.45 18 10V13C18 13.55 18.45 14 19 14H22Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path
                            d="M8 22C9.10457 22 10 21.1046 10 20C10 18.8954 9.10457 18 8 18C6.89543 18 6 18.8954 6 20C6 21.1046 6.89543 22 8 22Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path
                            d="M16 22C17.1046 22 18 21.1046 18 20C18 18.8954 17.1046 18 16 18C14.8954 18 14 18.8954 14 20C14 21.1046 14.8954 22 16 22Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M22 12V14H19C18.45 14 18 13.55 18 13V10C18 9.45 18.45 9 19 9H20.29L22 12Z"
                              stroke="currentColor"
                              stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_4418_9500">
                            <rect width="24" height="24" fill="currentColor"/>
                        </clipPath>
                    </defs>
                </svg>
            @endif

        </div>
        <div class="hidden sm:block">اطلاعات ارسال</div>
    </div>
    <div class="divider border-base-300 grow-1 {{$step >= 3 ? 'divider-primary' : ''}}"></div>
    <div
        class="flex {{$step >= 3 ? 'text-primary' : 'opacity-75'}} flex-col items-center justify-center w-10 sm:w-30 md:w-34 text-base md:text-lg gap-y-2">
        <div class="">
            @if($step == 3)
                <svg xmlns="http://www.w3.org/2000/svg" class="sm:block size-8 md:size-10 " width="24" height="24"
                     viewBox="0 0 24 24"
                     fill="none">
                    <g clip-path="url(#clip0_4418_169768)">
                        <path
                            d="M22 21.25C22 21.66 21.66 22 21.25 22H2.75C2.34 22 2 21.66 2 21.25C2 20.84 2.34 20.5 2.75 20.5H21.25C21.66 20.5 22 20.84 22 21.25Z"
                            fill="currentColor"/>
                        <path
                            d="M15.3899 4.51977L4.64994 15.2598C4.23994 15.6698 3.57994 15.6698 3.17994 15.2598H3.16994C1.77994 13.8598 1.77994 11.5998 3.16994 10.2098L10.3199 3.05977C11.7199 1.65977 13.9799 1.65977 15.3799 3.05977C15.7899 3.44977 15.7899 4.11977 15.3899 4.51977Z"
                            fill="currentColor"/>
                        <path
                            d="M20.8199 8.49031L17.7699 5.44031C17.3599 5.03031 16.6999 5.03031 16.2999 5.44031L5.55994 16.1803C5.14994 16.5803 5.14994 17.2403 5.55994 17.6503L8.60994 20.7103C10.0099 22.1003 12.2699 22.1003 13.6699 20.7103L20.8099 13.5603C22.2299 12.1603 22.2299 9.89031 20.8199 8.49031ZM12.7599 17.5203L11.5499 18.7403C11.2999 18.9903 10.8899 18.9903 10.6299 18.7403C10.3799 18.4903 10.3799 18.0803 10.6299 17.8203L11.8499 16.6003C12.0899 16.3603 12.5099 16.3603 12.7599 16.6003C13.0099 16.8503 13.0099 17.2803 12.7599 17.5203ZM16.7299 13.5503L14.2899 16.0003C14.0399 16.2403 13.6299 16.2403 13.3699 16.0003C13.1199 15.7503 13.1199 15.3403 13.3699 15.0803L15.8199 12.6303C16.0599 12.3903 16.4799 12.3903 16.7299 12.6303C16.9799 12.8903 16.9799 13.3003 16.7299 13.5503Z"
                            fill="currentColor"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_4418_169768">
                            <rect width="24" height="24" fill="currentColor"/>
                        </clipPath>
                    </defs>
                </svg>
            @else
                <svg xmlns="http://www.w3.org/2000/svg" class="sm:block size-8 md:size-10" width="24" height="24"
                     viewBox="0 0 24 24"
                     fill="none">
                    <g clip-path="url(#clip0_4418_169846)">
                        <path d="M3.92969 15.8797L15.8797 3.92969" stroke="currentColor" stroke-width="1.5"
                              stroke-miterlimit="10"
                              stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M11.1013 18.2791L12.3013 17.0791" stroke="currentColor" stroke-width="1.5"
                              stroke-miterlimit="10"
                              stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M13.793 15.5892L16.183 13.1992" stroke="currentColor" stroke-width="1.5"
                              stroke-miterlimit="10"
                              stroke-linecap="round" stroke-linejoin="round"/>
                        <path
                            d="M3.60127 10.2395L10.2413 3.59949C12.3613 1.47949 13.4213 1.46949 15.5213 3.56949L20.4313 8.47949C22.5313 10.5795 22.5213 11.6395 20.4013 13.7595L13.7613 20.3995C11.6413 22.5195 10.5813 22.5295 8.48127 20.4295L3.57127 15.5195C1.47127 13.4195 1.47127 12.3695 3.60127 10.2395Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2 21.998H22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_4418_169846">
                            <rect width="24" height="24" fill="currentColor"/>
                        </clipPath>
                    </defs>
                </svg>
            @endif
        </div>
        <div class="hidden sm:block">نحوه پرداخت</div>
    </div>
    <div class="divider border-base-300 grow-1 {{$step >= 4 ? 'divider-primary' : ''}}"></div>
    <div
        class="flex {{$step >= 4 ? 'text-primary' : 'opacity-75'}} flex-col items-center justify-center w-10 sm:w-30 md:w-34 text-base md:text-lg gap-y-2">
        <div class="">
            @if($step == 4)
                <svg xmlns="http://www.w3.org/2000/svg" class="sm:block size-8 md:size-10 " width="24" height="24"
                     viewBox="0 0 24 24"
                     fill="none">
                    <g clip-path="url(#clip0_4418_8594)">
                        <path
                            d="M12 2C6.49 2 2 6.49 2 12C2 17.51 6.49 22 12 22C17.51 22 22 17.51 22 12C22 6.49 17.51 2 12 2ZM16.78 9.7L11.11 15.37C10.97 15.51 10.78 15.59 10.58 15.59C10.38 15.59 10.19 15.51 10.05 15.37L7.22 12.54C6.93 12.25 6.93 11.77 7.22 11.48C7.51 11.19 7.99 11.19 8.28 11.48L10.58 13.78L15.72 8.64C16.01 8.35 16.49 8.35 16.78 8.64C17.07 8.93 17.07 9.4 16.78 9.7Z"
                            fill="currentColor"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_4418_8594">
                            <rect width="24" height="24" fill="currentColor"/>
                        </clipPath>
                    </defs>
                </svg>
            @else
                <svg xmlns="http://www.w3.org/2000/svg" class="sm:block size-8 md:size-10" width="24" height="24"
                     viewBox="0 0 24 24"
                     fill="none">
                    <g clip-path="url(#clip0_4418_9818)">
                        <path d="M12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22Z"
                              stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M7.75 11.9999L10.58 14.8299L16.25 9.16992" stroke="currentColor" stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_4418_9818">
                            <rect width="24" height="24" fill="currentColor"/>
                        </clipPath>
                    </defs>
                </svg>
            @endif
        </div>
        <div class="hidden sm:block">پایان خرید</div>
    </div>
    <div class="basis-full text-center text-lg text-primary mt-4 block sm:hidden">
        <div class="text-sm">مرحله {{$step}} از ۴</div>
        <div>
            @if($step == 1)
                بررسی سبد خرید
            @elseif($step == 2)
                اطلاعات ارسال
            @elseif($step == 3)
                نحوه پرداخت
            @else
                پایان خرید
            @endif
        </div>
    </div>
</div>


<div
    class="sm:hidden h-15 sticky top-0 right-0 absolute w-full border-b-2 border-base-300 bg-base-100 py-2 px-4">
    <div class="flex justify-between items-center text-center  h-full">
        <div class="w-10 text-right">
            @if($backUrl != false)
                <a href="{{$backUrl}}" class="btn btn-xs btn-circle ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" width="24" height="24" viewBox="0 0 24 24"
                         fill="none">
                        <path
                            d="M8.90991 19.9201L15.4299 13.4001C16.1999 12.6301 16.1999 11.3701 15.4299 10.6001L8.90991 4.08008"
                            stroke="currentColor" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round"/>
                    </svg>
                </a>
            @endif
        </div>
        <div class="text-primary grow flex items-center justify-center h-full  gap-x-2">
            @if($step ==1)
                <div class="">
                    @if($step == 1)
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6 md:size-10 " width="24" height="24"
                             viewBox="0 0 24 24"
                             fill="none">
                            <g clip-path="url(#clip0_4418_8432)">
                                <path
                                    d="M16.25 22.5C17.2165 22.5 18 21.7165 18 20.75C18 19.7835 17.2165 19 16.25 19C15.2835 19 14.5 19.7835 14.5 20.75C14.5 21.7165 15.2835 22.5 16.25 22.5Z"
                                    fill="currentColor"/>
                                <path
                                    d="M8.25 22.5C9.2165 22.5 10 21.7165 10 20.75C10 19.7835 9.2165 19 8.25 19C7.2835 19 6.5 19.7835 6.5 20.75C6.5 21.7165 7.2835 22.5 8.25 22.5Z"
                                    fill="currentColor"/>
                                <path
                                    d="M4.84 3.94L4.64 6.39C4.6 6.86 4.97 7.25 5.44 7.25H20.75C21.17 7.25 21.52 6.93 21.55 6.51C21.68 4.74 20.33 3.3 18.56 3.3H6.27C6.17 2.86 5.97 2.44 5.66 2.09C5.16 1.56 4.46 1.25 3.74 1.25H2C1.59 1.25 1.25 1.59 1.25 2C1.25 2.41 1.59 2.75 2 2.75H3.74C4.05 2.75 4.34 2.88 4.55 3.1C4.76 3.33 4.86 3.63 4.84 3.94Z"
                                    fill="currentColor"/>
                                <path
                                    d="M20.5101 8.75H5.17005C4.75005 8.75 4.41005 9.07 4.37005 9.48L4.01005 13.83C3.87005 15.54 5.21005 17 6.92005 17H18.0401C19.5401 17 20.8601 15.77 20.9701 14.27L21.3001 9.6C21.3401 9.14 20.9801 8.75 20.5101 8.75Z"
                                    fill="currentColor"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_4418_8432">
                                    <rect width="24" height="24" fill="currentColor"/>
                                </clipPath>
                            </defs>
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6 md:size-10 " width="24" height="24"
                             viewBox="0 0 24 24"
                             fill="none">
                            <g clip-path="url(#clip0_4418_9660)">
                                <path
                                    d="M2 2H3.74001C4.82001 2 5.67 2.93 5.58 4L4.75 13.96C4.61 15.59 5.89999 16.99 7.53999 16.99H18.19C19.63 16.99 20.89 15.81 21 14.38L21.54 6.88C21.66 5.22 20.4 3.87 18.73 3.87H5.82001"
                                    stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"/>
                                <path
                                    d="M16.25 22C16.9404 22 17.5 21.4404 17.5 20.75C17.5 20.0596 16.9404 19.5 16.25 19.5C15.5596 19.5 15 20.0596 15 20.75C15 21.4404 15.5596 22 16.25 22Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"/>
                                <path
                                    d="M8.25 22C8.94036 22 9.5 21.4404 9.5 20.75C9.5 20.0596 8.94036 19.5 8.25 19.5C7.55964 19.5 7 20.0596 7 20.75C7 21.4404 7.55964 22 8.25 22Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"/>
                                <path d="M9 8H21" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_4418_9660">
                                    <rect width="24" height="24" fill="currentColor"/>
                                </clipPath>
                            </defs>
                        </svg>
                    @endif
                </div>
                <div class="text-medium">سبد خرید</div>
            @elseif($step ==2)
                <div class="">
                    @if($step == 2)
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6 md:size-10" width="24" height="24"
                             viewBox="0 0 24 24"
                             fill="none">
                            <g clip-path="url(#clip0_4418_8281)">
                                <path
                                    d="M14 2.92V11.23C14 12.25 13.17 13.08 12.15 13.08H3C2.45 13.08 2 12.63 2 12.08V5.69C2 3.65 3.65 2 5.69 2H13.07C13.59 2 14 2.41 14 2.92Z"
                                    fill="currentColor"/>
                                <path
                                    d="M21.5 15.5C21.78 15.5 22 15.72 22 16V17C22 18.66 20.66 20 19 20C19 18.35 17.65 17 16 17C14.35 17 13 18.35 13 20H11C11 18.35 9.65 17 8 17C6.35 17 5 18.35 5 20C3.34 20 2 18.66 2 17V15C2 14.45 2.45 14 3 14H12.5C13.88 14 15 12.88 15 11.5V6C15 5.45 15.45 5 16 5H16.84C17.56 5 18.22 5.39 18.58 6.01L19.22 7.13C19.31 7.29 19.19 7.5 19 7.5C17.62 7.5 16.5 8.62 16.5 10V13C16.5 14.38 17.62 15.5 19 15.5H21.5Z"
                                    fill="currentColor"/>
                                <path
                                    d="M8 22C9.10457 22 10 21.1046 10 20C10 18.8954 9.10457 18 8 18C6.89543 18 6 18.8954 6 20C6 21.1046 6.89543 22 8 22Z"
                                    fill="currentColor"/>
                                <path
                                    d="M16 22C17.1046 22 18 21.1046 18 20C18 18.8954 17.1046 18 16 18C14.8954 18 14 18.8954 14 20C14 21.1046 14.8954 22 16 22Z"
                                    fill="currentColor"/>
                                <path
                                    d="M22 12.53V14H19C18.45 14 18 13.55 18 13V10C18 9.45 18.45 9 19 9H20.29L21.74 11.54C21.91 11.84 22 12.18 22 12.53Z"
                                    fill="currentColor"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_4418_8281">
                                    <rect width="24" height="24" fill="currentColor"/>
                                </clipPath>
                            </defs>
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6 md:size-10" width="24" height="24"
                             viewBox="0 0 24 24"
                             fill="none">
                            <g clip-path="url(#clip0_4418_9500)">
                                <path d="M15 2V12C15 13.1 14.1 14 13 14H2V6C2 3.79 3.79 2 6 2H15Z" stroke="currentColor"
                                      stroke-width="1.5"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                                <path
                                    d="M22 14V17C22 18.66 20.66 20 19 20H18C18 18.9 17.1 18 16 18C14.9 18 14 18.9 14 20H10C10 18.9 9.1 18 8 18C6.9 18 6 18.9 6 20H5C3.34 20 2 18.66 2 17V14H13C14.1 14 15 13.1 15 12V5H16.84C17.56 5 18.22 5.39001 18.58 6.01001L20.29 9H19C18.45 9 18 9.45 18 10V13C18 13.55 18.45 14 19 14H22Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"/>
                                <path
                                    d="M8 22C9.10457 22 10 21.1046 10 20C10 18.8954 9.10457 18 8 18C6.89543 18 6 18.8954 6 20C6 21.1046 6.89543 22 8 22Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"/>
                                <path
                                    d="M16 22C17.1046 22 18 21.1046 18 20C18 18.8954 17.1046 18 16 18C14.8954 18 14 18.8954 14 20C14 21.1046 14.8954 22 16 22Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"/>
                                <path d="M22 12V14H19C18.45 14 18 13.55 18 13V10C18 9.45 18.45 9 19 9H20.29L22 12Z"
                                      stroke="currentColor"
                                      stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_4418_9500">
                                    <rect width="24" height="24" fill="currentColor"/>
                                </clipPath>
                            </defs>
                        </svg>
                    @endif
                </div>
                <div class="text-medium">اطلاعات ارسال</div>
            @elseif($step ==3)
                <div class="">
                    @if($step == 3)
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6 md:size-10 " width="24" height="24"
                             viewBox="0 0 24 24"
                             fill="none">
                            <g clip-path="url(#clip0_4418_169768)">
                                <path
                                    d="M22 21.25C22 21.66 21.66 22 21.25 22H2.75C2.34 22 2 21.66 2 21.25C2 20.84 2.34 20.5 2.75 20.5H21.25C21.66 20.5 22 20.84 22 21.25Z"
                                    fill="currentColor"/>
                                <path
                                    d="M15.3899 4.51977L4.64994 15.2598C4.23994 15.6698 3.57994 15.6698 3.17994 15.2598H3.16994C1.77994 13.8598 1.77994 11.5998 3.16994 10.2098L10.3199 3.05977C11.7199 1.65977 13.9799 1.65977 15.3799 3.05977C15.7899 3.44977 15.7899 4.11977 15.3899 4.51977Z"
                                    fill="currentColor"/>
                                <path
                                    d="M20.8199 8.49031L17.7699 5.44031C17.3599 5.03031 16.6999 5.03031 16.2999 5.44031L5.55994 16.1803C5.14994 16.5803 5.14994 17.2403 5.55994 17.6503L8.60994 20.7103C10.0099 22.1003 12.2699 22.1003 13.6699 20.7103L20.8099 13.5603C22.2299 12.1603 22.2299 9.89031 20.8199 8.49031ZM12.7599 17.5203L11.5499 18.7403C11.2999 18.9903 10.8899 18.9903 10.6299 18.7403C10.3799 18.4903 10.3799 18.0803 10.6299 17.8203L11.8499 16.6003C12.0899 16.3603 12.5099 16.3603 12.7599 16.6003C13.0099 16.8503 13.0099 17.2803 12.7599 17.5203ZM16.7299 13.5503L14.2899 16.0003C14.0399 16.2403 13.6299 16.2403 13.3699 16.0003C13.1199 15.7503 13.1199 15.3403 13.3699 15.0803L15.8199 12.6303C16.0599 12.3903 16.4799 12.3903 16.7299 12.6303C16.9799 12.8903 16.9799 13.3003 16.7299 13.5503Z"
                                    fill="currentColor"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_4418_169768">
                                    <rect width="24" height="24" fill="currentColor"/>
                                </clipPath>
                            </defs>
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6 md:size-10" width="24" height="24"
                             viewBox="0 0 24 24"
                             fill="none">
                            <g clip-path="url(#clip0_4418_169846)">
                                <path d="M3.92969 15.8797L15.8797 3.92969" stroke="currentColor" stroke-width="1.5"
                                      stroke-miterlimit="10"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M11.1013 18.2791L12.3013 17.0791" stroke="currentColor" stroke-width="1.5"
                                      stroke-miterlimit="10"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.793 15.5892L16.183 13.1992" stroke="currentColor" stroke-width="1.5"
                                      stroke-miterlimit="10"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                                <path
                                    d="M3.60127 10.2395L10.2413 3.59949C12.3613 1.47949 13.4213 1.46949 15.5213 3.56949L20.4313 8.47949C22.5313 10.5795 22.5213 11.6395 20.4013 13.7595L13.7613 20.3995C11.6413 22.5195 10.5813 22.5295 8.48127 20.4295L3.57127 15.5195C1.47127 13.4195 1.47127 12.3695 3.60127 10.2395Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"/>
                                <path d="M2 21.998H22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_4418_169846">
                                    <rect width="24" height="24" fill="currentColor"/>
                                </clipPath>
                            </defs>
                        </svg>
                    @endif
                </div>
                <div class="text-medium">نحوه پرداخت</div>
            @else
                <div class="">
                    @if($step == 4)
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6 md:size-10 " width="24" height="24"
                             viewBox="0 0 24 24"
                             fill="none">
                            <g clip-path="url(#clip0_4418_8594)">
                                <path
                                    d="M12 2C6.49 2 2 6.49 2 12C2 17.51 6.49 22 12 22C17.51 22 22 17.51 22 12C22 6.49 17.51 2 12 2ZM16.78 9.7L11.11 15.37C10.97 15.51 10.78 15.59 10.58 15.59C10.38 15.59 10.19 15.51 10.05 15.37L7.22 12.54C6.93 12.25 6.93 11.77 7.22 11.48C7.51 11.19 7.99 11.19 8.28 11.48L10.58 13.78L15.72 8.64C16.01 8.35 16.49 8.35 16.78 8.64C17.07 8.93 17.07 9.4 16.78 9.7Z"
                                    fill="currentColor"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_4418_8594">
                                    <rect width="24" height="24" fill="currentColor"/>
                                </clipPath>
                            </defs>
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6 md:size-10" width="24" height="24"
                             viewBox="0 0 24 24"
                             fill="none">
                            <g clip-path="url(#clip0_4418_9818)">
                                <path
                                    d="M12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"/>
                                <path d="M7.75 11.9999L10.58 14.8299L16.25 9.16992" stroke="currentColor"
                                      stroke-width="1.5"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_4418_9818">
                                    <rect width="24" height="24" fill="currentColor"/>
                                </clipPath>
                            </defs>
                        </svg>
                    @endif
                </div>
                <div class="text-medium">پایان خرید</div>
            @endif
        </div>
        <div class="text-sm text-left w-10 ">
            @if($step != 4)
                <div>مرحله</div>
                <span class="font-bold">{{$step}}</span> از ۴
            @endif
        </div>
    </div>
</div>

