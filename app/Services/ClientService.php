<?php

namespace App\Services;

use App\Models\User;

class ClientService
{

    protected $user;

    public function __construct(
        User $user
    )
    {
        $this->user = $user;
    }

    public function addNewClient(array $credentials)
    {
        return $this->user->create([
            'first_name' => $credentials['first_name'],
            'last_name' => $credentials['last_name'],
            'address' => $credentials['address'],
            'phone' => $credentials['phone'],
            'lga' => $credentials['lga'],
            'email' => $credentials['email'],
        ]);
    }

}

