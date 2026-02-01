<?php

use App\Http\Controllers\AdminatorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminatorController::class, 'index'])->name('adminator.index');
Route::get('/auth/login', [AdminatorController::class, 'formLogin'])->name('adminator.auth.login');
Route::post('/auth/login', [AdminatorController::class, 'login'])->name('adminator.auth.login.post');
