<?php

namespace App\Repositories;

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
}
