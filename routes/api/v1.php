<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Support\Facades\Route;

Route::middleware(['auth:api'])->group(function() {
    Route::prefix('/menus')->name('menus.')->group(function() {
        Route::prefix('/permissions')->name('permissions.')->group(function() {
            Route::apiResource('types', Menu\Permission\TypeController::class);
        });

        Route::apiResource('permissions', Menu\Permission\PermissionController::class);
    });

    Route::prefix('/users')->name('users.')->group(function() {
        Route::apiResource('roles', User\RoleController::class);
        Route::apiResource('roles.menuPermissions', User\RoleController::class)->except(['show', 'update']);
    });

    Route::apiResource('menus', Menu\MenuController::class);
    Route::apiResource('users', User\UserController::class);
});
