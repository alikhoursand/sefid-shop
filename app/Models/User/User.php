<?php

namespace App\Models\User;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\Institute\Models\Course;
use Modules\Institute\Models\UserCourse;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public const ROLE_USER = 1;
    public const ROLE_ADMIN = 2;

    public const ACCESS_ADMIN = 'admin';
    public const ACCESS_SUPERADMIN = 'superadmin';


    public const STATUS_ACTIVE = 1;


    protected $fillable = [
        'fname',
        'lname',
        'birth',
        'phone',
        'status',
        'role'
    ];

    protected $hidden = [
        'remember_token',
    ];


    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }


    public function hasRole($role)
    {

        if ($role === 'admin') {
            return $this->role === self::ROLE_ADMIN;
        }

        if ($role === 'user') {
            return $this->role === self::ROLE_USER;
        }

        return false;
    }

    public function hasAccess($access = null)
    {
        if ($access === 'admin') {
            return $this->access === self::ROLE_ADMIN;
        }

        if ($access === 'superadmin') {
            return $this->access === self::ACCESS_SUPERADMIN;
        }

        return false;
    }

}
