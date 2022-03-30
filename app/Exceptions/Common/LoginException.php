<?php

namespace App\Exceptions\Common;

use App\Support\Str\StrSupport as Str;
use Symfony\Component\HttpFoundation\Response;

class LoginException extends BaseCommonException
{
    /**
     * @return int
     */
    function getStatusCode(): int
    {
        return Response::HTTP_BAD_REQUEST;
    }

    function getErrorCode(): string
    {
        return Str::upperSnake(Response::$statusTexts[Response::HTTP_BAD_REQUEST] . ' USER_LOGIN');
    }
}
