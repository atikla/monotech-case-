<?php

namespace App\Http\Resources\BackOffice\Resources;

use App\Contracts\Constants;
use App\Http\Resources\BaseResource;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use JsonSerializable;

/**
 * @property $id
 * @property $balance
 * @property $updated_at
 */
class WalletResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request): array|JsonSerializable|Arrayable
    {
        return [
            'id' => $this->id,
            'balance' => $this->balance,
            'updated_at' => $this->updated_at->format(Constants::FORMATTED_DATE),
        ];
    }
}
