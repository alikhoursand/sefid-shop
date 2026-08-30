<!doctype html>
<html id="html" dir="rtl" class="h-full" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page_title ?? config('app.site_title') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

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
            <x-heroicon-s-x-circle class="size-20 text-error mx-auto" />
            <h3 class="text-lg text-center font-bold text-error">خطا!</h3>
            <p class="py-4 text-center">{{ session('error') }}</p>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
    <dialog id="success_dialog" class="modal">
        <div class="modal-box bg-base-300">
            <x-heroicon-s-check-circle class="size-20 text-success mx-auto" />
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
            <x-heroicon-s-exclamation-triangle class="size-20 text-warning mx-auto" />
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

    @stack('footer_js')
</body>

</html>
