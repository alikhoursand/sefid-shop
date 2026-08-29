<?php


namespace App\Classes;

use App\Models\SiteSetting;
use App\Models\StateCity;

class SiteHelper
{
    public static function getCities($state_id)
    {
        return StateCity::where('parent_id', $state_id)->get();
    }

    public static function getStates()
    {
        return StateCity::where('parent_id', null)->get();
    }

    public static function getSetting($key)
    {
        return SiteSetting::where('key', $key)->first()->value;
    }

    public static function getAllSetting($privates = true, $home_variables = true)
    {
        $settings = SiteSetting::select('key', 'value')->get();

        $settings_array = [];

        foreach ($settings as $item) {
            if ($privates === true && $home_variables === true) {
                $settings_array[$item->key] = $item->value;
            } else {
                if (!$privates && !in_array($item->key, SiteSetting::PRIVATE_KEYS)) {
                    $settings_array[$item->key] = $item->value;
                }

                if (!$home_variables && !in_array($item->key, SiteSetting::HOME_VARIABLES)) {
                    $settings_array[$item->key] = $item->value;
                }
            }

        }

        return $settings_array;
    }
}
