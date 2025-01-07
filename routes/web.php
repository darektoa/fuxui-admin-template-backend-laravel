<?php

namespace App\Http\Controllers\Web;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/storages/{path}', [StorageController::class, 'show'])->where('path', '.*');
