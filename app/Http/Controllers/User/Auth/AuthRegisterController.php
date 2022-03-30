<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Auth\AuthRegisterRequest;
use App\Http\Resources\User\Auth\RegisterResource;
use App\Services\User\AuthService;

class AuthRegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param AuthRegisterRequest $request
     * @param AuthService $authService
     * @return RegisterResource
     */
    public function __invoke(AuthRegisterRequest $request, AuthService $authService): RegisterResource
    {
        return $authService->register($request->validated());
    }
}
