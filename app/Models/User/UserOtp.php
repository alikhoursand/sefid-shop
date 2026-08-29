<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserOtp extends Model
{
    protected $table = 'user_otps';

    protected $fillable = ['phone', 'code', 'try'];
}
