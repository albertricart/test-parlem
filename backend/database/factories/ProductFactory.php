<?php

namespace Database\Factories;

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
        $productNames = [
            'FIBRA 1000 ADAMO',
            'FIBRA 2000',
            'FIBRA 3000'
        ];

        return [
            'productName' => $productNames[array_rand($productNames)],
            'productTypeName' => 'ftth',
            'numeracioTerminal' => fake()->randomDigitNotZero() . fake()->randomDigitNotZero() . fake()->randomDigitNotZero(),
            'soldAt' => fake()->dateTimeBetween('-4 year'),
        ];
    }
}
