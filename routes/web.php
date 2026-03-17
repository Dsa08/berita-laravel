<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rute untuk Admin DAN Editor (Bisa kelola berita)
Route::middleware(['auth', 'role:admin,editor'])->group(function () {
    Route::resource('admin/posts', PostController::class);
});

// Rute KHUSUS Admin (Hanya Admin yang bisa kelola User)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/users', [UserController::class, 'index'])->name('users.index');
    Route::patch('admin/users/{id}/role', [UserController::class, 'updateRole'])->name('users.updateRole');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
