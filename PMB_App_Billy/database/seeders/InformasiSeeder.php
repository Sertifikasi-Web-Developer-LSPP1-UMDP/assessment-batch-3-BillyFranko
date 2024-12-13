<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Informasi;
use App\Models\User;

class InformasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        // Seed informasis table
        for ($index = 0; $index < 10; $index++) {  // Change 10 to the number of records you want to create
            Informasi::create([
                'judul' => $faker->sentence,
                'informasi' => $faker->sentence,
                'user_id' => User::inRandomOrder()->first()->id, // Assign a random user as the owner
                'lampiran_foto' => $faker->imageUrl(), // Fake image URL
            ]);
        }
    }
}
