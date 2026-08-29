<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SiteSettingsSeeder::class,
            ProductCategorySeeder::class,
            ProductSeeder::class,
            FaqSeeder::class,
            UserSeeder::class,
            OrderSeeder::class,
            TransactionSeeder::class,
            BannerSeeder::class,
        ]);
    }
}
