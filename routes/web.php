<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LeaseController;
use App\Http\Controllers\MaintenanceRequestController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PropertyManagerController;

/*
|--------------------------------------------------------------------------
| Tenant Related Routes
|--------------------------------------------------------------------------
|
*/

// Routes For Registration
Route::get('register', [UserController::class, 'showRegistrationForm'])->name('registerpage');
Route::post('register', [UserController::class, 'register'])->name('register');

// Routes For Login & Logout
Route::get('login', [UserController::class, 'showLoginForm'])->name('loginpage');
Route::post('login', [UserController::class, 'login'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Routes For Leases
Route::get('/', [LeaseController::class, 'index'])->name('home');
Route::get('/properties/{property}/available-leases', [LeaseController::class, 'availableLease'])->name('properties.available-leases');

// Routes For Properties
Route::get('/properties', [PropertyController::class, 'index'])->name('properties');

// Routes For Maintenance
Route::get('/maintenance-requests', [MaintenanceRequestController::class, 'index'])->name('maintenance');
Route::get('/add-maintenance-request', [MaintenanceRequestController::class, 'addMaintenanceReqPage'])->name('add.maintenance.page');
Route::post('/add-maintenance-request', [MaintenanceRequestController::class, 'addMaintenanceReq'])->name('add.maintenance');

/*
|--------------------------------------------------------------------------
| Property-Manager Related Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/properties-and-leases', [PropertyManagerController::class, 'index'])->name('showpropleasemenu');

// Routes For Properties
Route::get('/create-property', [PropertyManagerController::class, 'getCreatePropertyPage'])->name('createproppage');
Route::post('/create-property', [PropertyManagerController::class, 'createProperty'])->name('createproperty');

// Routes For Leases
Route::get('/create-lease', [PropertyManagerController::class, 'getCreateLeasePage'])->name('createleasepage');
Route::post('/create-lease', [PropertyManagerController::class, 'createLease'])->name('createlease');
Route::get('/manage-lease', [PropertyManagerController::class, 'manageLeasePage'])->name('manageleasepage');
Route::get('/modify-lease/{id}', [PropertyManagerController::class, 'editLeasePage'])->name('lease.editpage');
Route::put('/modify-lease/{id}', [PropertyManagerController::class, 'editLease'])->name('lease.edit');
