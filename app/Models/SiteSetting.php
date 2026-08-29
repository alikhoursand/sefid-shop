<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $table = 'site_settings';
    protected $fillable = ['key', 'value'];
    public $timestamps = false;


    public const PRIVATE_KEYS = [
        'telegram_messenger',
        'telegram_apikey',
        'telegram_chatid'
    ];

    public const HOME_VARIABLES = [
        'show_hero',
        'show_most_sold',
        'show_categories',
        'show_banners',
        'show_newest',
        'show_faq',
        'show_services',
    ];

    public static function getWithKey($key)
    {
        return self::where('key', $key)->first()->value;
    }

    public static function getSettings()
    {
        $settings = [];
        $db_settings = self::get();


        foreach ($db_settings as $db_setting) {
            $settings[$db_setting->key] = $db_setting->value;
        }

        return $settings;
    }
}
