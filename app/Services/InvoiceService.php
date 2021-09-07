<?php

namespace App\Services;

use DB;
use Carbon\Carbon;
use App\Models\Client;
use App\Models\Payment;
use App\Models\Remmitance;
use App\Models\IndustrialRemmitance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class InvoiceService
{

    protected $payment, $industrial_remmitance;

    public function __construct(
        Payment $payment,
        IndustrialRemmitance $industrial_remmitance,
        Client $client,
        Remmitance $remmitance
    ) {
        $this->payment = $payment;
        $this->industrial_remmitance = $industrial_remmitance;
        $this->client = $client;
        $this->remmitance = $remmitance;
    }

    public function checkInvoice($user_id, $month_due)
    {
        return $this->industrial_remmitance->where('user_id', $user_id)
            ->where('month_due', $month_due)
            ->where('amount_to_pay', ">", 0)
            ->orWhereMonth('created_at', date('M'))
            ->whereYear('updated_at', date('Y'))->count();
    }

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
        foreach ($data as $m) {
            $user_id = $m->user_id;
            $month = $this->industrial_remmitance->where('user_id', $user_id)
                                                ->where('id', $id)
                                                ->whereYear('created_at', date('Y'))
                                                ->max('month_due');

            $current_date = Carbon::now();
            $lastmonth = $current_date->setMonth($month)->subMonth()->month;
        
            if ($lastmonth == 12) {
                return $this->industrial_remmitance->where('user_id', $user_id)
                    ->where('month_due', 12)
                    ->whereYear('created_at', date('Y') - 1)
                    ->value('arreas');
            }

            $arrears =  $this->industrial_remmitance->where('user_id', $user_id)
                                                ->where('month_due', $lastmonth)
                                                ->whereYear('created_at', date('Y'))
                                                ->value('arreas');  
            if(is_null($arrears)) {
                return 0.00;
            }
            
            return $arrears;                    
        }
    }

    private function getCategoryArrears($user_id)
    {
        $last_month = Carbon::now()->subMonths();
       
        return $this->remmitance->where('user_id', $user_id)
                                                ->whereMonth('created_at', $last_month)
                                                ->value('arrears');
    }


    public function getAllCommercialInvoiceData()
    {
       return $this->client->where('type', 'commercial')
                                    ->with('user')
                                    ->whereNotNull('initialAmount')
                                    ->get();
    }

    public function fillCommercialInvoiceData()
    {
        $datas = array();
        $month = Carbon::now();
        $commercial_data = $this->getAllCommercialInvoiceData();
        foreach($commercial_data as $commercial)
        {
            $user_arrears = $this->getCategoryArrears($commercial->user_id);
            $this->remmitance->create([
                'user_id' => $commercial->user_id,
                'amount_to_pay' => $commercial->initialAmount + $user_arrears,
                'arrears' => $commercial->initialAmount + $user_arrears,
                'month_due' =>   date('m'),
                'created_at'    => $month,
                'updated_at'    => $month,
                'admin_id' => \Auth::User()->id
            ]);

            $data = $this->getData($commercial->user_id);
            $datas[] = $data;
        }
        
        return $datas;
    }

    public function getAllResidentialInvoiceData()
    {
       return $this->client->where('type', 'residential')
                                    ->with('user')
                                    ->whereNotNull('initialAmount')
                                    ->get();
    }

    public function fillResidentialInvoiceData()
    {
        $datas = array();
        $month = Carbon::now();
        $residential_data = $this->getAllResidentialInvoiceData();
        foreach($residential_data as $residential)
        {
            $user_arrears = $this->getCategoryArrears($residential->user_id);

            $this->remmitance->create([
                'user_id' => $residential->user_id,
                'amount_to_pay' => $residential->initialAmount + $user_arrears,
                'arrears' => $residential->initialAmount + $user_arrears,
                'month_due' =>   date('m'),
                'created_at'    => $month,
                'updated_at'    => $month,
                'admin_id' => \Auth::User()->id
            ]);

            $data = $this->getData($residential->user_id);
            $datas[] = $data;
        }

        return $datas;
    }

    public function getData($user_id)
    {
        return DB::table('users')
                            ->join('clients', 'clients.user_id', 'users.id')
                            ->join('remmitances', 'remmitances.user_id', 'users.id')
                            ->where('remmitances.user_id', $user_id)
                            ->whereMonth('remmitances.created_at', date('m'))
                            ->whereYear('remmitances.created_at', date('Y'))
                            ->get();                          
    }

    public function checkMonth($user_id)
    {
        return $this->remmitance->where('user_id', $user_id)
                                ->whereMonth('created_at', date('m'))->exists();
    }
}
