<?php

namespace App\Classes\User;

use App\Models\User\User;
use App\Models\User\UserLoginAttempt;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as Req;

class AuthHelper
{
    public static function loginOrRegister($phone)
    {
        $user = User::firstOrCreate(
            ['phone' => $phone],
            [
                'role' => User::ROLE_USER,
                'status' => User::STATUS_ACTIVE,
            ]
        );

        Auth::login($user);
    }

    public function checkLoginAttempts($phone)
    {
        $attempts = UserLoginAttempt::where('phone', $phone)->get();

        $login_attempt_counter = 0;

        foreach ($attempts as $attempt) {
            if (Carbon::parse($attempt->time)->diffInMinutes() <= UserLoginAttempt::LOGIN_ATTEMPT_TIMESPAN) {
                $login_attempt_counter++;
            }
        }

        if ($login_attempt_counter < UserLoginAttempt::MAX_LOGIN_ATTEMPTS) {
            $this->addAttempt($phone);
            return true;
        } else {
            return false;
        }
    }

    public function addAttempt($phone)
    {
        $user_login_attempt = new UserLoginAttempt();

        $user_login_attempt->phone = $phone;
        $user_login_attempt->time = Carbon::now();
        $user_login_attempt->ip = Req::ip();
        $user_login_attempt->save();
    }

    public function deleteAttempts($phone)
    {
        $attempts = UserLoginAttempt::where('phone', $phone)->get();

        foreach ($attempts as $attempt) {
            if (Carbon::parse($attempt->time)->diffInMinutes() >= 60) {
                $attempt->delete();
            }
        }
    }
}
