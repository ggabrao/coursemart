<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//todo: avaliar essa estrutura de rotas

Route::view('/', 'welcome');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard');

    Route::resource('products', ProductController::class)->except('index');

    Route::view('/cart', 'cart')->name('cart');

});

require __DIR__ . '/auth.php';
