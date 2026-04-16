<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('home');
});

Route::view('/cart', 'cart');
Route::view('/checkout', 'checkout');

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// dashboard
Route::middleware('auth')->group(function () {
    Route::get('/superadmin', fn () => 'Superadmin Dashboard');
    Route::get('/lsm', fn () => 'LSM Dashboard');
    Route::get('/home', fn () => 'Adopter Dashboard');
});

// REGISTER
Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


// DASHBOARD ROLE

Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::get('/superadmin', function () {
        return "Superadmin Dashboard";
    });
});

Route::middleware(['auth', 'role:lsm'])->group(function () {
    Route::get('/lsm', function () {
        return "LSM Dashboard";
    });
});

Route::middleware(['auth', 'role:adopter'])->group(function () {
    Route::get('/home', function () {
        return "Adopter Dashboard";
    });
});
