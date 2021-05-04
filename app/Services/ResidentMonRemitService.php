<?php

namespace App\Services;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;

class ResidentMonRemitService
{
    protected $payment;
    public function __construct(Payment $payment)
    {
       $this->payment = $payment;
    }

    public function getApr()
    {
        $current = Carbon::now();
        $users = User::join('payments', 'payments.user_id', '=', 'users.id')
            ->where('users.client_type', 'residential')
            ->where('payments.status','pending')
            ->whereMonth('payments.created_at', date('04'))
            ->sum('amount');
       return $users;
    }

    public function getMay()
    {
        $current = Carbon::now();
        $users = User::join('payments', 'payments.user_id', '=', 'users.id')
            ->where('users.client_type', 'residential')
            ->where('payments.status','pending')
            ->whereMonth('payments.created_at', date('05'))
            ->sum('amount');
       return $users;
    }
}

?>