<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ParentController;

Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Protected dashboard route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
