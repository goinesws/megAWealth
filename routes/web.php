<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;




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


Route::get('/register', [UserController::class, 'index_register']);
Route::post('/register', [UserController::class, 'register'])->name('register_form');

Route::get('/login', [UserController::class, 'index_login'])->name('index_login');
Route::post('/login', [UserController::class, 'login'])->name('login_form');

