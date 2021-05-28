<?php

namespace App\Services;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;


class YearlyRemitService
{
    protected $payment;
    public function __construct(Payment $payment)
    {
         $this->payment = $payment;
    }

    public function residentialYearlyRemit()
    {
        $current = Carbon::now();
        $users = User::join('payments', 'payments.user_id', '=', 'users.id')
            ->where('users.client_type', 'residential')
            ->where('payments.status','successful')
            ->whereYear('payments.created_at', $current->year)
            ->sum('amount');
        return $users; 
    }

    public function commercialYearlyRemit()
    {
        $current = Carbon::now();
        $users = User::join('payments', 'payments.user_id', '=', 'users.id')
            ->where('users.client_type', 'commercial')
            ->where('payments.status','successful')
            ->whereYear('payments.created_at', $current->year)
            ->sum('amount');
        return $users; 
    }

    public function industrialYearlyRemit()
    {
        $current = Carbon::now();
        $users = User::join('payments', 'payments.user_id', '=', 'users.id')
            ->where('users.client_type', 'industrial')
            ->where('payments.status','successful')
            ->whereYear('payments.created_at', $current->year)
            ->sum('amount');
        return $users; 
    }

    public function medicalYearlyRemit()
    {
        $current = Carbon::now();
        $users = User::join('payments', 'payments.user_id', '=', 'users.id')
            ->where('users.client_type', 'medical')
            ->where('payments.status','successful')
            ->whereYear('payments.created_at', $current->year)
            ->sum('amount');
        return $users; 
    }
}

?>