<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < 3; $i++) {

            $banner_path = public_path("/banner$i.jpg");
            $slider_path = public_path("/slider$i.jpg");
            $banner_contents = file_get_contents($banner_path);
            $slider_contents = file_get_contents($slider_path);
            $slider_image = "slider/slider$i.jpg";
            $banner_image = "banner/banner$i.jpg";

            Storage::disk('public')->put($banner_image, $banner_contents);
            Storage::disk('public')->put($slider_image, $slider_contents);

            Banner::create([
                'position' => 'banner',
                'image' => $banner_image,
                'status' => 1,
            ]);
            Banner::create([
                'position' => 'slider',
                'image' => $slider_image,
                'status' => 1,
            ]);
        }
    }
}
