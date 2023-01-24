<?php

namespace Database\Factories;

use App\Models\Delivery;
use App\Models\Route;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Route>
 */
class RouteFactory extends Factory
{
    public function configure()
    {
        return $this->afterCreating(function (Route $route) {
            $deliveryType = rand(1, 2);
            if ($deliveryType == 1) {
                return $route->deliveries()->saveMany(Delivery::factory()->liquid()
                    ->hasDeliveryLines(3)->count(10)->create(['route_id' => $route->id]));
            }
            $route->deliveries()->saveMany(Delivery::factory()->material()
                ->hasDeliveryLines(3)->count(10)->create(['route_id' => $route->id]));
        });
    }

    public function definition()
    {
        return [
            'date' => fake()->date(),
            'car_number' => fake()->randomNumber(8),
            'status' => fake()->numberBetween(1, 3),
            'driver_name' => fake()->name(),
        ];
    }
}
