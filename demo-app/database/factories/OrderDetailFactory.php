<?php

namespace Database\Factories;

use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetail>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = OrderDetail::class;

    public function definition()
    {
        $orderNumbers = \App\Models\Order::pluck('orderNumber')->toArray();
        $productCodes = \App\Models\Product::pluck('productCode')->toArray();

        return [
            'orderNumber' => $this->faker->randomElement($orderNumbers),
            'productCode' => $this->faker->randomElement($productCodes),
            'quantityOrdered' => $this->faker->numberBetween(1, 100),
            'priceEach' => $this->faker->randomFloat(2, 10, 1000),
            'orderLineNumber' => $this->faker->unique()->numberBetween(1, 1000),
        ];
    }
}
