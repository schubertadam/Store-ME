<?php

use App\Http\Controllers\Authenticate\AuthController;
use App\Http\Controllers\Authenticate\LogoutController;
use App\Http\Controllers\Authenticate\PasswordResetController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => RedirectIfAuthenticated::class], function () {
        Route::resource('{slug?}', AuthController::class)->names('login')->only(['index', 'store'])->where(['slug' => 'login']);
        Route::resource('forgot-password', PasswordResetController::class)->names('password_reset')->except('destroy', 'edit');
    });

    Route::group(['middleware' => Authenticate::class], function () {
        Route::post('logout', LogoutController::class)->name('logout');

        Route::get('dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');
    });
});

Route::get('/', function () {
    return view('welcome');
});
