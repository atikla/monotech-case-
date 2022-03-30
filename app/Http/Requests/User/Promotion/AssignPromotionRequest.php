<?php

namespace App\Http\Requests\User\Promotion;

use App\Exceptions\Validation\User\Promotion\UserAssignPromotionValidationException;
use App\Models\Promotion;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class AssignPromotionRequest extends FormRequest
{
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
     * @throws UserAssignPromotionValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        $exception = new UserAssignPromotionValidationException('Validation Error');

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
            'code' => ['required', 'exists:promotions', 'size:' . Promotion::CODE_LENGTH],
        ];
    }
}
