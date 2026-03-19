<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

// Halaman publik
Route::get('/', [NewsController::class, 'index'])->name('home');
Route::get('/berita/{post}', [NewsController::class, 'show'])->name('news.show');

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin & Editor
Route::middleware(['auth', 'role:admin,editor'])->group(function () {
    Route::resource('admin/posts', PostController::class);
});

// Admin only
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/users', [UserController::class, 'index'])->name('users.index');
    Route::patch('admin/users/{id}/role', [UserController::class, 'updateRole'])->name('users.updateRole');
});

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';