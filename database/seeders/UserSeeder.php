<?php

namespace Database\Seeders;

use App\Models\User\User;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('fa_IR');

        for ($i = 0; $i < 10; $i++) {
            User::create([
                'fname' => $faker->words(1, true),
                'lname' => $faker->words(1, true),
                'phone' => rand(10000000000, 99999999999),
                'status' => 1,
                'role' => 1,
                'birth' => Carbon::now()->subMonths(rand(10, 30)),
            ]);
        }
    }
}
