<?php

// Author:  Chiam Yee Hang

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $first_name = $this->faker->unique()->firstName();
        $last_name = $this->faker->unique()->lastName();
        $email = $first_name . '@email.com';

        return [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ];
    }
}
