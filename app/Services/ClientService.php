<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ClientService
{

    protected $user;

    public function __construct(
        User $user
    ) {
        $this->user = $user;
    }

    public function addNewClient($request)
    {
        $ogwemaRef = $this->generateOgwemaRef();
        // dd($ogwemaRef);
        $data = array(
            'first_name' => $request['first_name'],
            'last_name'  => $request['last_name'],
            'phone'      => $request['phone'],
            'email'      => $request['phone'],
            'password'      => Hash::make($ogwemaRef),
            'address'    => $request['address'],
            'ogwema_ref' => $ogwemaRef,
            'lga' => $request['lga'],
            'client_type' => $request['client_type'],
        );
        return$this->user->create($data);
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
}
