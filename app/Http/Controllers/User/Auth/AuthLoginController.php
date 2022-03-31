<?php

namespace App\Http\Controllers\User\Auth;

use App\Exceptions\Common\LoginException;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Auth\AuthLoginRequest;
use App\Http\Resources\User\Auth\LoginResource;
use App\Services\User\Auth\AuthService;

class AuthLoginController extends Controller
{
    /**
     * @param AuthLoginRequest $request
     * @return LoginResource
     * @throws LoginException
     */
    public function __invoke(AuthLoginRequest $request): LoginResource
    {
        return AuthService::login($request->validated());
    }
}
