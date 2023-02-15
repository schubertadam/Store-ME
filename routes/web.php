<?php

use App\Http\Controllers\Authenticate\AuthController;
use Illuminate\Support\Facades\Route;


Route::resource('/login', AuthController::class)->only(['index', 'store']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', function () {
    return "Dashboard";
})->name('dashboard');
