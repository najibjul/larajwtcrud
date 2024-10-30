<?php

use Illuminate\Http\Request;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

/**
 * route "/register"
 * @method "POST"
 */
Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');

/**
 * route "/login"
 * @method "POST"
 */
Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');

/**
 * route "/user"
 * @method "GET"
 */
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:api'])->group(function () {
    Route::get('/users', [App\Http\Controllers\Api\UserController::class,'index']);
    Route::post('/users', [App\Http\Controllers\Api\UserController::class,'store']);

    Route::post('/logout', App\Http\Controllers\Api\LogoutController::class)->name('logout');
});

/**
 * route "/logout"
 * @method "POST"
 */
