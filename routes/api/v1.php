<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Support\Facades\Route;


Route::apiResource('contents', Content\ContentController::class)->only('index');
Route::apiSingleton('setting', Setting\SettingController::class)->only('show');
Route::prefix('/sign-in')->name('sign-in.')->group(function() {
    Route::post('/face', [Auth\SignInController::class, 'face']);
});
Route::prefix('/users')->name('users.')->group(function() {
    Route::get('/faces', [User\FaceController::class, 'index']);
});

Route::middleware(['auth:api'])->group(function() {
    Route::prefix('/contents')->name('contents.')->group(function() {
        Route::apiResource('directories', Content\DirectoryController::class);
        Route::apiResource('types', Content\TypeController::class);
    });

    Route::prefix('/data')->name('data.')->group(function() {
        Route::get('/menus', [Data\MenuController::class, 'index']);

        Route::prefix('/icons')->name('icons.')->group(function() {
            Route::get('/', [Data\IconController::class, 'index']);
            Route::get('/sync-from-directory', [Data\IconController::class, 'syncFromDirectory']);
        });
    });

    Route::prefix('/logs')->name('logs.')->group(function() {
        Route::apiResource('activities', Log\ActivityController::class);
    });

    Route::prefix('/menus')->name('menus.')->group(function() {
        Route::prefix('/permissions')->name('permissions.')->group(function() {
            Route::apiResource('types', Menu\Permission\TypeController::class);
        });

        Route::apiResource('permissions', Menu\Permission\PermissionController::class);
    });

    Route::prefix('/profile')->name('profile.')->group(function() {
        Route::apiResource('faces', Profile\FaceController::class)->whereUlid('face');
        Route::apiSingleton('password', Profile\PasswordController::class)->only(['update']);
        Route::apiSingleton('permissions', Profile\PermissionController::class)->only(['show']);
    });

    Route::prefix('/users')->name('users.')->group(function() {
        Route::get('/charts', [User\ChartController::class, 'index']);
        Route::apiResource('roles', User\RoleController::class);
        Route::apiResource('roles.menuPermissions', User\RoleController::class)->except(['show', 'update']);
    });

    Route::apiResource('contents', Content\ContentController::class)->except('index');
    Route::apiResource('menus', Menu\MenuController::class);
    Route::apiSingleton('profile', Profile\ProfileController::class);
    Route::apiResource('users', User\UserController::class);
    Route::apiSingleton('setting', Setting\SettingController::class)->only('update');
});
