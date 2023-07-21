<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderHistoryController;

use App\Models\Table;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect('dashboard');
    }
    return view('welcome');
});

Route::get('/dashboard', function () {
    $tables = Table::all();
    return view('dashboard')->with('tables', $tables);;
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/get-products', [ProductController::class, 'getProducts'])->name('products.get');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');

    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

    Route::get('/orders/{tableId}', [OrderController::class, 'getOrdersByTable'], ['tableId' => "{tableId}"])->name('orders.by.table');

    Route::get('/order-history', [OrderHistoryController::class, 'index'])->name('order.history');
});

require __DIR__ . '/auth.php';
