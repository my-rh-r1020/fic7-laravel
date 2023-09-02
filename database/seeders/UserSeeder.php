<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'Coba User 1',
            'email' => 'cobauser1@gmail.com',
            'password' => bcrypt('usercoba-1')
        ]);
        User::create([
            'name' => 'Coba User 2',
            'email' => 'cobauser2@gmail.com',
            'password' => bcrypt('user-coba2')
        ]);
    }
}
