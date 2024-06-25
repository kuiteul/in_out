<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InOutController;


Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
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

Route::get('/', [DashboardController::class, 'index'])->middleware('auth', 'verified');
Route::resource('/employee', EmployeeController::class)->middleware('auth', 'verified');
Route::resource('/service', ServiceController::class)->middleware('auth', 'verified');
Route::resource('/users', UserController::class)->middleware('auth', 'verified');
Route::get('/presence', [InOutController::class, 'index'])->middleware('auth', 'verified');
Route::get('/entry', [InOutController::class, 'entry'])->middleware('auth', 'verified');
Route::post('/entry', [InOutController::class, 'selectEmployee'])->middleware('auth', 'verified');
Route::post('/validateEntry', [InOutController::class, 'validate'])->middleware('auth', 'verified');