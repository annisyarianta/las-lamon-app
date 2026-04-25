<?php

use App\Http\Controllers\Adopter\CartController as AdopterCartController;
use App\Http\Controllers\Adopter\CheckoutController as AdopterCheckoutController;
use App\Http\Controllers\Adopter\KwitansiController as AdopterKwitansiController;
use App\Http\Controllers\Adopter\MyForestController as AdopterMyForestController;
use App\Http\Controllers\Adopter\OrderController as AdopterOrderController;
use App\Http\Controllers\Lsm\DashboardController as LsmDashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Adopter\CertificateController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\Lsm\KwitansiController as LsmKwitansiController;
use App\Http\Controllers\Lsm\OrderController as LsmOrderController;
use App\Http\Controllers\Lsm\LocationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/detail-product', function () {
    return view('detail-product');
})->name('detail.product');

Route::get('/about', function () {
    return view('about');
})->name('about');

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

// SUPERADMIN
Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::get('/superadmin', [UserController::class, 'cardSuperadmin'])->name('superadmin_dashboard');
    Route::resource('users', UserController::class);
});

// LSM
Route::middleware(['auth', 'role:lsm'])->prefix('lsm')->group(function () {

    Route::name('lsm.dashboard.')->group(function () {
        Route::get('/', [LsmDashboardController::class, 'index'])->name('index');
    });
    Route::get('/dataorder', function () {
        return view('lsm.dataorder');
    })->name('lsm_dataorder');
    Route::get('/location', function () {
        return view('lsm.location');
    })->name('lsm_location');
    Route::get('/detail-neworder', function () {
        return view('lsm.detail-neworder');
    })->name('lsm_detail-neworder');

    Route::resource('location', LocationController::class);

    Route::prefix('order')->name('lsm.order.')->group(function () {
        Route::get('/', [LsmOrderController::class, 'index'])->name('index');
        Route::post('/create', [LsmOrderController::class, 'store'])->name('store');
        Route::get('/{id}', [LsmOrderController::class, 'show'])->name('show');
        Route::post('/{id}/update', [LsmOrderController::class, 'update'])->name('update');
        Route::delete('/{id}/delete', [LsmOrderController::class, 'destroy'])->name('destroy');
        Route::post('/{id}/confirm-order', [LsmOrderController::class, 'confirmOrder'])->name('confirm-order');
    });
    Route::prefix('receipt')->name('lsm.receipt.')->group(function () {
        Route::get('/{id}', [LsmOrderController::class, 'show'])->name('show');
    });
});

// ADOPTER
Route::middleware(['auth', 'role:adopter'])->prefix('adopter')->group(function () {

    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::get('/my-forest', function () {
        return view('adopter.myforest');
    })->name('myforest');

    Route::get('/my-order', function () {
        return "My Order Page";
    });

    Route::get('/receipt', function () {
        return view('kwitansi');
    })->name('receipt');

    // Route::get('/{id}/certificate', function () {
    //     return view('certificate');
    // })->name('certificate');

    // Di dalam group middleware adopter
    // Route::get('/{id}/certificate', [CertificateController::class, 'show'])->name('show');

    Route::prefix('certificate')->name('adopter.certificate.')->group(function () {
      
        Route::get('/{id}', [CertificateController::class, 'show'])->name('show');
   
    });

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

    Route::prefix('receipt')->name('adopter.receipt.')->group(function () {
        Route::get('/{id}', [AdopterKwitansiController::class, 'show'])->name('show');
    });

    Route::prefix('my-forest')->name('adopter.myforest.')->group(function () {
        Route::get('/', [AdopterMyForestController::class, 'index'])->name('index');
    });
});
