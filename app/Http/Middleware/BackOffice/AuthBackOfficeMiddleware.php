<?php

namespace App\Http\Middleware\BackOffice;

use App\Exceptions\BackOffice\BackOfficeForbiddenException;
use Closure;
use \Symfony\Component\HttpFoundation\Response as HTTP;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthBackOfficeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param string $backOfficeToken
     * @return Response|RedirectResponse
     * @throws BackOfficeForbiddenException
     */
    public function handle(Request $request, Closure $next, string $backOfficeToken)
    {
        return $request->header('token') === $backOfficeToken
            ? $next($request)
            : throw new BackOfficeForbiddenException(HTTP::$statusTexts[HTTP::HTTP_FORBIDDEN]);
    }
}
