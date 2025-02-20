<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [ProductController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [ProductController::class, 'index'])
        ->middleware(AdminMiddleware::class)
        ->name('admin.dashboard');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/produto/{id}', [ProductController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('produto.show');

Route::prefix('admin')->group(function () {
    Route::get('/produto/{id}', [ProductController::class, 'show'])
        ->middleware(AdminMiddleware::class)
        ->name('admin.produto.show');
    });

// Preciso entender melhor o funcionamento do método middleware

