<?php

namespace App\Classes\User;


use App\Models\User\UserOtp;
use Carbon\Carbon;

class Otp
{
    public static function sendOtp($phone)
    {
        $check_otp = UserOtp::where('phone', $phone)->first();

        if (config('app.env') == 'local') {
            $code = '12345';
        } else {
            $code = rand(10000, 99999);
        }

        if ($check_otp) {
            $last_request = Carbon::parse($check_otp->updated_at);
            $diff_from_now_sec = $last_request->diffInSeconds(Carbon::now());

            // check how many times tried
            if ($check_otp->try <= 5) {
                $wait_time = 120;
            } else {
                $wait_time = 300;
            }

            if (config('app.env') == 'local') {
                $wait_time = 0;
            }

            // if waited
            if ($diff_from_now_sec >= $wait_time) {

                // save new code
                $check_otp->update([
                    'code' => $code,
                    'try' => $check_otp->try + 1,
                ]);

                if (config('app.env') != 'local') {
                    Sms::smsPattern($phone, [
                        [
                            "name" => "VERIFICATIONCODE",
                            "value" => $code
                        ]
                    ]);
                }

                return [
                    'status' => 1,
                    'description' => 'code',
                    'time' => $wait_time,
                    'message' => 'کد تایید ارسال شد',
                ];
            } else {
                return [
                    'status' => 2,
                    'description' => 'wait',
                    'time' => round($wait_time - $diff_from_now_sec),
                    'message' => 'لطفا ' . round($wait_time - $diff_from_now_sec) . ' ثانیه تا ارسال دوباره صبر کنید',
                ];
            }
        } else {

            UserOtp::create([
                'phone' => $phone,
                'code' => $code,
                'try' => 1
            ]);

            if (config('app.env') != 'local') {
                Sms::smsPattern($phone, [
                    [
                        "name" => "VERIFICATIONCODE",
                        "value" => $code
                    ]
                ]);
            }

            return [
                'status' => 1,
                'description' => 'code',
                'time' => 120,
                'message' => 'کد تایید ارسال شد',
            ];
        }
    }

    public static function checkOtp($phone, $code)
    {
        $otp = UserOtp::where([['phone', $phone], ['code', $code]])->first();

        if ($otp) {

            $last_request_time = Carbon::parse($otp->updated_at);
            $diff_from_now_sec = $last_request_time->diffInSeconds(Carbon::now());

            if ($diff_from_now_sec >= 1800) {
                return 'expired';
            }
            return 'good';
        } else {
            return 'bad';
        }
    }
}
