<?php

namespace Database\Factories;

use App\Models\Frame;
use Illuminate\Database\Eloquent\Factories\Factory;

class FrameFactory extends Factory
{
    protected $model = Frame::class;

    public function definition(): array
    {
    	return [
    	    'name' => $this->faker->name,
            'description' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['active','inactive']),
            'stock' => $this->faker->randomDigit(),
            'price' => $this->faker->randomNumber(2),
            'currency' => 'USD',
    	];
    }
}
