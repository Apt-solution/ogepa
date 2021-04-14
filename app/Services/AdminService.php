<?php

namespace App\Services;

use App\Models\ClientType;
use App\Models\User;
use App\Models\remmitance;
use App\Models\Payment;

class AdminService
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

    public function getAutomatedPrice()
    {
        return $this->clientType->all();
    }

    public function updateAutomatedService(array $credentials)
    {
        return $this->clientType->where('id', $credentials['id'])
            ->update([
                'monthly_payment' => $credentials['monthly_payment']
            ]);
    }

    public function userMonthlyPrice()
    {
        $checkData = $this->remmitance->whereDay('created_at', '>=', 5)->whereMonth('created_at', date('m'))->first();
        if (!$checkData) {
            $allUser = $this->user->where('role', '!=', 'admin')->get();
            foreach ($allUser as $allUsers) {
                $this->remmitance->create([
                    'user_id' => $allUsers->id,
                    'amount_to_pay' => $allUsers->clientType->monthly_payment + 15,
                    'month_due' => date('m'),
                    'admin_id' => 0
                ]);
            }
        }
    }

    public function getMonthRemmitance()
    {
        return $this->payment->whereMonth('created_at', date('m'))
        ->whereYear('created_at', date('Y'))->sum('amount');
    }
}
