<?php

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

// Route::get('/register', [HomeController::class,'register'])->name('register');
// Route::post('/registerUser', [UserController::class,'registerUser'])->name('registerUser');
// Route::get('/login', [HomeController::class,'login'])->name('login');
// Route::post('/loginUser', [UserController::class,'loginUser'])->name('loginUser');

Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::get('register', [CustomAuthController::class, 'register'])->name('register');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::post('custom-register', [CustomAuthController::class, 'customRegister'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
