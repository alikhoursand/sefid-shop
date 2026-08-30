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
