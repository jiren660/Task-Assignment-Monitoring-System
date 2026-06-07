<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ── Root redirect ─────────────────────────────────────────────────────────
Route::get('/', fn () => redirect()->route('login'));

// ── Guest routes ──────────────────────────────────────────────────────────
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');
});

// ── Authenticated routes ───────────────────────────────────────────────────
Route::middleware('auth')->group(function () {
    Route::get('/welcome', fn () => view('welcome'))->name('welcome');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
