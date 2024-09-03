<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::delete('/users/{user}/destroy', [UserController::class, 'destroy'])
    ->name('users.destroy');
Route::get('/users', [UserController::class, 'index'])
    ->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])
    ->name('users.create');
Route::post('/users/store', [UserController::class, 'store'])
    ->name('users.store');
Route::get('/users/{user}/edit}', [UserController::class, 'edit'])
    ->name('users.edit');
Route::patch('/users/{user}', [UserController::class, 'update'])
    ->name('users.update');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('posts', PostController::class)
    ->only(['index', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
