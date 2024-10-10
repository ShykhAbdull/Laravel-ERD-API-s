<?php

namespace Database\Factories;

use App\Models\Office;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    protected $model = \App\Models\Employee::class;

    public function definition()
    {
        return [
            'employeeNumber' => $this->faker->unique()->numberBetween(1000, 9999),
            'lastName' => $this->faker->lastName,
            'firstName' => $this->faker->firstName,
            'extension' => $this->faker->numberBetween(100,900),
            'email' => $this->faker->unique()->safeEmail,
            'officeCode' => Office::inRandomOrder()->first()->officeCode,
            'reportsTo' => $this->faker->optional()->name(), // Optionally link to another employee
            'jobTitle' => $this->faker->word,
        ];
    }
}
