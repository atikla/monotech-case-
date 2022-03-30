<?php

namespace App\Http\Requests\User\Auth;

use App\Exceptions\Validation\User\Auth\UserLoginValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class AuthLoginRequest extends FormRequest
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
     * @throws UserLoginValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        $exception = new UserLoginValidationException('Validation Error');

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
            'user_name' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6']
        ];
    }
}
