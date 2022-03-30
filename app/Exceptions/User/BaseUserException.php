<?php

namespace App\Exceptions\User;

use App\Exceptions\BaseException;
use Illuminate\Http\JsonResponse;

abstract class BaseUserException extends BaseException
{
    private const USER_ERROR_CODE_PREFIX = 'USER_';

    /**
     * @return JsonResponse
     */
    public function render(): JsonResponse
    {
        return response()->json([
            'error' => true,
            'message' => $this->getMessage(),
            'status_code' => $this->getStatusCode(),
            'error_code' => self::USER_ERROR_CODE_PREFIX . $this->getErrorCode()
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
