<?php

use App\Http\Controllers\BackOffice\PromotionCodeController;
use App\Http\Controllers\User\Auth\AuthLoginController;
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

Route::middleware('auth:sanctum')->get('/user/', function (Request $request) {
    return $request->user();
});

Route::prefix('/auth/')->name('auth.')->group(function () {
    Route::post('/login/', AuthLoginController::class)->name('login');
});

Route::prefix('/backoffice/')
    ->middleware('backoffice.auth:' . env('BACK_OFFICE_AUTH_TOKEN', 'default_token'))
    ->name('backoffice.')
    ->group(function () {

        Route::apiResource('promotion-codes', PromotionCodeController::class)
            ->except(['update', 'destroy'])
            ->names('promotion_code');

        //Route::get('/promotion-codes/', [PromotionCodeController::class, 'index']);
        //Route::get('/promotion-codes/{id}', [PromotionCodeController::class, 'show']);
        //Route::post('/promotion-codes/', [PromotionCodeController::class, 'store']);
    });
