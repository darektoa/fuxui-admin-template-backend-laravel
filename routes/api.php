<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/users', function (Request $request) {
    return 'USER';
})->middleware('auth:api');

Route::get('/callback', function() {
   dd(request()->all());
    return 'CALLBACK';
});

Route::get('/login', fn() => 'LOGIN')->name('login');
Route::post('/login', function($request) {
    $credentials = $request->only(['username', 'password']);

    Auth::guard('web')->attempt($credentials);
    return 'OK';
})->name('login.post');

Route::middleware('auth:api')->group(function() {

});
