<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Office>
 */
class OfficeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'officeCode' => $this->faker->unique()->word(),
            'city' => $this->faker->city,
            'phone' => $this->faker->phoneNumber,
            'addressLine1' => $this->faker->address,
            'addressLine2' => $this->faker->optional()->secondaryAddress,
            'state' => $this->faker->state,
            'country' => $this->faker->country,
            'postalCode' => $this->faker->postcode,
            'territory' => $this->faker->word,
        ];
    }
}
