<?php

namespace App\Http\Resources\BackOffice\Resources;

use App\Contracts\Constants;
use App\Http\Resources\BaseResource;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use JsonSerializable;

/**
 * @property $id
 * @property $code
 * @property $amount
 * @property $quota
 * @property $remained_quota
 * @property $start_date
 * @property $end_date
 * @property $users
 */
class PromotionResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request): array|JsonSerializable|Arrayable
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'amount' => $this->amount,
            'quota' => $this->quota,
            'remained_quota' => $this->remained_quota,
            'start_date' => $this->start_date->format(Constants::FORMATTED_DATE),
            'end_date' => $this->end_date->format(Constants::FORMATTED_DATE),
            'users' => UserRecorce::collection($this->users)
        ];
    }
}
