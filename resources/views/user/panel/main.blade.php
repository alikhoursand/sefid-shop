@extends('layouts.panel')
@section('content')
    <section class="mt-4 md:mt-8 lg:mt-12 max-w-screen-xl mx-auto mb-12 px-2">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12 lg:col-span-3">
                <x-user-panel.sidebar></x-user-panel.sidebar>
            </div>
            <div class="col-span-12 lg:col-span-9">
                @yield('user_panel')
            </div>
        </div>
    </section>
@endsection
