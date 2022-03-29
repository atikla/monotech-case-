<?php

namespace Database\Seeders;

use App\Models\Promotion;
use App\Models\PromotionUser;
use Illuminate\Database\Seeder;
use App\Models\Wallet;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Wallet::factory(10)->create();
        Promotion::factory(10)->create();
        PromotionUser::factory(10)->create();
    }
}
