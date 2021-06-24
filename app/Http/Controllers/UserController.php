<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\InvoiceService;
use App\Models\Payment;
use PDF;

class UserController extends Controller
{

    protected $userService, $invoiceService;
    public function __construct(
        UserService $userService,
        InvoiceService $invoiceService
       
    )
    {
        $this->userService = $userService;
        $this->invoiceService = $invoiceService;
    }
    
    public function userProfile()
    {
        $data = $this->userService->getUserProfile();
        // return $data;
        return view('user.profile')->with('data', $data);
    }

    public function confirmPay(Request $request)
    {
        $request->validate([
            'amount' => 'required|integer|min:500'
        ]);
        $this->userService->confirmPayment($request->all());
        return redirect('makePayment');
    }

    public function makePayment()
    {
        $data = $this->userService->getUserProfile();
        $payment = $this->userService->getPaymentDetails();
        return view('user.makePayment')->with('data', $data)->with('payment', $payment);
    }

    public function getReceipt($id)
    {   
        $payment = $this->userService->getReceipt($id);
        $data = $this->userService->getUserProfile();
        /* $pdf = PDF::loadView('user.receipt', ['payment' => $payment, 'data' => $data]);
        return $pdf->stream(); */
        return view('user.receipt', compact(['data', 'payment']));
       
    }

    public function getIsLogin()
    {
        $isLogin = $this->userService->getIsLogin();
        return response($isLogin);
    }

    public function changeUserPassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'min:6', 'confirmed']
        ]);

        $this->userService->changePassword($request->all());
        $request->session()->forget('password');
        return redirect()->back()->with('status', 'Password Change Succesfully');
    }


    
}


