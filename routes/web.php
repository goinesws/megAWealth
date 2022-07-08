<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\EstateController;
use App\Http\Controllers\CartController;

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\GuestMemberMiddleware;
use App\Http\Middleware\MemberMiddleware;



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

Route::get('/', function () {
    return redirect('/home');
});


Route::get('/home', [Controller::class, 'homepage'])->name('homepage');


Route::get('/register', [UserController::class, 'index_register'])->name('index_register');
Route::post('/register', [UserController::class, 'register'])->name('register_form');

Route::get('/login', [UserController::class, 'index_login'])->name('index_login');
Route::post('/login', [UserController::class, 'login'])->name('login_form');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/searchResult', [EstateController::class, 'search'])->name('search');






Route::middleware(['member'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart_index');
    Route::get('/addCart/{id}', [CartController::class, 'addCart'])->name('addCart');

    Route::get('/cancelCart/{id}', [CartController::class, 'cancelCart'])->name('cancelCart');
    Route::get('/cartCheckout', [CartController::class, 'cartCheckout'])->name('cartCheckout');
});

Route::middleware(['guest_member'])->group(function () {
    Route::get('/aboutUs', [OfficeController::class, 'index_aboutUs'])->name('aboutUs');
    Route::get('/buy', [EstateController::class, 'buy'])->name('buy');
    Route::get('/rent', [EstateController::class, 'rent'])->name('rent');



});

Route::middleware(['admin'])->group(function () {
    Route::get('/manageCompany', [OfficeController::class, 'index'])->name('manageCompany');

    Route::get('/addOffice', [OfficeController::class, 'index_addOffice'])->name('index_addOffice');
    Route::post('/addOffice', [OfficeController::class, 'addOffice'])->name('addOffice_form');

    Route::get('/updateOffice/{id}', [OfficeController::class, 'index_updateOffice'])->name('index_updateOffice');
    Route::post('/updateOffice/{id}', [OfficeController::class, 'updateOffice'])->name('updateOffice_form');
    Route::get('/deleteOffice/{id}', [OfficeController::class, 'deleteOffice'])->name('deleteOffice');

    Route::get('/manageRealEstates', [EstateController::class, 'index'])->name('manageEstate');

    Route::get('/addRealEstate', [EstateController::class, 'index_addEstate'])->name('index_addEstate');
    Route::post('/addRealEstate', [EstateController::class, 'addEstate'])->name('addEstate_form');

    Route::get('/updateRealEstate/{id}', [EstateController::class, 'index_updateEstate'])->name('index_updateEstate');
    Route::post('/updateRealEstate/{id}', [EstateController::class, 'updateEstate'])->name('updateEstate_form');
    Route::get('/updateRealEstateCartStatus/{id}', [EstateController::class, 'changeCartStatus'])->name('updateEstate_cartStatus');

    Route::get('/deleteRealEstate/{id}', [EstateController::class, 'deleteEstate'])->name('deleteEstate');
});

