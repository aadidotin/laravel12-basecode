<?php

use Illuminate\Support\Facades\Route;
use Modules\Saas\Http\Controllers\SaasController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('saas', SaasController::class)->names('saas');
});
