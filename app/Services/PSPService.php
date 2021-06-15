<?php

namespace App\Services;

use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

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

    public function addNewPSPVendor($request)
    {
        $ogwemaRef = $this->generateOgwemaRef();
        // dd($ogwemaRef);
        $data = array(
            'full_name'  => $request['full_name'],
            'phone'      => $request['phone'],
            'ogwema_ref' => $ogwemaRef,
            'email'      => $request['email'],
            'password'   => bcrypt('password'),
            'location'   => $request['location'],
            'role'       => 'subAdmin',
            'lga'        => $request['lga']
        );

       $newUser = $this->user->create($data);
       $user_id = $newUser->id;

       $client = array(
        'user_id' =>  $user_id,
        'type'  => $request['type'],  
        'enteredBy' => \Auth::User()->id,
        );
       return $this->client->create($client);

    }

    public function updatePSPVendor($request, $id)
    {
        $user = $this->user->where('id',$id)->first();
        $user->update([
            'full_name'  => $request['full_name'],
            'phone'      => $request['phone'],
            'location'   => $request['location'],
            'email'      => $request['email'],
            'lga'        => $request['lga'],
       ]);

       $client = $this->client->where('user_id', $id)->first();
       return $client->update([  
            'enteredBy' =>  \Auth::User()->id,
       ]);
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

    public function showPSPVendor($id)
    {
        return $this->user->where('id', $id)->with('client')->first();
    }

}
