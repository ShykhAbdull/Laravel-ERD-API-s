<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductLine>
 */
class ProductLineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "productLine" => $this->faker->unique()->word,
            "textDescription" => $this->faker->paragraph(),
            "htmlDescription" => $this->faker->randomHtml(2,3),
            "image" => $this->faker->imageUrl()
        ];
    }
}
