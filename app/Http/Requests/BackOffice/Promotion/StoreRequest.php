<?php

namespace App\Http\Requests\BackOffice\Promotion;

use App\Exceptions\Validation\BackOffice\BackOfficePromotionStoreFailedValidationException;
use App\Models\Promotion;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

/**
 * @property $start_date
 * @property $end_date
 * @property $amount
 * @property $quota
 * @property $code
 * @property $remained_quota
 */
class StoreRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $this->merge([
            'remained_quota' => $this->quota,
            'code' => $this->code ?? Str::random(Promotion::CODE_LENGTH)
        ]);
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @param Validator $validator
     * @return void
     * @throws BackOfficePromotionStoreFailedValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        $exception = new BackOfficePromotionStoreFailedValidationException('Validation Error');

        $exception->setValidationErorrs($validator->getMessageBag()->all());

        throw $exception;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'start_date' => ['required', 'date', 'date_format:Y-m-d H:i'],
            'end_date' => ['required', 'date', 'date_format:Y-m-d H:i', 'after:start_date'],
            'amount' => ['required', 'integer', 'min:1'],
            'quota' => ['required', 'integer', 'min:1'],
            'remained_quota' => ['required', 'same:quota'],
            'code' => ['required', 'unique:promotions,code', 'size:' . Promotion::CODE_LENGTH],
        ];
    }
}
