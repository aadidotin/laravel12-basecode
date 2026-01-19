<?php

use Illuminate\Support\Facades\Route;
use Modules\Tenant\Http\Controllers\TenantController;

Route::middleware(['auth:saas', 'verified'])->group(function () {
    Route::resource('tenant', TenantController::class)->names('tenant');
});
