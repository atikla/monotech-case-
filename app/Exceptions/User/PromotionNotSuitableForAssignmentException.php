<?php

namespace App\Exceptions\User;

use App\Support\Str\StrSupport as Str;
use Symfony\Component\HttpFoundation\Response;

class PromotionNotSuitableForAssignmentException extends BaseUserException
{

    function getStatusCode(): int
    {
        return Response::HTTP_BAD_REQUEST;
    }

    function getErrorCode(): string
    {
        return Str::upperSnake(Response::$statusTexts[Response::HTTP_BAD_REQUEST] . ' PROMOTION NOT SUITABLE FOR ASSIGNMENT');
    }
}
