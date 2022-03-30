<?php

namespace App\Repositories;

use App\Contracts\Constants;
use App\Contracts\Repositories\PromotionRepositoryContract;
use App\Models\Promotion;

class PromotionRepository extends BaseRepository implements PromotionRepositoryContract
{
    /**
     * @param Promotion $promotion
     */
    public function __construct(Promotion $promotion)
    {
       parent::__construct($promotion);
    }

    /**
     * @param string $code
     * @return null|Promotion
     */
    public function findByCodeForAssignment(string $code): ?Promotion
    {
        return $this->model
            ->whereCode($code)
            ->where('remained_quota', '!=' , Constants::ZERO_VALUE)
            ->whereRaw('(NOW() between start_date and end_date)')
            ->first();
    }
}
