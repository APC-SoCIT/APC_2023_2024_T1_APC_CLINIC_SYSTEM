<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
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
        //$program = $this->faker->randomElement(['ABMA', 'BMMA', 'ABPsy', 'BSA', 'BSBA-BMBA', 'BSBA-FM', 'BSBA-MA', 'BSMAc', 'BSTM', 'BSTM-HRO', 'BSIT-MI', 'BSEMC-GD', 'BSCS-CS', 'BSCS-SS', 'BSCpE', 'BSECE']);
        //$year = $this->faker->randomElement(['1st', '2nd', '3rd', '4th']);
        return [
            'school_id' => $school_id,
            //'program' => $program,
            //'year' => $year,
        ];
    }

    /**
     * Indicate that the model's school id is from the faculty or staff address should be unverified.
     */
    public function worker(): Factory
    {
        return $this->state(function (array $attributes) {
            $school_id = '20'.$this->faker->numberBetween(20,23) .'-'. str_pad($this->faker->randomNumber(5), 5, '0', STR_PAD_LEFT);
            
            return [
                'school_id' => $school_id,
            ];
        });
    }

    /**
     * Indicate that the model's school id is from the faculty or staff address should be unverified.
     */
    public function school(): Factory
    {
        return $this->state(function (array $attributes) {
            $school_id = '20'.$this->faker->numberBetween(20,23) .'-'. str_pad($this->faker->randomNumber(6), 6, '0', STR_PAD_LEFT);
            //$program = $this->faker->randomElement(['ABMA', 'BMMA', 'ABPsy', 'BSA', 'BSBA-BMBA', 'BSBA-FM', 'BSBA-MA', 'BSMAc', 'BSTM', 'BSTM-HRO', 'BSIT-MI', 'BSEMC-GD', 'BSCS-CS', 'BSCS-SS', 'BSCpE', 'BSECE']);
            $year = $this->faker->randomElement(['1st', '2nd', '3rd', '4th']);
            return [
                'school_id' => $school_id,
                //'program' => $program,
                'year' => $year,
            ];
        });
    }
}
