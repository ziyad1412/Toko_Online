<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionDetailController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [FrontendController::class, 'index']);
    Route::get('/product/{id}', [FrontendController::class, 'show']);


    Route::group(['middleware' => ['auth', 'peran:admin-manager']], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/product', [ProductController::class, 'index'])->name('product.index');
        Route::get('/product/show/{id}', [ProductController::class, 'show'])->name('product.show');
        Route::get('/add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add_to_cart');
        Route::get('/cart', [ProductController::class, 'cart'])->name('cart');
        Route::delete('/remove-from-cart', [ProductController::class, 'remove'])->name('remove_from_cart');
        Route::patch('/update-cart', [ProductController::class, 'updateCart'])->name('update_cart');
        Route::get('/checkout', [ProductController::class, 'showCheckout'])->name('checkout.show');
        Route::post('/checkout', [ProductController::class, 'checkout'])->name('checkout');
        Route::get('/report', [ProductController::class, 'report'])->name('report.index');
        Route::get('/product/create', [ProductController::class, 'create']);
        Route::post('/product/store', [ProductController::class, 'store']);
        Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::get('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

        Route::get('/transaction', [TransactionDetailController::class, 'index'])->name('transaction-details.index');
    });

    // Buat route untuk after_registrasi
    Route::get('/after_register', function () {
        return view('after_register');
    });
});
