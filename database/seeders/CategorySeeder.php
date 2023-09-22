<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Front End Web',
            'description' => 'Kategori untuk jalur belajar front end web developer'
        ]);
        Category::create([
            'name' => 'Back End Web',
            'description' => 'Kategori untuk jalur belajar back end web developer'
        ]);
    }
}
