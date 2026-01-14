<?php

use Illuminate\Support\Facades\Route;
use Modules\Saas\Http\Controllers\SaasAuthController;
use Modules\Saas\Http\Controllers\SaasController;

Route::prefix('saas')->group(function () {
    Route::get('login', [SaasAuthController::class, 'loginPage'])->name('saas.auth.login-page');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('saas', SaasController::class)->names('saas');
});
