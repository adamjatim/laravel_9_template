<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Car;

class CarFactory extends Factory
{
    protected $model = Car::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'brand' => $this->faker->company,
            'price_per_day' => $this->faker->numberBetween(100000, 500000),
            'status' => $this->faker->randomElement(['available', 'unavailable']),
        ];
    }
}
