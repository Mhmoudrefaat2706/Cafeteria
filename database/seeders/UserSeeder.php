<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Bob Smith',
                'email' => 'bob@example.com',
                'password' => Hash::make('password'),
                'image' => 'https://source.unsplash.com/200x200/?man',
                'room_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'remember_token' => 'laravelproject123123',
                'email_verified_at' => now(),
                'ext_num' => 20012025,

            ],
            [
                'name' => 'Charlie Brown',
                'email' => 'charlie@example.com',
                'password' => Hash::make('password'),
                'image' => 'https://source.unsplash.com/200x200/?guy',
                'room_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
                'remember_token' => 'laravelproject123123',
                'email_verified_at' => now(),
                'ext_num' => 20012025,

            ],
            [
                'name' => 'Diana Prince',
                'email' => 'diana@example.com',
                'password' => Hash::make('password'),
                'image' => 'https://source.unsplash.com/200x200/?girl',
                'room_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
                'remember_token' => 'laravelproject123123',
                'email_verified_at' => now(),
                'ext_num' => 20012025,

            ],
            [
                'name' => 'Ethan Clark',
                'email' => 'ethan@example.com',
                'password' => Hash::make('password'),
                'image' => 'https://source.unsplash.com/200x200/?man-face',
                'room_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'remember_token' => 'laravelproject123123',
                'email_verified_at' => now(),
                'ext_num' => 20012025,
            ],
        ]);
    }
}
