<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        for ($index = 0; $index < 10; $index++) { // This will loop 10 times
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => bcrypt('12345678'), // You can use a fixed password or randomize
                'role' => 'mahasiswa',
                'is_verified' => false,
                'remember_token' => Str::random(10), // Generate a random string
            ]);
        }
    }
}
