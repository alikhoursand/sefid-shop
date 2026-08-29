<!doctype html>
<html id="html" lang="fa" dir="rtl" data-theme="darkemerald">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود - ثبت نام | {{ config('app.site_name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-base-300">

    <div class=" h-screen flex items-center justify-center relative">
        <a href="{{route('home')}}" class="absolute left-2 top-2 btn">
            <span>بازگشت به سایت</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path opacity="0.4" d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" fill="currentColor" />
                <path d="M13.26 16.2802C13.07 16.2802 12.88 16.2102 12.73 16.0602L9.20001 12.5302C8.91001 12.2402 8.91001 11.7602 9.20001 11.4702L12.73 7.94016C13.02 7.65016 13.5 7.65016 13.79 7.94016C14.08 8.23016 14.08 8.71016 13.79 9.00016L10.79 12.0002L13.79 15.0002C14.08 15.2902 14.08 15.7702 13.79 16.0602C13.65 16.2102 13.46 16.2802 13.26 16.2802Z" fill="currentColor" />
            </svg>
        </a>
        <div class="md:w-1/2 w-full flex justify-center items-center  h-screen ">
            <div class="p-4">
                <div class="flex-col gap-x-2  md:justify-start justify-center  items-center w-full md:mx-0 mx-auto">
                    <img src="{{ asset('logo.png') }}" class="w-24 mx-auto" alt="">
                    <div class="text-4xl mt-3 font-medium text-primary text-center">
                        {{ config('app.site_name') }}</div>
                </div>

                <div class="xs:w-[350px] mt-14  mx-auto  w-full">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>


</body>

</html>
