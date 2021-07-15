<?php

namespace App\Services;

use App\Models\Client;
use App\Models\User;
use App\Models\ClientType;
use App\Models\IndustrialRemmitance;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Payment;
use App\Models\Remmitance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ClientService
{

    protected $user, $client;
    protected $remmitance;
    protected $industrialRemmitance;

    public function __construct(
        User $user,
        Payment $payment,
        Client $client,
        ClientType $clientType,
        Remmitance $remmitance,
        IndustrialRemmitance $industrialRemmitance
    ) {
        $this->user = $user;
        $this->payment = $payment;
        $this->client = $client;
        $this->clientType = $clientType;
        $this->remmitance = $remmitance;
        $this->industrialRemmitance = $industrialRemmitance;
    }

    public function addNewClient($request)
    { 
        $ogwemaRef = $this->generateOgwemaRef();
        // dd($ogwemaRef);
        $data = array(
            'full_name'  => $request['full_name'],
            'phone'      => $request['phone'],
            'ogwema_ref' => $ogwemaRef,
            'email'      => $request['email'],
            'password'   => bcrypt(12345678),
            'lga'        => $request['lga']
        );

        $newUser = $this->user->create($data);
        $user_id = $newUser->id;
        $request['user_id'] = $user_id;

        $this->generateDummyData($request);

        $client = array(
            'user_id' =>  $user_id,
            'type'  => $request['type'],
            'sub_client_type'      => $request['sub_client_type'],
            'no_of_sub_client_type'      => $request['no_of_sub_client_type'],
            'address' => $request['address'],
            'initialAmount' => $request['monthlyPayment'],
            'enteredBy' => \Auth::User()->id,
        );
        return $this->client->create($client);
    }

    public function generateDummyData($request)
    {
        if ($request['type'] !== 'Industrial') {

            $this->remmitance->create([
                'user_id' => $request['user_id'],
                'amount_to_pay' => 0,
                'month_due' => date('m'),
                'arrears' => 0,
                'admin_id' => Auth::User()->id
            ]);

        }

        if ($request['type'] === 'Industrial') {

            $this->industrialRemmitance->create([
                'user_id' => $request['user_id'],
                'amount_to_pay' => 0,
                'month_due' => date('m'),
                'no_of_trip' => 0,
                'arreas' => 0
            ]);
            
        }

    }

    private function generateOgwemaRef()
    {
        $ref = rand(11111111, 99999999);
        // check if code exist before
        $chk = $this->user->where('ogwema_ref', $ref)->first();
        if ($chk) {
            $this->generateOgwemaRef();
        }
        return $ref;
    }

    public function total($id)
    {
        return $this->payment->where('user_id', $id)->where('status', 'successful')->sum('amount');
    }

    public function ClientProfile($id)
    {
        return $this->user->where('id', $id)->with('client')->first();
    }

    public function updateClient($request, $id)
    {
        $user = $this->user->where('id', $id)->first();
        $user->update([
            'full_name'  => $request['full_name'],
            'phone'      => $request['phone'],
            'email'      => $request['email'],
            'password'   => bcrypt(12345678),
            'lga'        => $request['lga'],
        ]);

        $client = $this->client->where('user_id', $id)->first();
        return $client->update([
            'sub_client_type'      => $request['sub_client_type'],
            'no_of_sub_client_type'      => $request['no_of_sub_client_type'],
            'address' => $request['address'],
            'initialAmount' => $request['monthlyPayment']
        ]);
    }

    public function monthlyPayment()
    {
        return $this->clientType->where('sub_client_type', 'room')->get('monthly_payment');
    }
}
