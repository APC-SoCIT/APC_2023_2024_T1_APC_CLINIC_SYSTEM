<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Role;
use Faker\Generator as Faker;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $school_id = '20'.$this->faker->numberBetween(20,23) .'-'. str_pad($this->faker->randomNumber(6), 6, '0', STR_PAD_LEFT);

        return [
            'school_id' => $school_id,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
