<?php

namespace Database\Seeders;

use Attribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Dokter',
            'email' => 'dokter@gmail.com',
            'role' => 'dokter',
            'password' => bcrypt('dokter123'),
        ]);

        User::create([
            'name' => 'Pasien',
            'email' => 'pasien@gmail.com',
            'role' => 'pasien',
            'password' => bcrypt('pasien123'),
        ]);
    }
}
