<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LeaseController;
use App\Http\Controllers\PropertyController;

/*
|--------------------------------------------------------------------------
| User Related Routes
|--------------------------------------------------------------------------
|
*/
//Routes For Registration
Route::get('register', [UserController::class, 'showRegistrationForm'])->name('registerpage');
Route::post('register', [UserController::class, 'register'])->name('register');

//Routes For Login & Logout
Route::get('login', [UserController::class, 'showLoginForm'])->name('loginpage');
Route::post('login', [UserController::class, 'login'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Lease Related Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', [LeaseController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Properties Related Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/properties', [PropertyController::class, 'index'])->name('properties');
