<?php

namespace Database\Seeders;

use App\Models\Shop\ProductImage;
use App\Models\Shop\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProductImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::get();
        foreach ($products as $product) {

            for ($i = 1; $i <= random_int(1, 5); $i++) {

                $path = public_path("/images/p$i.jpg");
                $contents = file_get_contents($path);
                $image = "shop/product/p$i.jpg";

                Storage::disk('public')->put($image, $contents);

                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $image,
                ]);

            }

        }
    }
}
