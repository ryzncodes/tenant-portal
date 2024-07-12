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

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| User Related Routes
|--------------------------------------------------------------------------
|
*/

Route::get('register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [UserController::class, 'register']);


Route::get('/home', function () {
    return view('home');
})->name('home');
