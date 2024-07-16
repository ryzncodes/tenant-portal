<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LeaseController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PropertyManagerController;

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
Route::get('/properties/{property}/available-leases', [LeaseController::class, 'availableLease'])->name('properties.available-leases');

/*
|--------------------------------------------------------------------------
| Properties Related Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/properties', [PropertyController::class, 'index'])->name('properties');


/*
|--------------------------------------------------------------------------
| Property-Manager Related Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/properties-and-leases', [PropertyManagerController::class, 'index'])->name('showpropleasemenu');
Route::get('/create-property', [PropertyManagerController::class, 'getCreatePropertyPage'])->name('createproppage');
Route::post('/create-property', [PropertyManagerController::class, 'createProperty'])->name('createproperty');
Route::get('/create-lease', [PropertyManagerController::class, 'getCreateLeasePage'])->name('createleasepage');
Route::post('/create-lease', [PropertyManagerController::class, 'createLease'])->name('createlease');
