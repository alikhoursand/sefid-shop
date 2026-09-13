@extends('layouts.auth')
@section('content')
    <div class="text-center font-medium text-2xl  w-full mx-auto md:mx-0">کد
        تایید ارسال شد
    </div>
    <div class="text-center font-medium text-sm mt-2  w-full mx-auto md:mx-0">
        <span class="opacity-75">کد تایید ارسال شده به شماره موبایل {{ $phone }}
            را وارد کنید. </span>
        <a href="{{ route('login') }}" class="text-primary underline">تغییر شماره</a>
    </div>
    <form id="codeForm" action="{{ route('checkCode') }}" method="POST">
        @csrf
        <input type="hidden" name="code" id="otp">
        <input type="hidden" name="phone" value="{{ $phone }}">
        <div class="flex mb-2 gap-x-2 mt-10 justify-center w-full" dir="ltr">
            <div>
                <input autocomplete="off" autofocus type="text" maxlength="1" data-focus-input-init
                    data-focus-input-next="code-2" id="code-1"
                    class=" pin input w-12 h-12 py-3 border-2 focus:ring-0 border-base-300 focus:border-base-content focus:outline-none block flex-1 rounded-box text-center font-semibold text-lg p-2.5" />
            </div>
            <div>
                <input autocomplete="off" type="text" maxlength="1" data-focus-input-init data-focus-input-prev="code-1"
                    data-focus-input-next="code-3" id="code-2"
                    class=" pin input w-12 h-12 py-3 border-2 focus:ring-0 border-base-300 focus:border-base-content focus:outline-none block flex-1 rounded-box text-center font-semibold text-lg p-2.5" />
            </div>
            <div>
                <input autocomplete="off" type="text" maxlength="1" data-focus-input-init data-focus-input-prev="code-2"
                    data-focus-input-next="code-4" id="code-3"
                    class=" pin input w-12 h-12 py-3 border-2 focus:ring-0 border-base-300 focus:border-base-content focus:outline-none block flex-1 rounded-box text-center font-semibold text-lg p-2.5" />
            </div>
            <div>
                <input autocomplete="off" type="text" maxlength="1" data-focus-input-init data-focus-input-prev="code-3"
                    data-focus-input-next="code-5" id="code-4"
                    class=" pin input w-12 h-12 py-3 border-2 focus:ring-0 border-base-300 focus:border-base-content focus:outline-none block flex-1 rounded-box text-center font-semibold text-lg p-2.5" />
            </div>
            <div>
                <input autocomplete="off" type="text" maxlength="1" data-focus-input-init data-focus-input-prev="code-4"
                    data-focus-input-next="code-6" id="code-5"
                    class=" pin input w-12 h-12 py-3 border-2 focus:ring-0 border-base-300 focus:border-base-content focus:outline-none block flex-1 rounded-box text-center font-semibold text-lg p-2.5" />
            </div>
        </div>
        <div id="codeError" class="mt-1 h-4 text-center error text-error text-xs pr-1">
            @if (session('error'))
                <div>{{ session('error') }}</div>
            @endif
        </div>
        <div class=" w-full mx-auto md:mx-0 mt-4">
            <button type="submit" class="w-full mx-auto btn btn-primary">
                تایید
            </button>
        </div>

    </form>
@endsection


@push('footer_scripts')
    <script>
        let codeForm = document.getElementById('codeForm');
        if (codeForm) {
            const pinInputs = document.querySelectorAll('.pin');

            pinInputs.forEach((input, index) => {
                input.addEventListener('input', () => {
                    if (input.value.length >= input.maxLength) {
                        if (index < pinInputs.length - 1) {
                            pinInputs[index + 1].focus();
                        }
                    }
                });

                input.addEventListener('keydown', (event) => {
                    if (event.key === 'Backspace' && input.value === '' && index > 0) {
                        pinInputs[index - 1].focus();
                    }
                });
            });

            codeForm.addEventListener('submit', function(event) {
                event.preventDefault();

                document.querySelectorAll('.error').forEach(function(error) {
                    error.innerText = '';
                });

                let isValid = true;


                let code1 = document.getElementById('code-1').value;
                let code2 = document.getElementById('code-2').value;
                let code3 = document.getElementById('code-3').value;
                let code4 = document.getElementById('code-4').value;
                let code5 = document.getElementById('code-5').value;

                if (!code1 || !code2 || !code3 || !code4 || !code5) {
                    document.getElementById('codeError').innerText = 'کد را درست وارد کنید'
                    isValid = false;
                }

                document.getElementById('otp').value = code1 + code2 + code3 + code4 + code5;


                if (isValid) {
                    this.submit();
                }
            });


        }
    </script>
@endpush
