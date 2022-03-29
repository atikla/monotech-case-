<?php

namespace App\Exceptions;

use Illuminate\Http\JsonResponse;
use Exception;


abstract class BaseException extends Exception
{
    /**
     * @return JsonResponse
     */
    abstract function render(): JsonResponse;
}
