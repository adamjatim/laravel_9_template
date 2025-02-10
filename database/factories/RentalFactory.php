<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Rental;
use App\Models\UserCar;
use App\Models\Car;

class RentalFactory extends Factory
{
    protected $model = Rental::class;

    public function definition()
    {
        return [
            'user_id' => UserCar::factory(),
            'car_id' => Car::factory(),
            'rental_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'total_price' => $this->faker->numberBetween(300000, 2000000),
            'status' => $this->faker->randomElement(['active', 'completed', 'cancelled']),
        ];
    }
}
