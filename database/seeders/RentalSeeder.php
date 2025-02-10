<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RentalSeeder extends Seeder
{
    public function run()
    {
        DB::table('rentals')->insert([
            [
                'user_id' => 2,
                'car_id' => 1,
                'rental_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(3),
                'total_price' => 1200000,
                'status' => 'cancelled',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 2,
                'car_id' => 1,
                'rental_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(5),
                'total_price' => 2000000,
                'status' => 'completed',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 3,
                'car_id' => 3,
                'rental_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(5),
                'total_price' => 2000000,
                'status' => 'completed',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 2,
                'car_id' => 4,
                'rental_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(5),
                'total_price' => 2000000,
                'status' => 'completed',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 3,
                'car_id' => 3,
                'rental_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(5),
                'total_price' => 2000000,
                'status' => 'completed',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 2,
                'car_id' => 1,
                'rental_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(5),
                'total_price' => 2000000,
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 2,
                'car_id' => 4,
                'rental_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(5),
                'total_price' => 2000000,
                'status' => 'completed',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 3,
                'car_id' => 3,
                'rental_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(5),
                'total_price' => 2000000,
                'status' => 'completed',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 3,
                'car_id' => 4,
                'rental_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(5),
                'total_price' => 2000000,
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
