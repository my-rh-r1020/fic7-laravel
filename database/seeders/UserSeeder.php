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
            'role_id' => 1,
            'name' => 'Super Admin 1',
            'email' => 'superadm1@gmail.com',
            'password' => bcrypt('super-adm01')
        ]);
        User::create([
            'role_id' => 2,
            'name' => 'Admin 1',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('admin-coba1')
        ]);
        User::create([
            'role_id' => 3,
            'name' => 'User 1',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('user-coba1')
        ]);
    }
}
