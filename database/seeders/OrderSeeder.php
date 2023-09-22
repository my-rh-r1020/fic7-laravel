<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::create([
            'user_id' => 2,
            'seller_id' => 3,
            'number' => '2388237099124156',
            'total_price' => 75000,
            'payment_status' => 1
        ]);
    }
}
