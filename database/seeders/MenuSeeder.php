<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::create([
            'category_id' => 1,
            'canteen_id' => 1,
            'name' => 'Ayam Goreng',
            'slug' => 'ayam-goreng',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, in!',
            'price' => 15000,
            'image' => 'nasi.jpg',
        ]);

        Menu::create([
            'category_id' => 2,
            'canteen_id' => 1,
            'name' => 'Mie Ayam',
            'slug' => 'mie-ayam',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, in!',
            'price' => 12000,
            'image' => 'mie.jpg',
        ]);

        Menu::create([
            'category_id' => 3,
            'canteen_id' => 1,
            'name' => 'Es Teh',
            'slug' => 'es-teh',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, in!',
            'price' => 5000,
            'image' => 'minuman.jpg',
        ]);
    }
}
