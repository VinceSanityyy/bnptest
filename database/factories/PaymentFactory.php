<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Loan;
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => Loan::all()->random()->user_id,
            'amount' => $this->faker->numerify('####.##'),
            'payment_date' => \Carbon\Carbon::now()->subDays(rand(0, 100))->format('Y-m-d')
        ];
    }
}
