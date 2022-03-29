<?php

namespace App\Exceptions\BackOffice;

use App\Exceptions\BaseException;
use Illuminate\Http\JsonResponse;

abstract class BaseBackOfficeException extends BaseException
{
    private const BACK_OFFICE_ERROR_CODE_PREFIX = 'BACK_OFFICE_';

    /**
     * @return JsonResponse
     */
    public function render(): JsonResponse
    {
        return response()->json([
            'error' => true,
            'message' => $this->getMessage(),
            'status_code' => $this->getStatusCode(),
            'error_code' => self::BACK_OFFICE_ERROR_CODE_PREFIX . $this->getErrorCode()
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
