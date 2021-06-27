<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Models\Payment;
use App\Models\IndustrialRemmitance;
use Illuminate\Support\Facades\Auth;
use DB;

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
                            ->orWhereMonth('created_at', date('M'))
                            ->whereYear('updated_at', date('Y'))->count();
    }

    // public function getAllAmountPaid($user_id)
    // {
    //     return $this->payment->where('user_id', $user_id)
    //                         ->where('status', 'successful')
    //                         ->orWhereMonth('updated_at', date('M'))
    //                         ->whereYear('updated_at', date('Y'))
    //                         ->sum('amount');
    // }

    // public function getMoneyToPay($user_id)
    // {
    //     return $this->industrial_remmitance->where('user_id', $user_id)->sum('amount_to_pay');
    // }

    public function getArreas($user_id, $month)
    {  
        if ($month == 1) {
            return $this->industrial_remmitance->where('user_id', $user_id)
                                                ->where('month_due', 12)
                                                ->whereYear('created_at', date('Y') - 1)
                                                ->value('arreas');

        }
        return $this->industrial_remmitance->where('user_id', $user_id)
                                                ->where('month_due', $month - 1)
                                                ->whereYear('created_at', date('Y'))
                                                ->value('arreas');
    }

    public function checkOldInvoice($user_id)
    {
        return $month = $this->industrial_remmitance->where('user_id', $user_id)
                                            ->whereYear('created_at', date('Y'))
                                            ->max('month_due');
        // if ($month == 12) {
        //     return $this->industrial_remmitance->where('user_id', $user_id)
        //                                         ->whereYear('created_at', date('Y') - 1)
        //                                         ->max('month_due');
        // }
        
    }
    

    public function getUserInvoiceData($id)
    {
       $invoiceData = DB::table('users')
                                    ->join('clients', 'clients.user_id', 'users.id')
                                    ->join('industrial_remmitances', 'industrial_remmitances.user_id', 'users.id')
                                    ->where('industrial_remmitances.id', $id)
                                    ->get();                          
        return $invoiceData;
    }

    public function getPreviousMonthArrears($id)
    {
        $data = $this->getUserInvoiceData($id);
        foreach($data as $m){
            $user_id = $m->user_id;
            $month = $this->industrial_remmitance->where('user_id', $user_id)
                                                ->where('id', $id)
                                                ->whereYear('created_at', date('Y'))
                                                ->max('month_due');
                                        
        }
    
        return $this->industrial_remmitance->where('month_due', $month - 1)
                                            ->where(function($query) {
                                            $query->whereYear('created_at', date('Y'));
                                            })->value('arreas');                                 
    }

}