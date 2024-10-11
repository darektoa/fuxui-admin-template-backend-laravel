<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Support\Facades\Route;

Route::middleware(['auth:api'])->group(function() {
    Route::prefix('/menus')->name('menus.')->group(function() {
        Route::apiResource('permissions', Menu\Permission\PermissionController::class);
    });

    Route::prefix('/users')->name('users.')->group(function() {
        Route::apiResource('roles', User\RoleController::class);
    });

    Route::apiResource('menus', Menu\MenuController::class);
    Route::apiResource('users', User\UserController::class);
});
