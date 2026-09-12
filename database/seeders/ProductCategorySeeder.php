<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            $title = "دسته‌بندی تستی $i";

            $path = public_path("/images/p$i.jpg");
            $contents = file_get_contents($path);
            $image = "shop/product/p$i.jpg";

            Storage::disk('public')->put($image, $contents);

            Category::create([
                'title' => $title,
                'slug' => str_replace(' ', '-', $title),
                'status' => 1,
                'image' => $image,
            ]);
        }
    }
}
