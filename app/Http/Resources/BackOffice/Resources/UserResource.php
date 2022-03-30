<?php

namespace App\Http\Resources\BackOffice\Resources;

use App\Http\Resources\BaseResource;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use JsonSerializable;

/**
 * @property $id
 * @property $user_name
 * @property $first_name
 * @property $last_name
 * @property $email
 * @property $wallet
 */
class UserResource extends BaseResource
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
            'user_name' => $this->user_name,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'wallet' => new WalletResource($this->wallet)
        ];
    }
}
