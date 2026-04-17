<?php

use App\Http\Controllers\Adopter\OrderController as AdopterOrderController;
use App\Http\Controllers\Lsm\OrderController as LsmOrderController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::view('/cart', 'cart')->name('cart');
Route::view('/checkout', 'checkout')->name('checkout');

Route::get('/detail-product', function () {
    return view('detail-product');
})->name('detail.product');

Route::get('/catalogue-product', function () {
    return view('catalogue');
})->name('catalogue');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// REGISTER
Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


// DASHBOARD ROLE
Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::get('/superadmin', function () {
        return "Superadmin Dashboard";
    });
});

Route::middleware(['auth', 'role:lsm'])->prefix('lsm')->group(function () {
    Route::get('/lsm', function () {
        return "LSM Dashboard";
    });

    Route::prefix('order')->group(function () {
        Route::get('/', [LsmOrderController::class, 'index']);
        Route::post('/create', [LsmOrderController::class, 'store']);
        Route::get('/{id}', [LsmOrderController::class, 'show']);
        Route::post('/{id}/update', [LsmOrderController::class, 'update']);
        Route::delete('/{id}/delete', [LsmOrderController::class, 'destroy']);
        Route::post('/{id}/confirm-order', [LsmOrderController::class, 'confirmOrder']);
    });
});

Route::middleware(['auth', 'role:adopter'])->prefix('adopter')->group(function () {
     // Home adopter
    Route::get('/', function () {
        return view('home');
    })->name('home');

    // My Forest
    Route::get('/my-forest', function () {
        return view('myforest');
    })->name('myforest');

    Route::get('/my-order', function () {
        return "My Order Page";
    });

    Route::prefix('order')->group(function () {
        Route::get('/', [AdopterOrderController::class, 'index']);
        Route::post('/create', [AdopterOrderController::class, 'store']);
        Route::get('/{id}', [AdopterOrderController::class, 'show']);
        Route::post('/{id}/update', [AdopterOrderController::class, 'update']);
        Route::delete('/{id}/delete', [AdopterOrderController::class, 'destroy']);
    });
});
