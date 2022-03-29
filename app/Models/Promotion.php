<?php

namespace App\Models;

use App\Contracts\Constants;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Promotion extends Model
{
    use HasFactory, SoftDeletes;

    public const CODE_LENGTH = 12;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'amount',
        'quota',
        'remained_quota',
        'start_date',
        'end_date'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'start_date' => 'datetime:' . Constants::FORMATTED_DATE,
        'end_date' => 'datetime:' . Constants::FORMATTED_DATE
    ];

    /**
     * Interact with the promotion's code.
     *
     * @return Attribute
     */
    protected function code(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Str::upper($value),
            set: fn ($value) => Str::upper($value)
        );
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->using(PromotionUser::class);
    }
}
