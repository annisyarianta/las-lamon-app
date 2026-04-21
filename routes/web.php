<?php

use App\Http\Controllers\Adopter\OrderController as AdopterOrderController;
use App\Http\Controllers\Adopter\CartController as AdopterCartController;
use App\Http\Controllers\Adopter\CheckoutController as AdopterCheckoutController;
use App\Http\Controllers\Lsm\OrderController as LsmOrderController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\KatalogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::view('/cart', 'cart')->name('cart');
Route::view('/checkout', 'checkout')->name('checkout');

Route::get('/detail-product', function () {
    return view('detail-product');
})->name('detail.product');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::view('/myorder', 'myorder');
Route::view('/detail-unpaid', 'detail-unpaid');
Route::view('/detail-finished', 'detail-finished');
Route::view('/detail-canceled', 'detail-canceled');

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// REGISTER
Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::prefix('catalogue')->name('catalogue.')->group(function () {
    Route::get('/', [KatalogController::class, 'index'])->name('index');
    Route::get('/{id}', [KatalogController::class, 'show'])->name('show');
});

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

    Route::get('/my-forest', function () {
        return view('myforest');
    })->name('myforest');

    Route::get('/my-order', function () {
        return "My Order Page";
    });

    Route::get('/receipt', function () {
        return view('kwitansi');
    })->name('receipt');

    Route::get('/certificate', function () {
        return view('certificate');
    })->name('certificate');

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
