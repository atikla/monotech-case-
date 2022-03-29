<?php

namespace App\Exceptions\Common;

use App\Exceptions\BaseException;
use Illuminate\Http\JsonResponse;


abstract class BaseCommonException extends BaseException
{
    private const COMMON_ERROR_CODE_PREFIX = 'COMMON_';

    function render(): JsonResponse
    {
        return response()->json([
            'error' => true,
            'message' => $this->getMessage(),
            'status_code' => $this->getStatusCode(),
            'error_code' => self::COMMON_ERROR_CODE_PREFIX . $this->getErrorCode()
        ], $this->getStatusCode());
    }

    /**
     * @return int
     */
    abstract function getStatusCode(): int;

    /**
     * @return string
     */
    abstract function getErrorCode(): string;
}
