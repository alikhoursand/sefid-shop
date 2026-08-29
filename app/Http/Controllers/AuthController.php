<?php

namespace App\Http\Controllers;

use App\Classes\Shop\CartHelper;
use App\Classes\User\AuthHelper;
use App\Classes\User\Otp;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function checkCode(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'code' => ['required', 'min:5',],
                'phone' => ['required', 'regex:/(0?9)\d{2}\W?\d{3}\W?\d{4}/']
            ],
            [
                'phone.required' => 'خطا در دریافت اطلاعات',
                'phone.regex' => 'خطا در دریافت اطلاعات',
                'code.required' => 'کد را وارد کنید',
                'code.min' => 'کد را درست وارد کنید',
            ]
        );

        if ($validator->fails()) {
            $phone = $request->phone;
            session()->flash('error', 'خطا در دریافت اطلاعات');
            return view('auth.checkCode', compact('phone'));
        }

        $otp_result = Otp::checkOtp($request->phone, $request->code);


        if ($otp_result == 'good') {
            AuthHelper::loginOrRegister($request->phone);
            CartHelper::transferItemsToDb();


            $intended = session()->pull('url.intended');

            return ($intended && str_contains($intended, '/cart'))
                ? redirect($intended)
                : redirect()->route('home');

        } else {
            session()->flash('error', 'کد وارد شده صحیح نیست');
            return view('auth.checkCode', ['phone' => $request->phone]);
        }
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'phone' => ['required', 'regex:/(0?9)\d{2}\W?\d{3}\W?\d{4}/'],
            ],
            [
                'phone.required' => 'شماره موبایل را وارد کنید',
                'phone.regex' => 'شماره موبایل را درست وارد کنید',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::where('phone', $request->phone)->first();

        if ($user && $user->status == 0) {
            return redirect()->back()->with('credential_error', 'حساب شما مسدود شده است')->withInput();
        }

        $auth_class = new AuthHelper;
        $has_normal_login_attempts = $auth_class->checkLoginAttempts($request->phone);

        if ($has_normal_login_attempts) {

            $otp = Otp::sendOtp($request->phone);

            if ($otp['status'] == 1) {
                return view('auth.checkCode', ['phone' => $request->phone]);
            } else {
                return redirect()->back()->with('credential_error', $otp['message'])->withInput();
            }
        } else {
            return redirect()->back()->with('credential_error', 'تعداد دفعات ورود شما بیشتر از حد مجاز است.')->withInput();
        }

    }
}
