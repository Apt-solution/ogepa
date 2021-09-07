<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\FlutterwaveController;
use App\Http\Controllers\DataTableController;
use App\Http\Controllers\ChartController;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\Cloner\Data;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use DB;
use App\Models\User;
use App\Models\Client;
use App\Models\Payment;
use App\Models\Remmitance;
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
    Route::get('/automated-price', [AdminController::class, 'automatedPrice'])->name('automatedPrice');
    Route::get('/live_search/action', [AdminController::class, 'action'])->name('live_search.action');
    Route::post('addIndustryForOfficer', [AdminController::class, 'addIndustryForOfficer'])->name('addIndustryForOfficer');
    Route::get('/addIndForCommOff', [AdminController::class, 'addIndForCommOff'])->name('addIndForCommOff');
    Route::get('/industrial-paid-payment', [AdminController::class, 'industrialPayment'])->name('industrial-paid-payment');
    Route::get('/payments', [AdminController::class, 'payments'])->name('payments');
    Route::get('/enter-amount-paid', [AdminController::class, 'enterAmountPaid'])->name('enter-amount-paid');
    Route::post('/edit-automated-price', [AdminController::class, 'editAutomatedPrice'])->name('editAutomatedPrice');
    Route::get('/print-industrial-bill', [AdminController::class, 'printIndustrialBill'])->name('print-industrial-bill');
    Route::post('/search-payment', [AdminController::class, 'searchPayment'])->name('searchPayment');
    Route::post('/add-industrial-amount-paid', [AdminController::class, 'addIndustrialAmountPaid'])->name('add-industrial-amount-paid');
    Route::post('/add-industrial-data', [AdminController::class, 'addIndustrialData'])->name('add-industrial-data');
    Route::post('/industrial-bill', [AdminController::class, 'industrialBill'])->name('industrial-bill');
    Route::get('/print-invoice', [AdminController::class, 'printInvoice'])->name('print-invoice');
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
    Route::delete('/delete-user/{id}', [ClientController::class, 'deleteClient'])->name('deleteUser');
    Route::get('/profile/{id}', [ClientController::class, 'ClientProfile'])->name('user.profile');
    Route::get('profile/{id}/receipt', [AdminController::class, 'userReceipt'])->name('receipt');
    Route::get('/payment-histories', [DataTableController::class, 'getUserPayment'])->name('showHistory');
    Route::get('/add-sub-admin', [AdminController::class, 'addSubAdmin'])->name('addSubAdmin');
    Route::post('/register-sub-dmin', [AdminController::class, 'registerSubAdmin'])->name('register-sub-admin');
    Route::get('/add-industrial-payment', [AdminController::class, 'addIndustrialPayment'])->name('add-industrial-payment');
    Route::post('/add-amount-paid', [AdminController::class, 'addAmountPaid'])->name('add-amount-paid');
    Route::get('/psp-vendor', [PSPController::class, 'showPSPVendor'])->name('showPSPVendor');
    Route::post('/add-psp-vendor', [PSPController::class, 'regPSPVendor'])->name('regPSPVendor');
    Route::get('/psp-vendor/{id}', [PSPController::class, 'PSPVendorDetails'])->name('PSPDetails');
    Route::put('/update-psp-vendor/{id}', [PSPController::class, 'updatePSPVendor'])->name('updatePSPVendor');
    Route::get('/list-psp', [DataTableController::class, 'passAllPSPToTable'])->name('PSPList');
    Route::get('/list-vendor', [DataTableController::class, 'passAllVendorToTable'])->name('vendorList');
    Route::get('/invoice/{id}', [InvoiceController::class, 'showInvoice'])->name('userInvoice');
    Route::post('/invoice-data', [InvoiceController::class, 'invoiceData'])->name('invoiceData');
    Route::get('/get-amount', [ClientController::class, 'getPayment'])->name('getAmount');
    Route::get('/get-arreas', [InvoiceController::class, 'getArreas'])->name('getArreas');
    Route::get('/list-invoice', [InvoiceController::class, 'getInvoiceList'])->name('invoiceHistory');
    Route::get('/user-invoice-data/{id}', [InvoiceController::class, 'getUserInvoiceData'])->name('getUserInvoiceData');
    Route::post('/generate-commercial-invoice', [InvoiceController::class, 'generateAllCommercialInvoice'])->name('commercialInvoice');
    Route::post('/generate-residential-invoice', [InvoiceController::class, 'generateAllResidentialInvoice'])->name('residentialInvoice');
    Route::view('/reset-user-password', 'admin.resetUserPassword')->name('resetPwd');
    Route::post('/reset-user-pwd', [AdminController::class, 'resetUserPwd'])->name('resetUserPwd');
});

Route::middleware(['user'])->group(function () {
    Route::get('user_profile', [UserController::class, 'userProfile'])->name('user_profile');
    Route::get('makePayment', [UserController::class, 'makePayment']);
    Route::get('user_profile/receipt/{id}', [UserController::class, 'getReceipt'])->name('user.receipt');
    Route::post('confirmPay', [UserController::class, 'confirmPay'])->name('confirmPay');
    // Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');
    // Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback']);
    // The route that the button calls to initialize payment
    Route::post('/pay', [FlutterwaveController::class, 'initialize'])->name('pay');
    // The callback url after a payment
    Route::get('/rave/callback', [FlutterwaveController::class, 'callback'])->name('callback');
    Route::put('/change-password', [UserController::class, 'changeUserPassword'])->name('changePassword');
    Route::get('/is-login', [UserController::class, 'getIsLogin'])->name('isLogin');
});

Route::fallback(function(){
    return redirect()->route('home');
});