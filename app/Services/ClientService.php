<?php

namespace App\Services;

use App\Models\Client;
use App\Models\User;
use App\Models\ClientType;

use Illuminate\Support\Facades\Hash;
use App\Models\Payment;


class ClientService
{

    protected $user, $client;

    public function __construct(
        User $user,
        Payment $payment,
        Client $client,
        ClientType $clientType
    ) {
        $this->user = $user;
        $this->payment = $payment;
        $this->client = $client;
        $this->clientType = $clientType;
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
            'password'   => bcrypt('phone'),
            'lga'        => $request['lga']
        );

       $newUser = $this->user->create($data);
       $user_id = $newUser->id;

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
        return $this->client->where('user_id', $id)->with('user')->first();  
    }

    public function updateClient($request, $id)
    {
       $user = $this->user->where('id',$id)->first();
       $user->update([
            'full_name'  => $request['full_name'],
            'phone'      => $request['phone'],
            'email'      => $request['email'],
            'password'   => bcrypt('phone'),
            'lga'        => $request['lga'],
       ]);

       $client = $this->client->where('user_id', $id)->first();
       return $client->update([
            'type'  => $request['type'],
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
