<!doctype html>
<html lang="fa" dir="rtl" class="bg-base-200 h-full" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$page_title ?? config('app.site_title') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('header_scripts')

</head>
<body class="bg-base-200 h-full relative">

@include('components.main.navbar')

@yield('content')

    {{-- js --}}

<script>
    document.addEventListener('DOMContentLoaded', function () {

        @error('action')
        window.notyf.error('{{$message}}');
        @enderror

        @if (session('success'))
        window.notyf.success(@json(session('success')));
        @endif

        @if (session('error'))
        window.notyf.error(@json(session('error')));
        @endif
    });
</script>

@stack('footer_scripts')

</body>
</html>
