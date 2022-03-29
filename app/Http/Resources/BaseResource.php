<?php

namespace App\Http\Resources;

use App\Support\Resources\ResourceSupport;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

class BaseResource extends JsonResource
{
    /**
     * @param $request
     * @return string[]
     */
    public function with($request): array
    {
        return ResourceSupport::baseResource();
    }
}
