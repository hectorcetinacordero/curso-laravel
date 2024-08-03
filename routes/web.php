<?php

use App\Http\Controllers\PermisosController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])->name('index');

Route::get('/post/create', [PostController::class, 'create'])->name('create');
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/post/{slug}', [PostController::class, 'show'])->name('view');
Route::post('/post/{id}', [PostController::class, 'destroy'])->name('destroy');
Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('edit');
Route::put('/post/{post}', [PostController::class, 'update'])->name('update');
Route::post('/post', [PostController::class, 'store'])->name('store');


Route::get('/permisos', [PermisosController::class, 'index'])->name('permisos');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
