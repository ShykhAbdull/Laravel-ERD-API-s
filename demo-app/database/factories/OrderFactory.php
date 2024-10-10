<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Order::class;
    public function definition()
    {
        $customerNumbers = Customer::pluck('customerNumber')->toArray();

        return [
            'orderNumber' => $this->faker->unique()->numberBetween(1000000000, 9999999999),
            'customerNumber' => $this->faker->randomElement($customerNumbers),
            'orderDate' => $this->faker->date(),
            'requiredDate' => $this->faker->date(),
            'shippedDate' => $this->faker->optional()->date(),
            'status' => $this->faker->randomElement(['Shipped', 'Pending', 'Delivered']),
            'comments' => $this->faker->optional()->text(),
        ];
    }
}
