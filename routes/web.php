<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});


Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'handleLogin']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'handleRegister']);

Route::middleware('auth')->group(function () {
    Route::get('/homepage', [HomepageController::class, 'index']);
    Route::get('/product', [HomepageController::class, 'product']);
    Route::get('/product/{barang}', [HomepageController::class, 'detailProduct']);
});
