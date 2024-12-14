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

        $userIds = User::pluck('id')->shuffle();

        // Seed mahasiswa_barus table
        for ($index = 0; $index < 10; $index++) {
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
                'pilihan_program_studi' => $faker->randomElement(['informatika', 'sistem-informasi']),
                'waktu_kuliah_pilihan' => $faker->randomElement(['Pagi', 'Sore']),
                'is_verified' => 0,
                'user_id' => $userIds[$index], // Assign a unique user ID for each record
            ]);
        }
    }
}
