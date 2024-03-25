<?php

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
Route::get('/',[AuthController::class, "login"]);
Route::get('/login',[AuthController::class, "login"])->name('login');
Route::get('/register',[AuthController::class, "register"]);
Route::get('/logout',[AuthController::class, "logout"]);
Route::post('/auth', [AuthController::class, "auth"])->name('login.auth');
Route::post('/auth-register',[AuthController::class, "authRegister"]);

//route users
Route::get('/news',[NewsController::class, "index"])->middleware('auth');
Route::post('/search',[NewsController::class, "search"]);

//route admin
Route::get('/dashboard',[])


