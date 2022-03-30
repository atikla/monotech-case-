<?php

namespace App\Services\User;

use App\Exceptions\Common\LoginException;
use App\Http\Resources\User\Auth\LoginResource;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    /**
     * @param array $credentials
     * @return LoginResource
     * @throws LoginException
     */
    public static function login(array $credentials): LoginResource
    {
        return !Auth::attempt($credentials)
            ? throw new LoginException('wrong user credentials')
            : new LoginResource(['token' => Auth::user()->createToken('api-token')->plainTextToken]);
    }
}
