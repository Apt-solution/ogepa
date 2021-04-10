<?php

namespace App\Services;

use App\Models\ClientType;

class AdminService
{

    protected $clientType;

    public function __construct(
        ClientType $clientType
    ) {
        $this->clientType = $clientType;
    }

    public function getAutomatedPrice()
    {
        return $automatedPrice = $this->clientType->all();
    }

    public function updateAutomatedService(array $credentials)
    {
        return $this->clientType->where('id', $credentials['id'])
        ->update([
            'monthly_payment' => $credentials['monthly_payment']
        ]);
    }

}