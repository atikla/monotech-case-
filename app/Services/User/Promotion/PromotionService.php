<?php

namespace App\Services\User\Promotion;

use App\Models\Promotion;
use App\Models\User;

class PromotionService
{

    public static function assignPromotionToUser(User $user, ?Promotion $promotion): bool
    {
        if (
            empty($promotion)
            || $user->promotions()->where('promotions.id', $promotion->id)->first()
        ) {
            return false;
        }

        $user->promotions()->attach($promotion);
        $user->wallet()->update(['balance' => $user->wallet->balance + $promotion->amount]);

        --$promotion->remained_quota;
        $promotion->save();

        return true;
    }
}
