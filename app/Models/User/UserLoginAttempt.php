<?php


namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserLoginAttempt extends Model
{
    public const MAX_LOGIN_ATTEMPTS = 55;
    public const LOGIN_ATTEMPT_TIMESPAN = 10;
    public $timestamps = false;
    protected $table = 'login_attempts';
}
