<?php

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\Admin\IndexsController;
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

Route::get('/', [IndexController::class, 'index'])->name('home');

Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::get('register', [CustomAuthController::class, 'register'])->name('register');
Route::post('welcome', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::post('register-user', [CustomAuthController::class, 'customRegister'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');


Route::get('forgot-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password',[ForgotPasswordController::class,'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class,'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [IndexController::class, 'dashboard'])->name('dashboard');
    Route::get('/change-password', [IndexController::class, 'changepass'])->name('changepass');
    Route::post('/changepass', [CustomAuthController::class, 'changepass'])->name('change-pass');
});

