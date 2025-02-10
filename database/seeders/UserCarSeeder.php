<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserCarSeeder extends Seeder
{
    public function run()
    {
        // DB::table('user_car')->insert([
        //     [
        //         'name' => 'User Car 1',
        //         'email' => 'slashed2@gmail.com',
        //         'password' => bcrypt('password123'),
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'name' => 'User Car 2',
        //         'email' => 'trushed1@gmail.com',
        //         'password' => bcrypt('password456'),
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'name' => 'User Car 3',
        //         'email' => 'dracko5@gmail.com',
        //         'password' => bcrypt('password456'),
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ]
        // ]);
    }
}
