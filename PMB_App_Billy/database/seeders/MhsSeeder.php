<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\mahasiswa_baru;
use App\Models\User;

class MhsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run()
    {
        $faker = Faker::create();

        // Seed mahasiswa_barus table
        for ($index = 0; $index < 10; $index++) {  // Change 10 to the number of records you want to create
            mahasiswa_baru::create([
                'nama' => $faker->name,
                'jenis_kelamin' => $faker->randomElement(['Laki-Laki', 'Perempuan']),
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->date,
                'kewarganegaraan' => $faker->country,
                'sekolah_asal' => $faker->company,
                'alamat' => $faker->address,
                'nomor_telp' => substr($faker->phoneNumber, 0, 15),
                'email' => $faker->unique()->safeEmail,
                'pilihan_program_studi' => $faker->word,
                'waktu_kuliah_pilihan' => $faker->randomElement(['Pagi', 'Sore']),
                'is_verified' => $faker->boolean,
                'user_id' => User::inRandomOrder()->first()->id, // Assign a random user as the owner
            ]);
        }
    }
}
