<?php


use App\Http\Controllers\BackOffice\PromotionCodeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| back office Routes
|--------------------------------------------------------------------------
*/

Route::resource('promotion-codes', PromotionCodeController::class)
    ->only(['index', 'show', 'store']);

//Route::get('/promotion-codes/', [PromotionCodeController::class, 'index']);
//Route::get('/promotion-codes/{id}', [PromotionCodeController::class, 'show']);
//Route::post('/promotion-codes/', [PromotionCodeController::class, 'store']);
