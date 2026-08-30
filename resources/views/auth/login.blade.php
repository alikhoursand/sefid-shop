@extends('layouts.auth')
@section('content')
    <div class="font-medium text-2xl w-full mx-auto md:mx-0 text-center">
        وارد
        حساب خود شوید
    </div>
    <div class="font-medium text-sm mt-2 opacity-75 w-full mx-auto md:mx-0 text-center">
        اطلاعات خود
        را برای دسترسی به
        حساب کاربری
        وارد کنید
    </div>
    <form id="userLogin" action="{{ route('login') }}" method="POST">
        @csrf
        <label class="w-full input block mt-10 h-12 focus-within:outline-none px-0 overflow-hidden border-2 realative">
            <input type="text" id="phone" name="phone"
                class="pr-2 pl-10 w-full grow placeholder:text-right text-left text-base input-lg" placeholder="شماره موبایل"
                value="{{ old('phone') }}" />
            <x-heroicon-s-phone class="size-6 absolute left-2.5 top-2.5 opacity-50" />
        </label>
        <div id="phoneError" class="h-4 mt-1 error text-error text-xs pr-1  font-medium">
            @error('phone')
                {{ $message }}
            @enderror
            @if (session('credential_error'))
                {{ session('credential_error') }}
            @endif
        </div>

        <button type="submit" class="mx-auto mt-2 btn btn-block btn-primary ">
            ارسال کد
        </button>
    </form>
@endsection
