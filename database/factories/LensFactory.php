<?php

namespace Database\Factories;

use App\Models\Lens;
use Illuminate\Database\Eloquent\Factories\Factory;

class LensFactory extends Factory
{
    protected $model = Lens::class;

    public function definition(): array
    {
    	return [
            'colour' => $this->faker->name,
            'description' => $this->faker->sentence(),
            'prescription_type' => $this->faker->randomElement(['fashion', 'single_vision', 'varifocal']),
            'lens_type' => $this->faker->randomElement(['classic', 'blue_light', 'transition']),
            'stock' => $this->faker->randomDigit(),
            'price' => $this->faker->randomNumber(2),
            'currency' => 'USD',
    	];
    }
}
