<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProfileController;
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




Route::get('/profile', [ProfileController::class, 'index']);


Route::get('/', [FrontController::class, 'index']);
Route::get('/search', [FrontController::class, 'find']);

Route::get('/messages', [FrontController::class, 'messages']);


Route::get('/profile/{id}', [ProfileController::class, 'profileDetails']);
