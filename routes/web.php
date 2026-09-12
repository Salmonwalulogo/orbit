<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ==================== FRONTEND ROUTES ====================

Route::get('/', function () {
    return view('frontend.index');
})->name('home');

// ==================== AUTH ROUTES ====================

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function () {
    return redirect()->route('admin.dashboard');
})->name('login.prosess');

// ==================== ADMIN ROUTES ====================

Route::prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Users Management
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    
    // Data Management
    Route::get('/data', [AdminController::class, 'data'])->name('data');
    
    // Settings
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
    
});