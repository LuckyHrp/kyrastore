<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\NominalController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Banner;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('home');
})->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

route::prefix('admin')->middleware(['auth', 'verified', 'role:admin'])->group(function () {

    Route::get('/category/search', [CategoryController::class, 'search'])->name('category.search');
    Route::get('/product/search', [ProductController::class, 'search'])->name('product.search');
    Route::get('/nominal/search', [NominalController::class, 'search'])->name('nominal.search');
    Route::get('/transaction/search', [TransactionController::class, 'search'])->name('transaction.search');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('product', ProductController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('nominal', NominalController::class);
    Route::resource('banner', BannerController::class);
    Route::resource('transaction', TransactionController::class);
});

Route::get('/product', function () {
    return 'berhasil';
});

require __DIR__ . '/auth.php';
