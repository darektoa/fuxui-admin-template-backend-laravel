<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Support\Facades\Route;

Route::middleware(['auth:api'])->group(function() {
    Route::prefix('/contents')->name('contents.')->group(function() {
        Route::apiResource('directories', Content\DirectoryController::class);
        Route::apiResource('types', Content\TypeController::class);
    });

    Route::prefix('/menus')->name('menus.')->group(function() {
        Route::prefix('/permissions')->name('permissions.')->group(function() {
            Route::apiResource('types', Menu\Permission\TypeController::class);
        });

        Route::apiResource('permissions', Menu\Permission\PermissionController::class);
    });

    Route::prefix('/profile')->name('profile.')->group(function() {
        Route::apiSingleton('password', Profile\PasswordController::class)->only(['update']);
    });

    Route::prefix('/users')->name('users.')->group(function() {
        Route::apiResource('roles', User\RoleController::class);
        Route::apiResource('roles.menuPermissions', User\RoleController::class)->except(['show', 'update']);
    });

    Route::apiResource('contents', Content\ContentController::class);
    Route::apiResource('menus', Menu\MenuController::class);
    Route::apiSingleton('profile', Profile\ProfileController::class);
    Route::apiResource('users', User\UserController::class);
    Route::apiSingleton('setting', Setting\SettingController::class)->only('update');
});

Route::apiSingleton('setting', Setting\SettingController::class)->only('show');
