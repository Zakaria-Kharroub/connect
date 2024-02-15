<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProfileController;
use \App\Http\Controllers\MessagesController;
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


Route::get('/profile', [ProfileController::class, 'index']);




Route::get('/', [FrontController::class, 'index'])->name('index');
Route::get('/search', [FrontController::class, 'find']);

Route::get('/messages/{id}',[MessagesController::class, 'GetMessage'])->name('messages');
Route::post('/message/{id}', [MessagesController::class, 'sendMessage'])->name('send.message');

Route::get('/profile/{id}', [ProfileController::class, 'profileDetails']);


Route::get('/register', function () {
    return view('register');
});







// posts routes
Route::get('/dashboard', [\App\Http\Controllers\PostController::class, 'myPosts'])->name('dashboard');
Route::post('/addPost', [App\Http\Controllers\PostController::class, 'addPost'])->name('addPost');
Route::delete('/deletePost/{id}', [App\Http\Controllers\PostController::class, 'deletePost'])->name('deletePost');

