<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            'post_cost' => 100000,
            'tax_percent' => 10,
            'telegram' => 'telegramID',
            'instagram' => 'instagramID',
            'phone1' => '012-12345678',
            'phone2' => '09123456789',
            'footer_desc' => 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز',
            'address' => 'استان، شهر، خیابان، کوچه، پلاک، طبقه',
            'telegram_apikey' => null,
            'telegram_chatid' => null,
            'telegram_messenger' => 'disabled',
            'email' => 'email@email.com',
            'show_hero' => 1,
            'show_most_sold' => 1,
            'show_categories' => 1,
            'show_banners' => 1,
            'show_newest' => 1,
            'show_faq' => 1,
            'show_services' => 1,
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::create([
                'key' => $key,
                'value' => $value,
            ]);
        }
    }
}
