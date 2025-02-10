<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CarSeeder extends Seeder // Ganti "Car" jadi "CarSeeder"
{
    public function run(): void
    {
        DB::table('cars')->insert([ // Hapus "table:" dan "values:"
            [
                'name' => 'Avanza',
                'brand' => 'Toyota',
                'year' => 2022,
                'price' => 400000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Xpander',
                'brand' => 'Mitsubishi',
                'year' => 2021,
                'price' => 450000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Ertiga',
                'brand' => 'Suzuki',
                'year' => 2023,
                'price' => 400000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Panther',
                'brand' => 'Isuzu',
                'year' => 2016,
                'price' => 400000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
