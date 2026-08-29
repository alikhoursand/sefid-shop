<?php

namespace App\Classes\User;


use Ipe\Sdk\Facades\SmsIr;

class Sms
{
    public static function smsPattern($phone, $parameters)
    {
        $response = SmsIr::verifySend($phone, config('services.sms_ir.otp_pattern'), $parameters);
    }

}
