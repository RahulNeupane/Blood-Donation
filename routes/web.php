<?php

use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\RewardController;
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
Route::get('/blog-all', [IndexController::class, 'blogs'])->name('blogs');
Route::get('/rewards/show', [IndexController::class, 'rewards_show'])->name('rewards_show');
Route::get('/blog-detail/{id}', [IndexController::class, 'blog_detail'])->name('blog_detail');
Route::get('/category/{id}', [IndexController::class, 'category'])->name('category');
Route::post('/comment-submit', [CommentController::class, 'comment_submit'])->name('comment_submit');
Route::post('/reply-submit', [CommentController::class, 'reply_submit'])->name('reply_submit');

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
    Route::resource('/reward', RewardController::class, ['names' => 'reward']);
    Route::resource('/blog-categories', BlogCategoryController::class, ['names' => 'blogCategory']);
    Route::resource('/blog', BlogController::class, ['names' => 'blog']);
    Route::get('/blog/comments/pending',[ BlogController::class,'pending_comments'])->name('show_comments');
    Route::get('/blog/comment/approve/{id}',[ BlogController::class,'approve_comment'])->name('approve_comment');
    Route::get('/blog/comment/delete/{id}',[ BlogController::class,'delete_comment'])->name('delete_comment');

    Route::get('/blog/comments/approved',[ BlogController::class,'approved_comments'])->name('approved_comments');
    Route::get('/blog/comment/recheck/{id}',[ BlogController::class,'recheck_comment'])->name('recheck_comment');

    Route::get('/blog/reply/pending',[ BlogController::class,'pending_reply'])->name('show_reply');
    Route::get('/blog/reply/approve/{id}',[ BlogController::class,'approve_reply'])->name('approve_reply');
    Route::get('/blog/reply/delete/{id}',[ BlogController::class,'delete_reply'])->name('delete_reply');

    Route::get('/blog/reply/approved',[ BlogController::class,'approved_reply'])->name('approved_reply');
    Route::get('/blog/reply/recheck/{id}',[ BlogController::class,'recheck_reply'])->name('recheck_reply');

});

Route::middleware(['auth'])->group(function(){
    Route::get('/donate',[IndexController::class,'donate'])->name('donate');
    Route::post('/donate-request',[IndexController::class,'donateRequest'])->name('donateRequest');
});

Route::get('/receive',[IndexController::class,'receive'])->name('receive');
Route::post('/receive-request',[IndexController::class,'receiveRequest'])->name('receiveRequest');
Route::get('/profile', [IndexController::class, 'viewProfile'])->name('viewProfile')->middleware('auth');
Route::get('/profile/edit', [IndexController::class, 'editProfile'])->name('editProfile')->middleware('auth');
Route::post('/profile/update', [IndexController::class, 'updateProfile'])->name('updateProfile')->middleware('auth');
Route::get('/profile/changepassword', [IndexController::class, 'showchangepassword'])->name('showchangepassword')->middleware('auth');
Route::post('/profile/updatepassword', [IndexController::class, 'updatePassword'])->name('updatePassword')->middleware('auth');

