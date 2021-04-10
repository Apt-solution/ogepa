<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/allUser', [ClientController::class, 'allUser'])->name('allUser');
Route::get('/addUser', [ClientController::class, 'addUser'])->name('user');
Route::post('/addUser', [ClientController::class, 'regClient'])->name('user.reg');
Route::get('/index', [ClientController::class, 'index'])->name('users.index');
Route::get('/show/{id}', [ClientController::class, 'showClient'])->name('user.show');
Route::put('/update/{id}', [ClientController::class, 'updateClient'])->name('user.update');
Route::delete('/delete/{id}', [ClientController::class, 'deleteClient'])->name('user.delete');



Route::middleware(['admin'])->group(function () {
    Route::get('/automatedPrice', [AdminController::class, 'automatedPrice'])->name('automatedPrice');
    Route::get('/setMonthlyPrice', [AdminController::class, 'setMonthlyPrice'])->name('setMonthlyPrice');
    Route::post('/editAutomatedPrice', [AdminController::class, 'editAutomatedPrice'])->name('editAutomatedPrice');
});
