<?php

namespace App\Exceptions\Validation;

use App\Exceptions\BaseException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


abstract class BaseValidationException extends BaseException
{
    private const VALIIDATION_ERROR_CODE_PREFIX = 'VALIIDATION_ERROR_';

    protected null|array $validationErorrs = null;

    /**
     * @return JsonResponse
     */
    public function render(): JsonResponse
    {
        return response()->json([
            'error' => true,
            'message' => $this->getMessage(),
            'status_code' => $this->getStatusCode(),
            'error_code' => self::VALIIDATION_ERROR_CODE_PREFIX . $this->getErrorCode(),
            'validation_errors' => $this->getValidationErorrs()
        ], $this->getStatusCode());
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return Response::HTTP_UNPROCESSABLE_ENTITY;
    }

    /**
     * @return array|null
     */
    public function getValidationErorrs(): ?array
    {
        return $this->validationErorrs;
    }

    /**
     * @param array|null $validationErorrs
     */
    public function setValidationErorrs(?array $validationErorrs): void
    {
        $this->validationErorrs = $validationErorrs;
    }

    /**
     * @return string
     */
    abstract function getErrorCode(): string;
}
