<?php

namespace Database\Factories;

use App\Models\Productline;
use App\Models\productlines;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

            // Fetch all existing product lines
    $productLines = Productline::pluck('productLine')->toArray();
        return [
                        'productCode' => $this->faker->unique()->numerify('P#####'), 
            'productName' => $this->faker->words(3, true),  
            'productLine' => $this->faker->randomElement($productLines),
            'productScale' => $this->faker->randomElement(['1:10', '1:12', '1:18', '1:24', '1:32', '1:50']),  
            'productVendor' => $this->faker->company,  
            'productDescription' => $this->faker->text(200), 
            'quantityInStock' => $this->faker->numberBetween(1, 1000),  
            'buyPrice' => $this->faker->randomFloat(2, 10, 500),  
            'MSRP' => $this->faker->randomFloat(2, 20, 1000), 

        ];
    }
}
