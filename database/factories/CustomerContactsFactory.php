<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CustomerContacts>
 */
class CustomerContactsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => 1,
            'customer_id' => 1,
            'name' => 'Test Contact',
            'email' => 'contact@example.com',
            'dob' => '1988-10-27'
        ];
    }
}
