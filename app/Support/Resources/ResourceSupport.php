<?php

namespace App\Support\Resources;

use Symfony\Component\HttpFoundation\Response;

class ResourceSupport
{
    /**
     * @return array
     */
    public static function baseResource(): array
    {
        return [
            'success' => true,
            'message' => Response::$statusTexts[Response::HTTP_OK]
        ];
    }
}
