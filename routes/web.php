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
