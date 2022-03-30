<?php

namespace App\Services\User;

use App\Contracts\Repositories\UserRepositoryContract;
use App\Exceptions\Common\LoginException;
use App\Http\Resources\User\Auth\LoginResource;
use App\Http\Resources\User\Auth\RegisterResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    /**
     * @var UserRepositoryContract
     */
    private UserRepositoryContract $userRepositoryContract;

    public function __construct(UserRepositoryContract $userRepositoryContract)
    {
        $this->userRepositoryContract = $userRepositoryContract;
    }

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

    /**
     * @param array $data
     * @return RegisterResource
     */
    public function register(array $data): RegisterResource
    {
        /** @var User $user */
        $user = $this->userRepositoryContract->create($data);

        return new RegisterResource(['token' => $user->createToken('api-token')->plainTextToken]);
    }
}
