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

use App\Http\Controllers\AdminController;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;



use Illuminate\Support\Facades\Auth;



Route::get('/', [HomeController::class, 'index'])->name('Index');
Route::redirect('/home', '/');



Route::get('/lot-{id}', [HomeController::class, 'itemdetail'])->name('ItemDetail');


Route::post('/lot-{id}/addbid', [HomeController::class, 'addbid'])->name('AddBid');





// Admin
Route::get('/admin', [AdminController::class, 'index'])->name('Admin');
Route::get('/admin/items', [AdminController::class, 'showitems'])->name('AdminItems');

Route::get('/admin/item/{id}', [AdminController::class, 'itemdetail'])->name('AdminItemDetail');

Route::get('/admin/additem', [AdminController::class, 'additem'])->name('AdminAddItem');
Route::post('/admin/additem', [AdminController::class, 'storeitem'])->name('StoreItem');







// Login & Register


Route::get('/login', [LoginController::class, 'login'])->name('Login');



Route::post('/login', [LoginController::class, 'loginsubmit'])->name('LoginSubmit');


Route::get('/logout', [LoginController::class, 'logout'])->name('Logout');


Route::get('/register', [RegisterController::class, 'register'])->name('Register');
Route::post('/register', [RegisterController::class, 'registersubmit'])->name('RegisterSubmit');



