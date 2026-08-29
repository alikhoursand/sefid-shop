<!doctype html>
<html id="html" dir="rtl" class="h-full" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $page_title ?? config('app.site_title') }}</title>

</head>

<body class="bg-base-100 h-full overflow-hidden">


    <div class="flex h-full">

        <div class="drawer drawer-start lg:w-64 w-0 lg:drawer-open z-40">
            <input id="my-drawer-4" type="checkbox" class="drawer-toggle" />
            <div class="drawer-side">
                <label for="my-drawer-4" aria-label="close sidebar" class="drawer-overlay"></label>
                <x-admin.sidebar-content :type="'sidebar'"></x-admin.sidebar-content>
            </div>
        </div>

        <div class="grow overflow-y-auto">
            @include('components.admin.navbar')
            <div class=" bg-base-200 lg:rounded-box lg:ml-2 h-full">

                <div class="p-2 sm:p-4 ">
                    @yield('content')
                </div>
            </div>
        </div>

    </div>


    {{-- <aside id="logo-sidebar" --}}
    {{--       class="hidden z-40 top-0 right-0 w-64 h-screen transition-transform translate-x-full lg:translate-x-0 lg:block" --}}
    {{--       aria-label="Sidebar"> --}}
    {{--    <x-admin.sidebar-content :type="'sidebar'"></x-admin.sidebar-content> --}}
    {{-- </aside> --}}



    <dialog id="error_dialog" class="modal">
        <div class="modal-box bg-base-300">

            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                class="size-20 text-error mx-auto">
                <g clip-path="url(#clip0_4418_4912asd)">
                    <path opacity="0.4"
                        d="M14.9 2H9.10001C8.42001 2 7.46 2.4 6.98 2.88L2.88 6.98001C2.4 7.46001 2 8.42001 2 9.10001V14.9C2 15.58 2.4 16.54 2.88 17.02L6.98 21.12C7.46 21.6 8.42001 22 9.10001 22H14.9C15.58 22 16.54 21.6 17.02 21.12L21.12 17.02C21.6 16.54 22 15.58 22 14.9V9.10001C22 8.42001 21.6 7.46001 21.12 6.98001L17.02 2.88C16.54 2.4 15.58 2 14.9 2Z"
                        fill="currentColor" />
                    <path
                        d="M13.0599 11.9995L16.0299 9.02945C16.3199 8.73945 16.3199 8.25945 16.0299 7.96945C15.7399 7.67945 15.2599 7.67945 14.9699 7.96945L11.9999 10.9395L9.02994 7.96945C8.73994 7.67945 8.25994 7.67945 7.96994 7.96945C7.67994 8.25945 7.67994 8.73945 7.96994 9.02945L10.9399 11.9995L7.96994 14.9695C7.67994 15.2595 7.67994 15.7395 7.96994 16.0295C8.11994 16.1795 8.30994 16.2495 8.49994 16.2495C8.68994 16.2495 8.87994 16.1795 9.02994 16.0295L11.9999 13.0594L14.9699 16.0295C15.1199 16.1795 15.3099 16.2495 15.4999 16.2495C15.6899 16.2495 15.8799 16.1795 16.0299 16.0295C16.3199 15.7395 16.3199 15.2595 16.0299 14.9695L13.0599 11.9995Z"
                        fill="currentColor" />
                </g>
                <defs>
                    <clipPath id="clip0_4418_4912asd">
                        <rect width="24" height="24" fill="currentColor" />
                    </clipPath>
                </defs>
            </svg>
            <h3 class="text-lg text-center font-bold text-error">خطا!</h3>
            <p class="py-4 text-center">{{ session('error') }}</p>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
    <dialog id="success_dialog" class="modal">
        <div class="modal-box bg-base-300">

            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                class="size-20 text-success mx-auto">
                <g clip-path="url(#clip0_4418_4935ss)">
                    <path opacity="0.4"
                        d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                        fill="currentColor" />
                    <path
                        d="M10.5799 15.5796C10.3799 15.5796 10.1899 15.4996 10.0499 15.3596L7.21994 12.5296C6.92994 12.2396 6.92994 11.7596 7.21994 11.4696C7.50994 11.1796 7.98994 11.1796 8.27994 11.4696L10.5799 13.7696L15.7199 8.62961C16.0099 8.33961 16.4899 8.33961 16.7799 8.62961C17.0699 8.91961 17.0699 9.39961 16.7799 9.68961L11.1099 15.3596C10.9699 15.4996 10.7799 15.5796 10.5799 15.5796Z"
                        fill="currentColor" />
                </g>
                <defs>
                    <clipPath id="clip0_4418_4935ss">
                        <rect width="24" height="24" fill="currentColor" />
                    </clipPath>
                </defs>
            </svg>

            <h3 class="text-lg text-center font-bold text-success">با موفقیت انجام شد!</h3>
            <p class="py-4 text-center">{{ session('success') }}</p>

            <form method="dialog" class="text-center w-full mt-6">
                <button id="success_modal_ok" class="btn btn-sm btn-success">باشه</button>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
    <dialog id="warning_dialog" class="modal">
        <div class="modal-box bg-base-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                class="size-20 text-warning mx-auto">
                <g clip-path="url(#clip0_4418_4943)">
                    <path opacity="0.4"
                        d="M21.76 15.92L15.36 4.4C14.5 2.85 13.31 2 12 2C10.69 2 9.49998 2.85 8.63998 4.4L2.23998 15.92C1.42998 17.39 1.33998 18.8 1.98998 19.91C2.63998 21.02 3.91998 21.63 5.59998 21.63H18.4C20.08 21.63 21.36 21.02 22.01 19.91C22.66 18.8 22.57 17.38 21.76 15.92Z"
                        fill="currentColor" />
                    <path
                        d="M12 14.75C11.59 14.75 11.25 14.41 11.25 14V9C11.25 8.59 11.59 8.25 12 8.25C12.41 8.25 12.75 8.59 12.75 9V14C12.75 14.41 12.41 14.75 12 14.75Z"
                        fill="currentColor" />
                    <path
                        d="M12 18.0005C11.94 18.0005 11.87 17.9905 11.8 17.9805C11.74 17.9705 11.68 17.9505 11.62 17.9205C11.56 17.9005 11.5 17.8705 11.44 17.8305C11.39 17.7905 11.34 17.7505 11.29 17.7105C11.11 17.5205 11 17.2605 11 17.0005C11 16.7405 11.11 16.4805 11.29 16.2905C11.34 16.2505 11.39 16.2105 11.44 16.1705C11.5 16.1305 11.56 16.1005 11.62 16.0805C11.68 16.0505 11.74 16.0305 11.8 16.0205C11.93 15.9905 12.07 15.9905 12.19 16.0205C12.26 16.0305 12.32 16.0505 12.38 16.0805C12.44 16.1005 12.5 16.1305 12.56 16.1705C12.61 16.2105 12.66 16.2505 12.71 16.2905C12.89 16.4805 13 16.7405 13 17.0005C13 17.2605 12.89 17.5205 12.71 17.7105C12.66 17.7505 12.61 17.7905 12.56 17.8305C12.5 17.8705 12.44 17.9005 12.38 17.9205C12.32 17.9505 12.26 17.9705 12.19 17.9805C12.13 17.9905 12.06 18.0005 12 18.0005Z"
                        fill="currentColor" />
                </g>
                <defs>
                    <clipPath id="clip0_4418_4943">
                        <rect width="24" height="24" fill="currentColor" />
                    </clipPath>
                </defs>
            </svg>
            <h3 class="text-lg text-center font-bold text-warning">اخطار!</h3>
            <p class="py-4 text-center">{{ session('warning') }}</p>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>

    <button class="btn hidden" id="error_dialog_opener" onclick="error_dialog.showModal()">dialog opener</button>
    <button class="btn hidden" id="success_dialog_opener" onclick="success_dialog.showModal()">dialog opener</button>
    <button class="btn hidden" id="warning_dialog_opener" onclick="warning_dialog.showModal()">dialog opener</button>

    <script>
        @session('error')
        document.querySelector("#error_dialog_opener").click();
        @endsession

        @session('success')
        document.querySelector("#success_dialog_opener").click();
        document.querySelector("#success_modal_ok").blur();
        setTimeout(() => {
            document.querySelector("#success_modal_ok").click();
        }, 4000)
        @endsession

        @session('warning')
        document.querySelector("#warning_dialog_opener").click();
        @endsession
    </script>

    @yield('footer_js')

    @stack('footer_js')
</body>

</html>
