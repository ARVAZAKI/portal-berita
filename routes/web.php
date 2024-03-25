<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

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

//route auth
Route::get('/',[AuthController::class, "login"])->middleware('guest');
Route::get('/login',[AuthController::class, "login"])->name('login')->middleware('guest');
Route::get('/register',[AuthController::class, "register"])->middleware('guest');
Route::get('/logout',[AuthController::class, "logout"])->middleware('auth');
Route::post('/auth', [AuthController::class, "auth"])->name('login.auth');
Route::post('/auth-register',[AuthController::class, "authRegister"]);

//route users
Route::get('/news',[NewsController::class, "index"])->middleware('auth');
Route::post('/search',[NewsController::class, "search"]);

//route admin
Route::get('/dashboard',[AdminController::class, "dashboard"])->middleware('auth');
Route::get('/delete/{id}',[AdminController::class, "delete"])->name('delete');
Route::get('/admin-news',[AdminController::class, "news"])->middleware('auth');
Route::get('/add-news',[AdminController::class, "addNews"])->middleware('auth');
Route::post('/upload-news',[NewsController::class, "addNews"]);



