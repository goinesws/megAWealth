<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\EstateController;

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


Route::get('/register', [UserController::class, 'index_register']);
Route::post('/register', [UserController::class, 'register'])->name('register_form');

Route::get('/login', [UserController::class, 'index_login'])->name('index_login');
Route::post('/login', [UserController::class, 'login'])->name('login_form');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');






Route::middleware(['member'])->group(function () {

});

Route::middleware(['guest_member'])->group(function () {
    Route::get('/aboutUs', [OfficeController::class, 'index_aboutUs'])->name('aboutUs');
    Route::get('/buy', [EstateController::class, 'buy'])->name('buy');


});

Route::middleware(['admin'])->group(function () {
    Route::get('/manageCompany', [OfficeController::class, 'index'])->name('manageCompany');

    Route::get('/addOffice', [OfficeController::class, 'index_addOffice'])->name('index_addOffice');
    Route::post('/addOffice', [OfficeController::class, 'addOffice'])->name('addOffice_form');

    Route::get('/updateOffice/{id}', [OfficeController::class, 'index_updateOffice'])->name('index_updateOffice');
    Route::post('/updateOffice/{id}', [OfficeController::class, 'updateOffice'])->name('updateOffice_form');

    Route::get('/deleteOffice/{id}', [OfficeController::class, 'deleteOffice'])->name('deleteOffice');
});

