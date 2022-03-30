<?php

namespace App\Http\Middleware;

use App\Exceptions\Common\UnauthenticatedException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @return string|null
     * @throws UnauthenticatedException
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }

        throw new UnauthenticatedException('Unauthenticated');
    }
}
