let loginForm = document.getElementById('userLogin');
if (loginForm) {
    loginForm.addEventListener('submit', function (event) {
        event.preventDefault();

        document.querySelectorAll('.error').forEach(function (error) {
            error.innerText = '';
        });

        let isValid = true;

        var phone = document.getElementById('phone');
        // var password = document.getElementById('loginPass');

        let phoneRegex = /(0?9)\d{2}\W?\d{3}\W?\d{4}/

        if (!phone.value || phone.value.length != 11 || !phoneRegex.test(phone.value)) {
            // document.getElementById('phoneError').style.display = 'block';
            document.getElementById('phoneError').innerText = 'شماره موبایل را درست وارد کنید';
            isValid = false;
        }

        // if (!password.value) {
        //     document.getElementById('passwordError').style.display = 'block';
        //     document.getElementById('passwordError').innerText = 'رمز عبور را درست وارد کنید';
        //     isValid = false;
        // }


        if (isValid) {
            this.submit();
        }
    });
}

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

    codeForm.addEventListener('submit', function (event) {
        event.preventDefault();

        document.querySelectorAll('.error').forEach(function (error) {
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
