<?php

namespace App\Services;

use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use App\Models\Payment;


class PSPService
{

    protected $user, $client;

    public function __construct(
        User $user,
        Client $client
    ) {
        $this->user = $user;
        $this->client = $client;
    }

    public function addNewPSP($request)
    {
        $ogwemaRef = $this->generateOgwemaRef();
        // dd($ogwemaRef);
        $data = array(
            'full_name'  => $request['full_name'],
            'phone'      => $request['phone'],
            'location'   => $request['location'],
            'role'       =>  'subAdmin',
            'email'      => $request['email'],
            'ogwama_ref'   => $ogwemaRef,
            'password'   => bcrypt($request['password']),
        );

       $newUser = $this->user->create($data);
       $user_id = $newUser->id;

       $client = array(
        'user_id' =>  $user_id,
        'type'  => 'PSP',
        'ogwama_ref'      => $ogwemaRef,
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
}
