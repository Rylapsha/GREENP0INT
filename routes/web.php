<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KelolaController;
use App\Http\Controllers\DashboardController;

//
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//register
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'registerProses'])->name('registerProses');


Route::middleware('isLogin')->group(
    function () {
        //login
        Route::get('login', [AuthController::class, 'login'])->name('login');
        Route::post('login', [AuthController::class, 'loginProses'])->name('loginProses');
    });



Route::middleware('checkLogin')->group(function () {

    //dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('kelola', [KelolaController::class, 'index'])->name('kelola');

    Route::middleware(['auth'])->group(function () {
        Route::get('profile', [DashboardController::class, 'profile'])->name('profile/edit');
        Route::post('profile', [DashboardController::class, 'updateProfile'])->name('profile.update');
        Route::get('kelola/setor', [KelolaController::class, 'setor'])->name('setor/index');
        Route::post('kelola/setor', [KelolaController::class, 'setor'])->name('setor/proses');
    });

    //AKSES HANYA ADMIN
    Route::middleware('isAdmin')->group(function () {
        //user
        Route::get('user', [UserController::class, 'index'])->name('user');
        Route::get('user/create', [UserController::class, 'create'])->name('userCreate');
        Route::post('user/store', [UserController::class, 'store'])->name('userStore');
        Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('userEdit');
        Route::post('user/update/{id}', [UserController::class, 'update'])->name('userUpdate');
        Route::delete('user/destroy/{id}', [UserController::class, 'destroy'])->name('userDestroy');

        //kelola    

        Route::get('kelola/create', [KelolaController::class, 'create'])->name('kelolaCreate');
        Route::post('kelola/store', [KelolaController::class, 'store'])->name('kelolaStore');
    });
});

//logout
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//point
Route::post('kelola/verifikasi/{id}', [KelolaController::class, 'verifikasi'])->name('kelola.verifikasi');
Route::post('kelola/batal-verifikasi/{id}', [KelolaController::class, 'batalVerifikasi'])->name('kelola.batalVerifikasi');
