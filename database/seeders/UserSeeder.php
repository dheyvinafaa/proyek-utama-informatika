<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'pembeli',
            'email' => 'pembeli@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'pembeli',
        ]);


        User::create([
            'username' => 'penjual1',
            'email' => 'penjual1@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'penjual',
        ]);

        User::create([
            'username' => 'penjual2',
            'email' => 'penjual2@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'penjual',
        ]);

        User::create([
            'username' => 'penjual3',
            'email' => 'penjual3@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'penjual',
        ]);

        User::create([
            'username' => 'penjual4',
            'email' => 'penjual4@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'penjual',
        ]);

        User::create([
            'username' => 'penjual5',
            'email' => 'penjual5@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'penjual',
        ]);

         User::create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);
    }
}
