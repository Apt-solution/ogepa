<?php

namespace App\Services;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;

class CommMonRemitService
{
    protected $payment;
    public function __construct(Payment $payment)
    {
       $this->payment = $payment;
    }

    public function getJan()
    {
        $current = Carbon::now();
        $users = User::join('payments', 'payments.user_id', '=', 'users.id')
            ->where('users.client_type', 'commercial')
            ->where('payments.status','successful')
            ->whereMonth('payments.created_at', date('01'))
            ->whereYear('payments.created_at', date('Y'))
            ->sum('amount');
       return $users;
    }

    public function getFeb()
    {
        $current = Carbon::now();
        $users = User::join('payments', 'payments.user_id', '=', 'users.id')
            ->where('users.client_type', 'commercial')
            ->where('payments.status','successful')
            ->whereMonth('payments.created_at', date('02'))
            ->whereYear('payments.created_at', date('Y'))
            ->sum('amount');
       return $users;
    }

    public function getMar()
    {
        $current = Carbon::now();
        $users = User::join('payments', 'payments.user_id', '=', 'users.id')
            ->where('users.client_type', 'commercial')
            ->where('payments.status','successful')
            ->whereMonth('payments.created_at', date('03'))
            ->whereYear('payments.created_at', date('Y'))
            ->sum('amount');
       return $users;
    }

    public function getApr()
    {
        $current = Carbon::now();
        $users = User::join('payments', 'payments.user_id', '=', 'users.id')
            ->where('users.client_type', 'commercial')
            ->where('payments.status','successful')
            ->whereMonth('payments.created_at', date('04'))
            ->whereYear('payments.created_at', date('Y'))
            ->sum('amount');
       return $users;
    }

    public function getMay()
    {
        $current = Carbon::now();
        $users = User::join('payments', 'payments.user_id', '=', 'users.id')
            ->where('users.client_type', 'commercial')
            ->where('payments.status','successful')
            ->whereMonth('payments.created_at', date('05'))
            ->whereYear('payments.created_at', date('Y'))
            ->sum('amount');
       return $users;
    }

    public function getJun()
    {
        $current = Carbon::now();
        $users = User::join('payments', 'payments.user_id', '=', 'users.id')
            ->where('users.client_type', 'commercial')
            ->where('payments.status','successful')
            ->whereMonth('payments.created_at', date('06'))
            ->whereYear('payments.created_at', date('Y'))
            ->sum('amount');
       return $users;
    }

    public function getJul()
    {
        $current = Carbon::now();
        $users = User::join('payments', 'payments.user_id', '=', 'users.id')
            ->where('users.client_type', 'commercial')
            ->where('payments.status','successful')
            ->whereMonth('payments.created_at', date('07'))
            ->whereYear('payments.created_at', date('Y'))
            ->sum('amount');
       return $users;
    }
    public function getAug()
    {
        $current = Carbon::now();
        $users = User::join('payments', 'payments.user_id', '=', 'users.id')
            ->where('users.client_type', 'commercial')
            ->where('payments.status','successful')
            ->whereMonth('payments.created_at', date('08'))
            ->whereYear('payments.created_at', date('Y'))
            ->sum('amount');
       return $users;
    }
    public function getSept()
    {
        $current = Carbon::now();
        $users = User::join('payments', 'payments.user_id', '=', 'users.id')
            ->where('users.client_type', 'commercial')
            ->where('payments.status','successful')
            ->whereMonth('payments.created_at', date('09'))
            ->whereYear('payments.created_at', date('Y'))
            ->sum('amount');
       return $users;
    }
    public function getOct()
    {
        $current = Carbon::now();
        $users = User::join('payments', 'payments.user_id', '=', 'users.id')
            ->where('users.client_type', 'commercial')
            ->where('payments.status','successful')
            ->whereMonth('payments.created_at', date('10'))
            ->whereYear('payments.created_at', date('Y'))
            ->sum('amount');
       return $users;
    }
    public function getNov()
    {
        $current = Carbon::now();
        $users = User::join('payments', 'payments.user_id', '=', 'users.id')
            ->where('users.client_type', 'commercial')
            ->where('payments.status','successful')
            ->whereMonth('payments.created_at', date('11'))
            ->whereYear('payments.created_at', date('Y'))
            ->sum('amount');
       return $users;
    }
    public function getDec()
    {
        $current = Carbon::now();
        $users = User::join('payments', 'payments.user_id', '=', 'users.id')
            ->where('users.client_type', 'commercial')
            ->where('payments.status','successful')
            ->whereMonth('payments.created_at', date('12'))
            ->whereYear('payments.created_at', date('Y'))
            ->sum('amount');
       return $users;
    }

    
}

?>