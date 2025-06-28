<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Hot Drinks', 'description' => 'Warm and cozy beverages','created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Cold Drinks', 'description' => 'Refreshing iced drinks','created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Juices', 'description' => 'Fresh fruit juices','created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Sodas', 'description' => 'Carbonated soft drinks','created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Energy Drinks', 'description' => 'Boost your energy instantly','created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}
