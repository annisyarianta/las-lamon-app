<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // // Super Admin
        // User::create([
        //     'name' => 'Super Admin',
        //     'email' => 'superadmin@mail.com',
        //     'password' => Hash::make('12345678'),
        //     'role' => 'superadmin',
        // ]);

        // // LSM
        // User::create([
        //     'name' => 'User LSM',
        //     'email' => 'lsm@mail.com',
        //     'password' => Hash::make('12345678'),
        //     'role' => 'lsm',
        // ]);

        // User biasa
        User::create([
            'name' => 'Adopter',
            'email' => 'adopter@mail.com',
            'password' => Hash::make('12345678'),
            'role' => 'adopter',
        ]);
    }
}
