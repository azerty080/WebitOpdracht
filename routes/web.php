<?php

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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;






Route::get('/', [HomeController::class, 'index'])->name('index');
Route::redirect('/home', '/');







// Login & Register


Route::get('/login', [LoginController::class, 'login'])->name('login');



Route::post('/login', [LoginController::class, 'loginsubmit'])->name('loginsubmit');


Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'registersubmit'])->name('registersubmit');



