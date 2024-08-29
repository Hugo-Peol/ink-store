<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)
    ->group(function () {
        Route::get('/', 'index')->name('home.index');
        Route::post('/', 'store')->name('home.store');
        // Route::get('/{id}', 'show')->name('home.show');
        // Route::put('/{id}', 'update')->name('home.update');
        // Route::delete('/{id}', 'destroy')->name('home.destroy');
    });
