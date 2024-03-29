<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProfileController;
use \App\Http\Controllers\MessagesController;
use \App\Http\Controllers\AuthController;
use App\Http\Controllers\FollowerController;
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


// route autehtification
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::get('/signup', [\App\Http\Controllers\AuthController::class, 'signUp'])->name('signup');

Route::post('/store', [\App\Http\Controllers\AuthController::class, 'store'])->name('store');
Route::post('/loginUser', [\App\Http\Controllers\AuthController::class, 'loginUser'])->name('loginUser');
Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logOut'])->name('logout');



// Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->middleware('IsAuth');


Route::get('/profile/{id}', [ProfileController::class, 'FollowUserDetailsPage']);

Route::post('/profile/{id}', [ProfileController::class, 'followOrUnfollowUser'])->name('followOrUnfollow');


Route::get('/delete/{id}', [ProfileController::class, 'destroy'])->name('delete_profile');

Route::get('/', [FrontController::class, 'index'])->name('index');
Route::get('/search', [FrontController::class, 'find']);

Route::get('/messages/{id}',[MessagesController::class, 'GetMessage'])->name('messages');
Route::post('/message/{id}', [MessagesController::class, 'sendMessage'])->name('send.message');

Route::post('/follow/{id}', [FollowerController::class, 'FollowUser']);


Route::get('/register', function () {
    return view('register');
});







// posts routes
Route::get('/dashboard', [\App\Http\Controllers\PostController::class, 'myPosts'])->name('dashboard')->middleware('IsAuth');
Route::post('/addPost', [App\Http\Controllers\PostController::class, 'addPost'])->name('addPost')->middleware('IsAuth');
Route::delete('/deletePost/{id}', [App\Http\Controllers\PostController::class, 'deletePost'])->name('deletePost')->middleware('IsAuth');

// comments
Route::resource('comment', \App\Http\Controllers\CommentController::class);


// likes

Route::post('/like/{id}', [\App\Http\Controllers\PostController::class, 'like'])->name('like');
Route::post('/unlike/{id}', [\App\Http\Controllers\PostController::class, 'unlike'])->name('unlike');

