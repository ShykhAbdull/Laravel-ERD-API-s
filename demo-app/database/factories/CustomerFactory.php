<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    public function definition()
    {
        $employeeNumbers = \App\Models\Employee::pluck('employeeNumber')->toArray();
        return [
            'customerNumber' => $this->faker->unique()->numberBetween(1000, 9999), 
            'customerName' => $this->faker->company,
            'contactLastName' => $this->faker->lastName,
            'contactFirstName' => $this->faker->firstName,
            'phone' => substr($this->faker->phoneNumber, 0, 15),
            'addressLine1' => $this->faker->streetAddress,
            'addressLine2' => $this->faker->secondaryAddress,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'postalCode' => $this->faker->postcode,
            'country' => $this->faker->country,
            'salesRepEmployeeNumber' => $this->faker->optional()->randomElement($employeeNumbers), 
            'creditLimit' => $this->faker->optional()->randomFloat(2, 1000, 10000),
        ];
    }
}
