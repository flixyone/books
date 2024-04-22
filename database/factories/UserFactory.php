<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class UserFactory extends Factory
{

    public function definition()
    {
        return [
			'number_id' => $this->faker->randomNumber(9, true),
			'name' => fake()->name(),
			'last_name' => fake()->name(),
			'email' => fake()->unique()->safeEmail(),
			'password' => bcrypt(123456789), // password
			'remember_token' => Str::random(30),
		];
    }


}
