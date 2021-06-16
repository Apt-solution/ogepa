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

    // public function ifPaidForMonth($user_id, $month)
    // {
    //    return $this->payment->where('user_id', $request['user_id'])
    //                         ->where('month_paid', $request['month_due'])
    //                         ->whereYear('updated_at', date('Y'))
    //                         ->where('status', 'successful');
    // }

    public function checkInvoice($user_id, $month_due)
    {
        return $this->industrial_remmitance->where('user_id', $user_id)
                            ->where('month_due', $month_due)
                            ->whereYear('updated_at', date('Y'))->count();
    }

    public function getAmountPaid($user_id)
    {
        return $this->payment->where('user_id', $user_id)
                            ->where('status', 'successful')
                            ->sum('amount');
    }

    public function getArreas($user_id)
    {
        return $this->industrial_remmitance->where('user_id', $user_id)->sum('amount_to_pay');
    }

}