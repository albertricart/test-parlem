<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'docType' => 'nif',
            'docNum' => fake()->dni(),
            'email' => fake()->unique()->safeEmail(),
            'customerId' => fake()->unique()->randomNumber(4),
            'givenName' => fake()->firstName(),
            'familyName1' => fake()->lastName(),
            'phone' => fake()->mobileNumber(),
        ];
    }
}
