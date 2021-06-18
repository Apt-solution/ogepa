<?php

namespace App\Services;

use App\Models\ClientType;
use App\Models\User;
use App\Models\remmitance;
use App\Models\Payment;

class UserService
{

    protected $clientType, $user, $remmitance, $payment;

    public function __construct(
        ClientType $clientType,
        User $user,
        remmitance $remmitance,
        Payment $payment
    ) {
        $this->clientType = $clientType;
        $this->user = $user;
        $this->remmitance = $remmitance;
        $this->payment = $payment;
    }

    public function getUserProfile()
    {
        $user_id = \Auth::User()->id;
        $data['user_details'] = $this->user->where('id', $user_id)->first();
        $data['current_billing'] = $this->currentBilling($user_id);
        $data['total_due'] = $this->totalDue($user_id);
        $data['paymentHistories'] = $this->paymentHistory($user_id);
        // dd($data);
        return $data;
    }
    
    private function currentBilling(int $user_id)
    {
        // dd($user_id);
        $remmitance = $this->remmitance->where('user_id', $user_id)->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->get('amount_to_pay')->first();
        if(!$remmitance){
            return 0;
        }
        return $remmitance->amount_to_pay;
    }

    private function totalDue(int $user_id)
    {
        $totalBilling = $this->remmitance->where('user_id', $user_id)->sum('amount_to_pay');
        // getting the total payments
        $totalPayments = $this->totalPayments($user_id);
        $totalDue = $totalBilling - $totalPayments;
        return $totalDue;
    }

    private function totalPayments(int $user_id)
    {
        $totalPayments = $this->payment->where('user_id', $user_id)->where('status', 'successful')->sum('amount');
        if(!$totalPayments){
            return 0;
        }
        return $totalPayments;
    }

    public function confirmPayment(array $credentials)
    {
        $ref = $this->getPaymentRef();
        return $this->payment->create([
            'user_id' => \Auth::User()->id,
            'amount' => $credentials['amount'],
            'bank_charges' => $credentials['charges'],
            'ref' => $ref
        ]);
    }

    public function getPaymentRef()
    {
        $code = rand(1111111, 9999999);
        $chk = $this->payment->where('ref', $code)->first();
        if($chk){
            $this->getPaymentRef();
        }
        return $code;
    }

    public function getPaymentDetails()
    {
        $user_id = \Auth::User()->id;
        return $this->payment->where('user_id', $user_id)->orderBy('id', 'desc')->first();
    }

    public function updatePayment(array $data)
    {
        return $this->payment->where('ref', $data['ref'])
        ->update([
            'paystack_ref' => $data['paystack_ref'],
            'status' => 'successful'
        ]);
    }

    public function paymentHistory(int $user_id)
    {
        // dd($user_id);
        return $this->payment->where('user_id', $user_id)->where('status', 'successful')->orderBy('id', 'desc')->get();
    }

    public function getReceipt($id)
    {
        // dd($user_id);
        return $this->payment->where('id', $id)->where('status', 'successful')->orderBy('id', 'desc')->get();
    }

    public function getClient($id)
    {
        $user_id = $this->user->where('id', $id);
        $data['user_details'] = $this->user->where('id', $user_id)->first();
        $data['current_billing'] = $this->currentBilling($user_id);
        $data['total_due'] = $this->totalDue($user_id);
        $data['paymentHistories'] = $this->paymentHistory($user_id);
        // dd($data);
        return $data;
    }

    public function getIsLogin()
    {
        return $this->user->where('id', \Auth::User()->id)->where('role', 'user')->value('isLogin');
    }

    public function changePassword(array $data)
    {
        return $this->user->where('id',  \Auth::user()->id)
        ->update([
            'password' => bcrypt($data['password']),
            'isLogin' => 1
        ]);
    }

}