<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PromotionUser extends Pivot
{
    use HasFactory;

    protected $table = 'promotion_user';
}
