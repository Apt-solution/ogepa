<?php

namespace App\Services;

use App\Models\ClientType;
use App\Models\User;
use App\Models\remmitance;

class UserService
{

    protected $clientType, $user, $remmitance;

    public function __construct(
        ClientType $clientType,
        User $user,
        remmitance $remmitance
    ) {
        $this->clientType = $clientType;
        $this->user = $user;
        $this->remmitance = $remmitance;
    }

    public function getUserProfile()
    {
        $user_id = \Auth::User()->id;
        $data['user_details'] = $this->user->where('id', $user_id)->first();
        $data['current_billing'] = $this->currentBilling($user_id);
        // dd($data);
        return $data;
    }
    
    private function currentBilling(int $user_id)
    {
        $remmitance = $this->remmitance->where('id', $user_id)->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->get('amount_to_pay')->first();
        if(!$remmitance){
            return 0;
        }
        return $remmitance;
    }

}