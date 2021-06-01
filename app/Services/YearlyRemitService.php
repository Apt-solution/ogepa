<?php

namespace App\Services;
use App\Models\Payment;
use App\Models\User;
use DB;
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
        $users = DB::table('users')
            ->join('clients', 'users.id', '=', 'clients.user_id')
            ->join('payments', 'users.id', '=', 'payments.user_id')
            ->where('clients.type', 'residential')
            ->where('payments.status', 'successful')
            ->whereYear('payments.updated_at', $current->year)
            ->sum('amount');
        return $users;
    }

    public function commercialYearlyRemit()
    {
        $current = Carbon::now();
        $users = DB::table('users')
        ->join('clients', 'users.id', '=', 'clients.user_id')
        ->join('payments', 'users.id', '=', 'payments.user_id')
        ->where('clients.type', 'commercial')
        ->where('payments.status', 'successful')
        ->whereYear('payments.updated_at', $current->year)
        ->sum('amount');
        return $users; 
    }

    public function industrialYearlyRemit()
    {
        $current = Carbon::now();
        $users =  $users = DB::table('users')
        ->join('clients', 'users.id', '=', 'clients.user_id')
        ->join('payments', 'users.id', '=', 'payments.user_id')
        ->where('clients.type', 'industrial')
        ->where('payments.status', 'successful')
        ->whereYear('payments.updated_at', $current->year)
        ->sum('amount');
        return $users; 
    }

    public function medicalYearlyRemit()
    {
        $current = Carbon::now();
        $users =  $users = DB::table('users')
        ->join('clients', 'users.id', '=', 'clients.user_id')
        ->join('payments', 'users.id', '=', 'payments.user_id')
        ->where('clients.type', 'medical')
        ->where('payments.status', 'successful')
        ->whereYear('payments.updated_at', $current->year)
        ->sum('amount');
        return $users; 
    }
}

?>