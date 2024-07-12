<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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


/*
|--------------------------------------------------------------------------
| User Related Routes
|--------------------------------------------------------------------------
|
*/

Route::get('register', [UserController::class, 'showRegistrationForm'])->name('registerpage');
Route::post('register', [UserController::class, 'register'])->name('register');

Route::get('login', [UserController::class, 'showLoginForm'])->name('loginpage');
Route::post('login', [UserController::class, 'login'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('home');
})->name('home');
