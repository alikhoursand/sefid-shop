<?php

namespace Database\Seeders;

use App\Models\Shop\Product;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            $title = "محصول تستی شماره $i";
            $price = random_int(1111111, 99999999);
            $desc = 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است';

            $path = public_path("/images/p$i.jpg");
            $contents = file_get_contents($path);
            $image = "shop/product/p$i.jpg";

            Storage::disk('public')->put($image, $contents);

            Product::create([
                'title' => $title,
                'slug' => str_replace(' ', '-', $title),
                'status' => 1,
                'code' => random_int(0, 100),
                'category_id' => random_int(1, 20),
                'desc' => $desc,
                'price' => $price,
                'off_price' => $price - (($price * random_int(1, 20)) / 100),
                'qty' => random_int(1, 20),
                'image' => $image,
            ]);
        }
    }
}
