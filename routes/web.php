<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DataTableController;
use App\Http\Controllers\ChartController;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\Cloner\Data;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use DB;
use App\Models\User;
use App\Models\Payment;
use Carbon\Carbon;
use PDF;


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
    return view('auth.login');
});

Route::get('/trypay', function () {
    return view('user.trypay');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');




Route::middleware(['admin'])->group(function () {
    Route::get('/automatedPrice', [AdminController::class, 'automatedPrice'])->name('automatedPrice');
    Route::get('/payments', [AdminController::class, 'payments'])->name('payments');
    Route::post('/editAutomatedPrice', [AdminController::class, 'editAutomatedPrice'])->name('editAutomatedPrice');
    Route::post('/searchPayment', [AdminController::class, 'searchPayment'])->name('searchPayment');
    Route::get('getSearchPayment', [AdminController::class, 'getSearchPayment']);
    Route::get('/allUser', [ClientController::class, 'allUser'])->name('allUser');
    Route::get('/residential', [DataTableController::class, 'residentialUser'])->name('residential.user');
    Route::get('/commercial', [DataTableController::class, 'commercialUser'])->name('commercial.user');
    Route::get('/industrial', [DataTableController::class, 'industryUser'])->name('industry.user');
    Route::get('/medical', [DataTableController::class, 'medicalUser'])->name('medical.user');
    Route::get('/addUser', [ClientController::class, 'addUser'])->name('user');
    Route::post('/addUser', [ClientController::class, 'regClient'])->name('user.reg');
    Route::get('/index', [DataTableController::class, 'index'])->name('users.index');
    Route::get('/show/{id}', [ClientController::class, 'showClient'])->name('user.show');
    Route::put('/update/{id}', [ClientController::class, 'updateClient'])->name('user.update');
    Route::get('/profile/{id}', [ClientController::class, 'ClientProfile'])->name('user.profile');
    Route::get('profile/{id}/receipt', [AdminController::class, 'userReceipt'])->name('receipt');
    Route::get('/checkPayment', [DataTableController::class, 'getUserPayment'])->name('checkPayment');
});

Route::middleware(['user'])->group(function () {
    Route::get('user_profile', [UserController::class, 'userProfile'])->name('user_profile');
    Route::get('makePayment', [UserController::class, 'makePayment']);
    Route::get('user_profile/receipt/{id}', [UserController::class, 'getReceipt'])->name('user.receipt');
    Route::post('confirmPay', [UserController::class, 'confirmPay'])->name('confirmPay');
    Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');
    Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback']);
});

