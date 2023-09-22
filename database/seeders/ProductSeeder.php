<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'category_id' => 1,
            'user_id' => 1,
            'name' => 'HTML Pemula',
            'description' => 'Kelas untuk belajar HTML dasar',
            'stock' => 50,
            'price' => 30000,
            'image' => 'belajar-html.jpg'
        ]);
        Product::create([
            'category_id' => 2,
            'user_id' => 1,
            'name' => 'MySQL Pemula',
            'description' => 'Kelas untuk belajar database MySQL',
            'stock' => 50,
            'price' => 35000,
            'image' => 'belajar-mysql.jpg'
        ]);
    }
}
