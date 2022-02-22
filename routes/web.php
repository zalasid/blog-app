<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\GuestController;
use App\Http\Controllers\User\UserPostController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\Admin\AdminDashboardController;

/* ---------- User Routes ---------- */
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::resource('posts', UserPostController::class)
        ->names(
            [
                'index' => 'posts',
                'create' => 'posts.create',
                'edit' => 'posts.edit',
                'update' => 'posts.update',
                'destroy' => 'posts.delete',
                'show' => 'posts.view',
            ]
        );
    Route::get('profile', [UserProfileController::class, 'index'])->name('profile');
    Route::patch('profile', [UserProfileController::class, 'update'])->name('profile.update');
});

/* ---------- Admin Routes ---------- */
Route::middleware(['auth', 'admin'])->prefix('admin')->as('admin.')->group(function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('posts', AdminPostController::class)
        ->names(
            [
                'index' => 'posts',
                'show' => 'posts.view',
                'edit' => 'posts.edit',
                'update' => 'posts.update',
                'destroy' => 'posts.delete',
            ]
        );
    Route::resource('users', AdminUserController::class)
        ->names(
            [
                'index' => 'users',
                'show' => 'users.view',
                'edit' => 'users.edit',
                'update' => 'users.update',
                'destroy' => 'users.delete',
            ]
        );
});

/* ---------- Guest Routes ---------- */
Route::middleware(['guest'])->group(function () {
    Route::get('/', [GuestController::class, 'index'])->name('home');
    Route::get('/post/{post}', [GuestController::class, 'show'])->name('guest.posts.view');
});

/* ---------- Auth Routes ---------- */
require __DIR__.'/auth.php';
