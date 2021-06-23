<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Models\Payment;
use App\Models\IndustrialRemmitance;
use Illuminate\Support\Facades\Auth;

class InvoiceService
{

    protected $payment, $industrial_remmitance;

    public function __construct(
        Payment $payment,
        IndustrialRemmitance $industrial_remmitance
    ) {
        $this->payment = $payment;
        $this->industrial_remmitance = $industrial_remmitance;
    }

    public function checkInvoice($user_id, $month_due)
    {
        return $this->industrial_remmitance->where('user_id', $user_id)
                            ->where('month_due', $month_due)
                            ->whereYear('updated_at', date('Y'))->count();
    }

    public function getAllAmountPaid($user_id)
    {
        return $this->payment->where('user_id', $user_id)
                            ->where('status', 'successful')
                            ->sum('amount');
    }

    public function getMoneyToPay($user_id)
    {
        return $this->industrial_remmitance->where('user_id', $user_id)->sum('amount_to_pay');
    }

    public function updateArreas($user_id, $month, $arreas)
    {  
        return $this->industrial_remmitance->where('user_id', $user_id)
                                            ->where('month_due', $month)
                                            ->update([
                                                'arreas' => $arreas
                                            ]);
    }
    public function getArreas($user_id, $month)
    {  
        if ($month == 1) {
            return $this->industrial_remmitance->where('user_id', $user_id)
                                                ->where('month_due', 12)
                                                ->whereYear('created_at', date('Y'))
                                                ->value('arreas');

        }
        return $this->industrial_remmitance->where('user_id', $user_id)
                                                ->where('month_due', $month - 1)
                                                ->whereYear('created_at', date('Y'))
                                                ->value('arreas');
    }

    public function checkOldInvoice($user_id)
    {
        return $this->industrial_remmitance->where('user_id', $user_id)
                                            ->whereYear('updated_at', date('Y'))
                                            ->max('month_due');
    }

}