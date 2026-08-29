@props([
    'page_title' => null,
    'return'=> false ,
    'back' => false
    ])

<div class=" flex justify-between items-center">
    <div class="lg:text-3xl text-xl font-semibold flex items-center gap-x-2">

        @isset($icon)

            @if($icon == 'user')
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                     class="inline size-10">
                    <g clip-path="url(#clip0_3111_326762)">
                        <path opacity="0.4"
                              d="M12 22.0098C17.5228 22.0098 22 17.5326 22 12.0098C22 6.48692 17.5228 2.00977 12 2.00977C6.47715 2.00977 2 6.48692 2 12.0098C2 17.5326 6.47715 22.0098 12 22.0098Z"
                              fill="currentColor"/>
                        <path
                            d="M12 6.94043C9.93 6.94043 8.25 8.62043 8.25 10.6904C8.25 12.7204 9.84 14.3704 11.95 14.4304C11.98 14.4304 12.02 14.4304 12.04 14.4304C12.06 14.4304 12.09 14.4304 12.11 14.4304C12.12 14.4304 12.13 14.4304 12.13 14.4304C14.15 14.3604 15.74 12.7204 15.75 10.6904C15.75 8.62043 14.07 6.94043 12 6.94043Z"
                            fill="currentColor"/>
                        <path
                            d="M18.78 19.3602C17 21.0002 14.62 22.0102 12 22.0102C9.37997 22.0102 6.99997 21.0002 5.21997 19.3602C5.45997 18.4502 6.10997 17.6202 7.05997 16.9802C9.78997 15.1602 14.23 15.1602 16.94 16.9802C17.9 17.6202 18.54 18.4502 18.78 19.3602Z"
                            fill="currentColor"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_3111_326762">
                            <rect width="24" height="24" fill="currentColor"/>
                        </clipPath>
                    </defs>
                </svg>
            @elseif($icon == 'message')
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                     class="size-10">
                    <g clip-path="url(#clip0_4418_4516skgp)">
                        <path opacity="0.4"
                              d="M17 20.5H7C4 20.5 2 19 2 15.5V8.5C2 5 4 3.5 7 3.5H17C20 3.5 22 5 22 8.5V15.5C22 19 20 20.5 17 20.5Z"
                              fill="currentColor"/>
                        <path
                            d="M11.9998 12.87C11.1598 12.87 10.3098 12.61 9.65978 12.08L6.52978 9.57997C6.20978 9.31997 6.14978 8.84997 6.40978 8.52997C6.66978 8.20997 7.13978 8.14997 7.45978 8.40997L10.5898 10.91C11.3498 11.52 12.6398 11.52 13.3998 10.91L16.5298 8.40997C16.8498 8.14997 17.3298 8.19997 17.5798 8.52997C17.8398 8.84997 17.7898 9.32997 17.4598 9.57997L14.3298 12.08C13.6898 12.61 12.8398 12.87 11.9998 12.87Z"
                            fill="currentColor"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_4418_4516skgp">
                            <rect width="24" height="24" fill="currentColor"/>
                        </clipPath>
                    </defs>
                </svg>
            @elseif($icon=='list')
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="size-10">
                    <g clip-path="url(#clip0_4418_495522)">
                        <path opacity="0.4"
                              d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.82 22 21.99 19.83 21.99 16.19V7.81C22 4.17 19.83 2 16.19 2Z"
                              fill="currentColor"/>
                        <path
                            d="M17 8.25H7C6.59 8.25 6.25 7.91 6.25 7.5C6.25 7.09 6.59 6.75 7 6.75H17C17.41 6.75 17.75 7.09 17.75 7.5C17.75 7.91 17.41 8.25 17 8.25Z"
                            fill="currentColor"/>
                        <path
                            d="M17 12.75H7C6.59 12.75 6.25 12.41 6.25 12C6.25 11.59 6.59 11.25 7 11.25H17C17.41 11.25 17.75 11.59 17.75 12C17.75 12.41 17.41 12.75 17 12.75Z"
                            fill="currentColor"/>
                        <path
                            d="M17 17.25H7C6.59 17.25 6.25 16.91 6.25 16.5C6.25 16.09 6.59 15.75 7 15.75H17C17.41 15.75 17.75 16.09 17.75 16.5C17.75 16.91 17.41 17.25 17 17.25Z"
                            fill="currentColor"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_4418_495522">
                            <rect width="24" height="24" fill="currentColor"/>
                        </clipPath>
                    </defs>
                </svg>
            @elseif( $icon == 'money')
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                     class="size-10">
                    <g clip-path="url(#clip0_4418_169542sw)">
                        <path opacity="0.4"
                              d="M12 21.9004C17.5228 21.9004 22 17.4232 22 11.9004C22 6.37754 17.5228 1.90039 12 1.90039C6.47715 1.90039 2 6.37754 2 11.9004C2 17.4232 6.47715 21.9004 12 21.9004Z"
                              fill="currentColor"/>
                        <path
                            d="M14.2602 12L12.7502 11.47V8.08H13.1102C13.9202 8.08 14.5802 8.79 14.5802 9.66C14.5802 10.07 14.9202 10.41 15.3302 10.41C15.7402 10.41 16.0802 10.07 16.0802 9.66C16.0802 7.96 14.7502 6.58 13.1102 6.58H12.7502V6C12.7502 5.59 12.4102 5.25 12.0002 5.25C11.5902 5.25 11.2502 5.59 11.2502 6V6.58H10.6002C9.12016 6.58 7.91016 7.83 7.91016 9.36C7.91016 11.15 8.95016 11.72 9.74016 12L11.2502 12.53V15.91H10.8902C10.0802 15.91 9.42016 15.2 9.42016 14.33C9.42016 13.92 9.08016 13.58 8.67016 13.58C8.26016 13.58 7.92016 13.92 7.92016 14.33C7.92016 16.03 9.25016 17.41 10.8902 17.41H11.2502V18C11.2502 18.41 11.5902 18.75 12.0002 18.75C12.4102 18.75 12.7502 18.41 12.7502 18V17.42H13.4002C14.8802 17.42 16.0902 16.17 16.0902 14.64C16.0802 12.84 15.0402 12.27 14.2602 12ZM10.2402 10.59C9.73016 10.41 9.42016 10.24 9.42016 9.37C9.42016 8.66 9.95016 8.09 10.6102 8.09H11.2602V10.95L10.2402 10.59ZM13.4002 15.92H12.7502V13.06L13.7602 13.41C14.2702 13.59 14.5802 13.76 14.5802 14.63C14.5802 15.34 14.0502 15.92 13.4002 15.92Z"
                            fill="currentColor"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_4418_169542sw">
                            <rect width="24" height="24" fill="currentColor"/>
                        </clipPath>
                    </defs>
                </svg>
            @endif

        @endisset
        {{ $page_title }}
    </div>
    <div>
        @if($return)
            <a class=" btn btn-sm btn-soft" href="{{ route($return) }}">
                <span class="font-medium">بازگشت</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                     stroke="currentColor"
                     class="size-4 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5"/>
                </svg>
            </a>
        @endif
        @if($back)
            <a class="btn btn-sm btn-soft" href="{{ url()->previous() }}">
                <span class="font-medium">بازگشت</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                     stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5"/>
                </svg>
            </a>
        @endif
    </div>
</div>
@if (isset($breadcrumbs))
    <div class="breadcrumbs mt-2 text-sm">
        <ul>
            @foreach ($breadcrumbs as $breadcrumb)
                @isset($breadcrumb['link'])
                    <li class="opacity-75">
                        <a
                            href="{{ isset($breadcrumb['params']) ? route($breadcrumb['link'], $breadcrumb['params']) : route($breadcrumb['link']) }}">
                            {{ $breadcrumb['title'] }}
                        </a>
                    </li>
                @else
                    <li class="opacity-75">
                        <span>{{ $breadcrumb['title'] }}</span>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
@endif

<div class="divider"></div>



@if ($errors->any())
    <div class="alert bg-warning/10 text-warning font-medium mb-4">
        <div>
            <div class="text-lg font-semibold mb-5 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                     stroke="currentColor" class="size-7">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z"/>
                </svg>
                <h1>لطفا ورودی ها را بررسی کنید</h1>
            </div>
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    </div>
@endif

