<?php

namespace Database\Factories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'user_id' => $this->faker->unique()->numberBetween(1,20),
                'loan_amount' => $this->faker->numerify('######.##'),
                'isClear' => 0,
        ];
    }
}
