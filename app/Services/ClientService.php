<?php

namespace App\Services;

use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use App\Models\Payment;


class ClientService
{

    protected $user, $client;

    public function __construct(
        User $user,
        Payment $payment,
        Client $client
    ) {
        $this->user = $user;
        $this->payment = $payment;
        $this->client = $client;
    }

    public function addNewClient($request)
    {
        $ogwemaRef = $this->generateOgwemaRef();
        // dd($ogwemaRef);
        $data = array(
            'full_name'  => $request['full_name'],
            'phone'      => $request['phone'],
            'email'      => $request['phone'],
            'password'   => bcrypt($ogwemaRef),
        );

       $newUser = $this->user->create($data);
       $user_id = $newUser->id;

       $client = array(
        'user_id' =>  $user_id,
        'type'  => $request['type'],
        'sub_client_type'      => $request['sub_client_type'],
        'no_of_sub_client_type'      => $request['no_of_sub_client_type'],
        'ogwama_ref'      => bcrypt($ogwemaRef),
        'address' => $request['address'],
        'lga'        => $request['lga'],
        'enteredBy' => \Auth::User()->id,
    );
       return $this->client->create($client);
    }

    private function generateOgwemaRef()
    {
        $ref = rand(11111111, 99999999);
        // check if code exist before
        $chk = $this->client->where('ogwama_ref', $ref)->first();
        if ($chk) {
            $this->generateOgwemaRef();
        }
        return $ref;
    }

    public function total($id)
    {
        return $this->payment->where('user_id', $id)->where('status', 'successful')->sum('amount');
    }

    private function PSP(Request $request)
    {
        if($request->input('type') == "PSP")
        {
            return 'subAdmin';
        }
    }
}
