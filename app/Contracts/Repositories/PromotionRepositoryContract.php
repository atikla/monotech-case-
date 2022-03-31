<?php

namespace App\Contracts\Repositories;

use App\Models\Promotion;

interface PromotionRepositoryContract
{
    /**
     * @param string $code
     * @return Promotion|null
     */
    public function findByCodeForAssignment(string $code): ?Promotion;
}
