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
<<<<<<< HEAD
        User::create([
            'name' => 'Dokter',
=======

        User::create([
            'nama' => 'Dokter',
            'alamat' => 'Jl.Dokter No. 1',
            'no_hp' => '081225099450',
>>>>>>> e7e5b0519c966654fddd06263bc881dc9ebe0be2
            'email' => 'dokter@gmail.com',
            'role' => 'dokter',
            'password' => bcrypt('dokter123'),
        ]);

        User::create([
<<<<<<< HEAD
            'name' => 'Pasien',
=======
            'nama' => 'Pasien',
            'alamat' => 'Jl.Pasien No. 1',
            'no_hp' => '081225099450',
>>>>>>> e7e5b0519c966654fddd06263bc881dc9ebe0be2
            'email' => 'pasien@gmail.com',
            'role' => 'pasien',
            'password' => bcrypt('pasien123'),
        ]);
<<<<<<< HEAD
=======

        User::create([
            'nama' => 'Dokter Kece Brok',
            'alamat' => 'Jl.BRokuu No. 1',
            'no_hp' => '081225099450',
            'email' => 'brokuu@gmail.com',
            'role' => 'dokter',
            'password' => bcrypt('darderdor'),
        ]);
>>>>>>> e7e5b0519c966654fddd06263bc881dc9ebe0be2
    }
}
