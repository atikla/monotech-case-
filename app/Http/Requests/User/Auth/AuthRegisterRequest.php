<?php

namespace App\Http\Requests\User\Auth;

use App\Exceptions\Validation\User\Auth\UserRegisterValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class AuthRegisterRequest extends FormRequest
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
     * @throws UserRegisterValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        $exception = new UserRegisterValidationException('Validation Error');

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
            'user_name' => ['required', 'string', 'unique:users,user_name'],
            'first_name' => ['required', 'string', 'min:3'],
            'last_name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6']
        ];
    }
}
