<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


     protected $model = Payment::class;

    public function definition()
    {
        $customerNumbers = Customer::pluck('customerNumber')->toArray();


        return [
            'customerNumber' => $this->faker->randomElement($customerNumbers), 
            'checkNumber' => $this->faker->unique()->numberBetween(1000, 9999), 
            'paymentDate' => $this->faker->date(),
            'amount' => $this->faker->randomFloat(2, 100, 10000),
        ];
    }
}
