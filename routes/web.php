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

use App\Http\Controllers\AccountController;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;



use Illuminate\Support\Facades\Auth;



Route::get('/', [HomeController::class, 'index'])->name('Index');
Route::redirect('/home', '/');


Route::get('/bedankt', [HomeController::class, 'thankyou'])->name('ThankYou');


Route::get('/biedingen', [HomeController::class, 'showbids'])->name('Bids');



Route::get('/account', [AccountController::class, 'account'])->name('Account');


Route::get('/account/verander-wachtwoord', [AccountController::class, 'editpassword'])->name('EditPassword');
Route::post('/account/verander-wachtwoord', [AccountController::class, 'updatepassword'])->name('UpdatePassword');




// Voorwerpen
Route::get('/lot-{id}', [HomeController::class, 'itemdetail'])->name('ItemDetail');


Route::post('/lot-{id}/addbid', [HomeController::class, 'addbid'])->name('AddBid');


Route::post('/lot-{id}/removebid', [HomeController::class, 'removebid'])->name('RemoveBid');





// Admin
Route::get('/admin', [AdminController::class, 'index'])->middleware('role:admin')->name('Admin');

Route::get('/admin/items', [AdminController::class, 'showitems'])->middleware('role:admin')->name('AdminItems');

Route::get('/admin/item/{id}', [AdminController::class, 'itemdetail'])->middleware('role:admin')->name('AdminItemDetail');

Route::get('/admin/additem', [AdminController::class, 'additem'])->middleware('role:admin')->name('AdminAddItem');
Route::post('/admin/additem', [AdminController::class, 'storeitem'])->middleware('role:admin')->name('StoreItem');


Route::get('/admin/item/{id}/edit', [AdminController::class, 'edititem'])->middleware('role:admin')->name('EditItem');
Route::post('/admin/item/{id}/edit', [AdminController::class, 'updateitem'])->middleware('role:admin')->name('UpdateItem');


Route::post('/admin/removeitem/{id}', [AdminController::class, 'removeitem'])->middleware('role:admin')->name('RemoveItem');





// Login & Register


Route::get('/login', [LoginController::class, 'login'])->name('Login');



Route::post('/login', [LoginController::class, 'loginsubmit'])->name('LoginSubmit');


Route::get('/logout', [LoginController::class, 'logout'])->name('Logout');


Route::get('/register', [RegisterController::class, 'register'])->name('Register');
Route::post('/register', [RegisterController::class, 'registersubmit'])->name('RegisterSubmit');



