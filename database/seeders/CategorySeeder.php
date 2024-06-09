<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Nasi',
            'slug' => 'nasi',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, in!',
            'image' => 'nasi.jpg',
        ]);

        Category::create([
            'name' => 'Mie',
            'slug' => 'mie',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, in!',
            'image' => 'mie.jpg',
        ]);

        Category::create([
            'name' => 'Minuman',
            'slug' => 'minuman',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, in!',
            'image' => 'minuman.jpg',
        ]);

        Category::create([
            'name' => 'Jajanan',
            'slug' => 'jajanan',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, in!',
            'image' => 'jajanan.jpg',
        ]);

        Category::create([
            'name' => 'Gorengan',
            'slug' => 'gorengan',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, in!',
            'image' => 'gorengan.jpg',
        ]);
    }
}
