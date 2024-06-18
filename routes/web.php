<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;

Route::get('/welcome', function () {
    return view('welcome');
});

/**
 * Authentication Route
 */

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/forgot-password', [LoginController::class, 'emailCheck']);
Route::post('/forgot-password', [LoginController::class, 'storeEmail']);
Route::get('/reset-password', [LoginController::class, 'resetForm']);
Route::post('/reset-password', [LoginController::class, 'storePassword']);
/**
 * End of Authentication Route
 */

 
/**
 * Application Route
 */

Route::get('/', [DashboardController::class, 'index']);
Route::resource('/employee', EmployeeController::class);

