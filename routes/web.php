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


Route::prefix('/admin')->group(function () {
    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/getUser', [UserController::class, 'getUser'])->name('user.get');
        Route::get('/user', [UserController::class, 'index']);
        Route::get('/user/create', [UserController::class, 'create']);
        Route::post('/user/create', [UserController::class, 'handleCreate']);
        Route::get('/user/edit/{user}', [UserController::class, 'edit']);
        Route::post('/user/edit/{user}', [UserController::class, 'handleEdit']);
        Route::delete('/user/delete/{user}', [UserController::class, 'delete']);

        Route::get('/getBarang', [BarangController::class, 'getBarang'])->name('barang.get');
        Route::get('/barang', [BarangController::class, 'index']);
        Route::get('/barang/create', [BarangController::class, 'create']);
        Route::post('/barang/create', [BarangController::class, 'handleCreate']);
        Route::get('/barang/edit/{barang}', [BarangController::class, 'edit']);
        Route::post('/barang/edit/{barang}', [BarangController::class, 'handleEdit']);
        Route::delete('/barang/delete/{barang}', [BarangController::class, 'delete']);
    });
});
