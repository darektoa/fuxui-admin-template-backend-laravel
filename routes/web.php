<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    $credentials = request()->only(['email', 'password']);
    Auth::guard('web')->attempt($credentials);

    return 'OK';
})->name('login.web');
