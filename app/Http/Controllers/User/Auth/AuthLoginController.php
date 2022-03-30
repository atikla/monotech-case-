<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Auth\AuthLoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthLoginController extends Controller
{

    public function __invoke(AuthLoginRequest $request): JsonResponse
    {
        if (!Auth::attempt($request->validated())) {
            dd('omg');
        }

        return response()->json([
            'token' => auth()->user()->createToken('API Token')->plainTextToken
        ]);
    }
}
