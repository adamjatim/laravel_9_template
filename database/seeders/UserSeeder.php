<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'role' => 'admin',
                'password' => Hash::make('rahasia'),
            ],
            [
                'name' => 'User Car 1',
                'email' => 'slashed2@gmail.com',
                'email_verified_at' => now(),
                'role' => 'user',
                'password' => bcrypt('password123'),
            ],
            [
                'name' => 'User Car 2',
                'email' => 'trushed1@gmail.com',
                'email_verified_at' => now(),
                'role' => 'user',
                'password' => bcrypt('password456'),
            ],
            [
                'name' => 'User Car 3',
                'email' => 'dracko5@gmail.com',
                'email_verified_at' => now(),
                'role' => 'user',
                'password' => bcrypt('password456'),
            ]
        ]);
    }
}
