<?php

namespace Database\Factories;

use App\Models\Promotion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Promotion>
 */
class PromotionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $quota = $this->faker->numberBetween(1, 200);

        return [
            'code' => $this->faker->unique()->regexify('[A-Z]{' . Promotion::CODE_LENGTH . '}'),
            'amount' => $this->faker->numberBetween(0, 9999),
            'quota' => $quota,
            'remained_quota' => $quota,
            'start_date' => now(),
            'end_date' => now()
        ];
    }
}
