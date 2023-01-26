<?php

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\IndexController;
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
Route::get('/whyus', [IndexController::class, 'whyus'])->name('whyus');

Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::get('register', [CustomAuthController::class, 'register'])->name('register');
Route::post('welcome', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::post('register-user', [CustomAuthController::class, 'customRegister'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');


Route::get('forgot-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password',[ForgotPasswordController::class,'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class,'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::middleware(['auth','isAdmin'])->group(function () {
    Route::get('/dashboard', [IndexController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [IndexController::class, 'allUsers'])->name('allUsers');
    Route::get('/users/viewmore/{id}', [IndexController::class, 'viewmore'])->name('viewmore');
    Route::get('/change-password', [CustomAuthController::class, 'showchangepass'])->name('changepass');
    Route::post('/changepass', [CustomAuthController::class, 'changepass'])->name('change-pass');
    Route::resource('/events', EventsController::class, ['names' => 'events']);
    
});

Route::get('/profile', [IndexController::class, 'viewProfile'])->name('viewProfile');
Route::get('/profile/edit', [IndexController::class, 'editProfile'])->name('editProfile');
Route::post('/profile/update', [IndexController::class, 'updateProfile'])->name('updateProfile');
Route::get('/profile/changepassword', [IndexController::class, 'showchangepassword'])->name('showchangepassword');
Route::post('/profile/updatepassword', [IndexController::class, 'updatePassword'])->name('updatePassword');

