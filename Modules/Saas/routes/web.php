<?php

use Illuminate\Support\Facades\Route;
use Modules\Saas\Http\Controllers\SaasAuthController;
use Modules\Saas\Http\Controllers\SaasController;

Route::prefix('saas')->group(function () {
    // Guest Routes
    Route::middleware(['guest:saas'])->group(function () {
        Route::get('login', [SaasAuthController::class, 'loginPage'])->name('saas.login');
        Route::post('login', [SaasAuthController::class, 'login'])->name('saas._login');
    });

    // Authenticated Routes
    Route::middleware(['auth:saas', 'verified'])->group(function () {
        Route::post('logout', [SaasAuthController::class, 'logout'])->name('saas.logout');
    });
});

Route::middleware(['auth:saas'])->group(function () {
    Route::resource('saas', SaasController::class)->names('saas');
});
