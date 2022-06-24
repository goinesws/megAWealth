<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\UserController;
use app\Http\Controllers\Controller;
use app\Http\Controllers\CartController;



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
    return view('welcome');
});


Route::get('/login', [UserController::class, 'index_login']);
Route::post('/login', [UserController::class, 'login']);


Route::get('/register', [UserController::class, 'index_register']);
Route::post('/register', [UserController::class, 'register']);

Route::get('logout', [UserController::class, 'logout']);


Route::get('/home', [Controller::class, 'home']);

Route::get('/search', [Controller::class, 'search']);


//guest and member
//about us
Route::get('/about', [Controller::class, 'about']);

//buy
Route::get('/buy', [Controller::class, 'buy']);

//rent
Route::get('/rent', [Controller::class, 'rent']);

//cart
Route::get('/addcart', [CartController::class, 'addcart']);


// Route::get('/addcart', [CartController::class, 'addcart']);

