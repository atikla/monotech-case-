<?php

namespace App\Exceptions\Common;

use App\Support\Str\StrSupport as Str;
use Symfony\Component\HttpFoundation\Response;

class NotFoundException extends BaseCommonException
{
    /**
     * @return int
     */
    function getStatusCode(): int
    {
        return Response::HTTP_NOT_FOUND;
    }

    function getErrorCode(): string
    {
        return Str::upperSnake(Response::$statusTexts[Response::HTTP_NOT_FOUND]);
    }
}
