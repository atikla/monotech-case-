<?php

namespace Database\Factories;

use App\Models\Promotion;
use App\Models\PromotionUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class PromotionUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'promotion_id' => Promotion::inRandomOrder()->first()->id
        ];
    }
}
