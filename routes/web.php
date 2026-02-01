<?php

use App\Http\Controllers\AdminatorController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', [AdminatorController::class, 'index'])->name('adminator.index');
    Route::get('/auth/logout', [AdminatorController::class, 'logout'])->name('adminator.auth.logout');
});
Route::get('/auth/login', [AdminatorController::class, 'formLogin'])->name('adminator.auth.login');
Route::get('/auth/login', [AdminatorController::class, 'formLogin'])->name('login');
Route::post('/auth/login', [AdminatorController::class, 'login'])->name('adminator.auth.login.post');
Route::resource('crud-examples', \App\Http\Controllers\CrudExampleController::class)->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('users/export', [\App\Http\Controllers\UserController::class, 'export'])->name('users.export');
    Route::get('users/template', [\App\Http\Controllers\UserController::class, 'template'])->name('users.template');
    Route::post('users/import', [\App\Http\Controllers\UserController::class, 'import'])->name('users.import');
    Route::resource('users', \App\Http\Controllers\UserController::class);
});
