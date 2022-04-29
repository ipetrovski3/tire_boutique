<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompaniesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'address' => $this->faker->address(),
            'tax_number' => $this->faker->creditCardNumber(),
            'edb' => $this->faker->creditCardNumber(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->companyEmail(),
            'town' => $this->faker->city(),
            'post_code' => $this->faker->postcode()
        ];
    }
}
