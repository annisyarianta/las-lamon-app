<?php

use App\Http\Controllers\Adopter\OrderController as AdopterOrderController;
use App\Http\Controllers\Adopter\CartController as AdopterCartController;
use App\Http\Controllers\Adopter\CheckoutController as AdopterCheckoutController;
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

// dashboard
Route::middleware('auth')->group(function () {
    Route::get('/superadmin', fn() => 'Superadmin Dashboard');
    Route::get('/lsm', fn() => 'LSM Dashboard');
    Route::get('/home', fn() => 'Adopter Dashboard');
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
    // Route::get('/home', function () {
    //     return "Adopter Dashboard";
    // });

    Route::prefix('cart')->name('adopter.cart.')->group(function () {
        Route::get('/', [AdopterCartController::class, 'index'])->name('index');
        Route::post('/create', [AdopterCartController::class, 'store'])->name('store');
        Route::get('/{id}', [AdopterCartController::class, 'show'])->name('show');
        Route::post('/{id}/update', [AdopterCartController::class, 'update'])->name('update');
        Route::delete('/{id}/delete', [AdopterCartController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('order')->name('adopter.order.')->group(function () {
        Route::get('/', [AdopterOrderController::class, 'index'])->name('index');
        Route::post('/create', [AdopterOrderController::class, 'store'])->name('store');
        Route::get('/{id}', [AdopterOrderController::class, 'show'])->name('show');
        Route::post('/{id}/update', [AdopterOrderController::class, 'update'])->name('update');
        Route::delete('/{id}/delete', [AdopterOrderController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('checkout')->name('adopter.checkout.')->group(function () {
        Route::get('/', [AdopterCheckoutController::class, 'index'])->name('index');
        Route::post('/create', [AdopterCheckoutController::class, 'store'])->name('store');
    });

});
