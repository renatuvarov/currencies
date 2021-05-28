<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CurrencyController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(static function () {
    Route::get('currencies', [CurrencyController::class, 'index'])->name('currencies');
    Route::get('currency/{currency}', [CurrencyController::class, 'currency'])->name('currencies');
});

Route::post('login', [AuthController::class, 'auth']);
