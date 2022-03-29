<?php

namespace App\Exceptions\Validation\BackOffice;


use App\Exceptions\Validation\BaseValidationException;
use App\Support\Str\StrSupport as Str;
use Symfony\Component\HttpFoundation\Response;

class BackOfficePromotionStoreFailedValidationException extends BaseValidationException
{
    /**
     * @return string
     */
    function getErrorCode(): string
    {
        return Str::upperSnake(Response::$statusTexts[Response::HTTP_UNPROCESSABLE_ENTITY] . ' PROMOTION_STORE');
    }
}
