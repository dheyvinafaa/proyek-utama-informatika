<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Canteen;

class CanteenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Canteen::create([
            'user_id' => 2,
            'name' => 'Kantin 1',
            'slug' => 'kantin-1',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, in!',
            'image' => 'kantin.png',
        ]);

        Canteen::create([
            'user_id' => 3,
            'name' => 'Kantin 2',
            'slug' => 'kantin-2',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, in!',
            'image' => 'kantin.png',
        ]);

        Canteen::create([
            'user_id' => 4,
            'name' => 'Kantin 3',
            'slug' => 'kantin-3',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, in!',
            'image' => 'kantin.png',
        ]);

        Canteen::create([
            'user_id' => 5,
            'name' => 'Kantin 4',
            'slug' => 'kantin-4',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, in!',
            'image' => 'kantin.png',
        ]);

        Canteen::create([
            'user_id' => 6,
            'name' => 'Kantin 5',
            'slug' => 'kantin-5',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, in!',
            'image' => 'kantin.png',
        ]);
    }
}
