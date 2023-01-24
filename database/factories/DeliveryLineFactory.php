<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DeliveryLine>
 */
class DeliveryLineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'item' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 1, 100),
            'qty' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}
