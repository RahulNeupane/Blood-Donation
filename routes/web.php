<?php

use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\RequestController;
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
Route::get('/blogs', [IndexController::class, 'blogs'])->name('blogs');

Route::get('/login', [CustomAuthController::class, 'index'])->name('login');
Route::post('/login-submit', [CustomAuthController::class, 'login_submit'])->name('login_submit');

Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logout');

Route::get('/registration', [CustomAuthController::class, 'registration'])->name('registration');
Route::post('/registration_submit', [CustomAuthController::class, 'registration_submit'])->name('registration_submit');

Route::get('/registration/verify/{token}/{email}', [CustomAuthController::class, 'registration_verify']);

Route::get('/forget-password', [CustomAuthController::class, 'forget_password'])->name('forget_password');
Route::post('/forget_password_submit', [CustomAuthController::class, 'forget_password_submit'])->name('forget_password_submit');

Route::get('/reset-password/{token}/{email}', [CustomAuthController::class, 'reset_password'])->name('reset_password');
Route::post('/reset_password_submit', [CustomAuthController::class, 'reset_password_submit'])->name('reset_password_submit');

Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', [IndexController::class, 'dashboard'])->name('dashboard');
    Route::get('/donate-request', [RequestController::class, 'donateRequests'])->name('donateRequests');
    Route::get('/receive-request', [RequestController::class, 'receiveRequests'])->name('receiveRequests');
    Route::get('/donate-request-accept/{userid}', [RequestController::class, 'donateRequestAccept'])->name('donateRequestAccept');
    Route::get('/update-reward-points/{userid}', [RequestController::class, 'updateRewardPoints'])->name('updateRewardPoints');
    Route::get('/users', [IndexController::class, 'allUsers'])->name('allUsers');
    Route::get('/users/viewmore/{id}', [IndexController::class, 'viewmore'])->name('viewmore');
    Route::get('/change-password', [CustomAuthController::class, 'showchangepass'])->name('changepass');
    Route::post('/changepass', [CustomAuthController::class, 'changepass'])->name('change-pass');
    Route::resource('/events', EventsController::class, ['names' => 'events']);
    Route::resource('/gallery', GalleryController::class, ['names' => 'gallery']);
    Route::resource('/blog-categories', BlogCategoryController::class, ['names' => 'blogCategory']);
    Route::resource('/blog', BlogController::class, ['names' => 'blog']);

});

Route::middleware(['auth'])->group(function(){
    Route::get('/donate',[IndexController::class,'donate'])->name('donate');
    Route::post('/donate-request',[IndexController::class,'donateRequest'])->name('donateRequest');
});

Route::get('/profile', [IndexController::class, 'viewProfile'])->name('viewProfile')->middleware('auth');
Route::get('/profile/edit', [IndexController::class, 'editProfile'])->name('editProfile')->middleware('auth');
Route::post('/profile/update', [IndexController::class, 'updateProfile'])->name('updateProfile')->middleware('auth');
Route::get('/profile/changepassword', [IndexController::class, 'showchangepassword'])->name('showchangepassword')->middleware('auth');
Route::post('/profile/updatepassword', [IndexController::class, 'updatePassword'])->name('updatePassword')->middleware('auth');

