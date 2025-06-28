<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
            [
                'date' => now(),
                'status' => 'processing',
                'amount' => 10.50,
                'notes' => 'Extra sugar in drinks',
                'room_id' => 1,
                'user_id' => 1,
                'updated_at' => now(),
                'created_at' => now(),
            ],
            [
                'date' => now(),
                'status' => 'out for delivery',
                'amount' => 7.20,
                'notes' => 'No ice in juice',
                'room_id' => 1,
                'user_id' => 2,
                'updated_at' => now(),
                'created_at' => now(),
            ],
            [
                'date' => now(),
                'status' => 'done',
                'amount' => 5.00,
                'notes' => 'Order done by user',
                'room_id' => 1,
                'user_id' => 3,
                'updated_at' => now(),
                'created_at' => now(),
            ],
            [
                'date' => now(),
                'status' => 'processing',
                'amount' => 12.75,
                'notes' => 'Urgent delivery',
                'room_id' => 1,
                'user_id' => 4,
                'updated_at' => now(),
                'created_at' => now(),
            ],
            [
                'date' => now(),
                'status' => 'done',
                'amount' => 8.60,
                'notes' => 'With straw',
                'room_id' => 1,
                'user_id' => 5,
                'updated_at' => now(),
                'created_at' => now(),
            ],
        ]);
    }
}
