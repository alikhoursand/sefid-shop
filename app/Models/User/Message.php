<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    public const PRIORITY_LOW = 1;
    public const PRIORITY_MED = 2;
    public const PRIORITY_HIGH = 3;


    public const STATUS_PENDING = 1;
    public const STATUS_READ = 2;

    protected $table = 'messages';
    protected $fillable = [
        'admin_id',
        'user_id',
        'title',
        'msg',
        'status',
        'priority',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
