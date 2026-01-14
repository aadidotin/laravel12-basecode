<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\AuthController;

// Route::middleware(['auth', 'verified'])->group(function () {
    // Route::resource('auths', AuthController::class)->names('auth');
    
// });

Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'loginPage'])->name('auth.login-page');
});
