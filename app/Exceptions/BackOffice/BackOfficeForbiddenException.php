<?php

namespace App\Exceptions\BackOffice;


use App\Support\Str\StrSupport as Str;
use Symfony\Component\HttpFoundation\Response;

class BackOfficeForbiddenException extends BaseBackOfficeException
{
    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return Response::HTTP_FORBIDDEN;
    }

    /**
     * @return string
     */
    function getErrorCode(): string
    {
       return Str::upperSnake(Response::$statusTexts[Response::HTTP_FORBIDDEN]);
    }
}
