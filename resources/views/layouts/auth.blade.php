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
        <a href="{{ route('home') }}" class="absolute left-2 top-2 btn">
            <span>بازگشت به سایت</span>
            <x-heroicon-c-chevron-left class="size-5" />
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
