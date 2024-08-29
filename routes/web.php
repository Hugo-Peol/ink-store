<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ArtController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;

Route::resource('orders', OrderController::class);
Route::resource('order-items', OrderItemController::class);
Route::resource('addresses', AddressController::class);
Route::resource('reviews', ReviewController::class);
Route::resource('artists', ArtistController::class);
Route::resource('products', ProductController   ::class);
Route::prefix('/')->group(__DIR__.'/web/home.php')->name('home.');
Route::resource('arts', ArtController::class);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
