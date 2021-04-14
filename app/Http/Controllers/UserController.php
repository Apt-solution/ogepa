<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{

    protected $userService;
    public function __construct(
        UserService $userService
    )
    {
        $this->userService = $userService;
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

    public function updatePayment(array $data)
    {
        dd($data);
    }
}
