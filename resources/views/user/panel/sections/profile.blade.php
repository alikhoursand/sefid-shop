@extends('user.panel.main')
@section('user_panel')
    <div class="bg-base-100 rounded-box p-4 shadow-md shadow-base-300">
        <div class="">
            <p class="font-medium flex gap-x-2 items-center lg:text-lg">
                <x-heroicon-c-user class="size-7 inline text-primary" />
                <span>اطلاعات حساب کاربری</span>
            </p>
        </div>
        <div class="mt-8">
            @if (auth()->user()->fname == null || auth()->user()->lname == null || auth()->user()->birth == null)
                <form method="post" action="{{ route('user.profile.update') }}">
                    @csrf
            @endif
            <div class="grid gap-4 grid-cols-4">
                <div class="col-span-4 md:col-span-2 xl:col-span-2 ">
                    <label for="fname" class="block mb-2 text-sm font-medium">نام</label>
                    <input type="text" id="fname" name="fname"
                        {{ auth()->user()->fname != null ? 'disabled readonly' : '' }}
                        value="{{ old('fname') ?? auth()->user()->fname }}" class="input w-full focus:outline-none"
                        placeholder="" />
                    @error('fname')
                        <span class="text-error text-sm ">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-span-4 md:col-span-2 xl:col-span-2 ">
                    <label for="lname" class="block mb-2 text-sm font-medium">نام
                        خانوادگی</label>
                    <input type="text" id="lname" name="lname"
                        {{ auth()->user()->lname != null ? 'disabled readonly' : '' }}
                        value="{{ old('lname') ?? auth()->user()->lname }}" class="input w-full focus:outline-none"
                        placeholder="" />
                    @error('lname')
                        <span class="text-error text-sm ">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-span-4 md:col-span-2 xl:col-span-2 ">
                    <label for="birth" class="block mb-2 text-sm font-medium">تاریخ
                        تولد</label>
                    <input data-jdp id="birth" name="birth" autocomplete="off" aria-haspopup="false"
                        {{ auth()->user()->birth != null ? 'disabled readonly' : '' }}
                        value="{{ old('birth') ?? auth()->user()->birth != null ? verta(auth()->user()->birth)->format('Y/m/d') : '' }}"
                        class="input w-full focus:outline-none">
                    @error('birth')
                        <span class="text-error text-sm ">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-span-4 md:col-span-2 xl:col-span-2 ">
                    <label for="birth" class="block mb-2 text-sm font-medium">موبایل</label>
                    <input id="phone" name="phone" disabled readonly class="input w-full text-left focus:outline-none"
                        value="{{ auth()->user()->phone }}">
                </div>
                <div class="col-span-4  text-left">
                    @if (auth()->user()->fname != null && auth()->user()->lname != null && auth()->user()->birth != null)
                        <button type="button" class="btn btn-primary btn-disabled">مشخصات تکمیل است</button>
                    @else
                        <button type="submit" class="btn btn-primary w-32">ثبت</button>
                    @endif
                </div>
            </div>

            @if (auth()->user()->fname == null || auth()->user()->lname == null || auth()->user()->birth == null)
                </form>
            @endif

        </div>
    </div>

    @if (auth()->user()->hasRole('admin'))
        <div class="bg-base-100 mt-6 rounded-box p-4 shadow-md shadow-base-300">
            <div class="">
                <p class="font-medium flex gap-x-2 items-center lg:text-lg">
                    <x-heroicon-s-lock-closed class="size-7 inline text-success" />
                    <span>تغییر رمز عبور</span>
                </p>
            </div>
            <div class="mt-8">
                <form action="{{ route('user.profile.password.update') }}" method="post">
                    @csrf
                    <div class="grid grid-cols-4 gap-4">
                        <div class="col-span-4 md:col-span-2 xl:col-span-2 ">
                            <label for="password" class="block mb-2 text-sm font-medium">رمز عبور جدید</label>
                            <input type="password" id="password" name="password" class="input w-full focus:outline-none"
                                placeholder="" />
                            @error('password')
                                <span class="text-error text-sm ">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-4 md:col-span-2 xl:col-span-2 ">
                            <label for="password_confirmation" class="block mb-2 text-sm font-medium">تایید رمز عبور
                                جدید</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="input w-full focus:outline-none" placeholder="" />
                            @error('password_confirmation')
                                <span class="text-error text-sm ">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success w-32 mt-4">ثبت</button>
                </form>
            </div>
        </div>
    @endif
@endsection

@push('footer_scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            jalaliDatepicker.startWatch({
                persianDigits: true,
                showTodayBtn: false,
                showEmptyBtn: false,
                hideAfterChange: false,
                showCloseBtn: true,
                maxDate: 'today',
            });
        })
    </script>
@endpush
