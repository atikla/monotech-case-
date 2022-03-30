<?php

use App\Http\Controllers\BackOffice\PromotionCodeController;
use App\Http\Controllers\User\Auth\AuthLoginController;
use App\Http\Controllers\User\Auth\AuthRegisterController;
use App\Http\Controllers\User\Promotion\AssignPromotionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', fn() => response()->json('welcome'))->name('home');

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user/', fn(Request $request) => $request->user())->name('get-user');

    Route::post('/assign-promotion/', AssignPromotionController::class)
        ->middleware('auth:sanctum')
        ->name('assign-promotion');
});


Route::prefix('/auth/')->name('auth.')->group(function () {

    Route::post('/login/', AuthLoginController::class)->name('login');

    Route::post('/register/', AuthRegisterController::class)->name('register');
});

Route::prefix('/backoffice/')
    ->middleware('backoffice.auth:' . env('BACK_OFFICE_AUTH_TOKEN', 'default_token'))
    ->name('backoffice.')
    ->group(function () {

        Route::apiResource('promotion-codes', PromotionCodeController::class)
            ->except(['update', 'destroy'])
            ->names('promotion_code');
    });
