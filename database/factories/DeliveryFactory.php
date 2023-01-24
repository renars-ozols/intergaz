<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Delivery>
 */
class DeliveryFactory extends Factory
{
    public function liquid()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 1,
            ];
        });
    }

    public function material()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 2,
            ];
        });
    }

    public function definition()
    {
        return [
            'address_id' => Address::all()->random()->id,
            'status' => fake()->numberBetween(1, 3),
        ];
    }
}
