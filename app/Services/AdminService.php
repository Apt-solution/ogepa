<?php

namespace App\Services;

use App\Models\ClientType;
use App\Models\User;
use App\Models\remmitance;
use App\Models\Payment;
use App\Models\Client;
use Session;
use Illuminate\Support\Facades\Hash;

class AdminService
{

    protected $clientType, $user, $remmitance, $payment, $client;

    public function __construct(
        ClientType $clientType,
        User $user,
        remmitance $remmitance,
        Payment $payment,
        Client $client
    ) {
        $this->clientType = $clientType;
        $this->user = $user;
        $this->remmitance = $remmitance;
        $this->payment = $payment;
        $this->client = $client;
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

    public function getSearchPayment()
    {
        $request = Session::get('request');
        return $this->payment->whereDate('created_at', '>=', $request['from'])
        ->whereDate('created_at', '<=', $request['to'])
        ->where('status', 'successful')->get();
    }

    public function userReceipt($id)
    {
      return $this->payment::where('id', $id)->with('user')->get();    
    }

    public function registerAdmin(array $data)
    {
        return $this->user->create([
            'full_name' => $data['name'],
            'email' => $data['email'],
            'location' => $data['location'],
            'role' => 'subAdmin',
            'phone' => 000,
            'lga' => 'abeokuta_south',
            'ogwema_ref' => 00,
            'password' => Hash::make($data['password']),
        ]);
    }

    public function getIndustrialClients()
    {
        return $this->client->where('type','Industrial')->get();
    }

    public function getIndustrialCharge()
    {
        return $this->clientType->where('client_type','Industrial')->get();
    }

    public function addIndustrialCharge(array $credentials)
    {
        $num = count($credentials['id']);
        for ($i=0; $i < $num; $i++) { 
            $this->remmitance->create([
                'user_id' => $credentials['id'][$i],
                'amount_to_pay' => $credentials['amount'][$i],
                'month_due' => $credentials['amount'][$i],
                'admin_id' => \Auth::User()->id,
            ]);
        }
        return $credentials;
    }

    public function getIndustrialBill($month)
    {
        return $this->remmitance->whereMonth('created_at', $month)
        ->whereYear('created_at', date('Y'))->get();
    }
}
