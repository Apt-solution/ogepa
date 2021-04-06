<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ClientService;

class ClientController extends Controller
{
    protected $clientService;
    public function __construct(
        ClientService $clientService
    )
    {
        $this->clientService = $clientService;
    }

    public function addClient(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
            'address' => 'required|string|min:5',
            'phone' => 'required|string|min:11',
            'lga' => 'required|string|min:11',
        ]);
        $client = $this->clientService->addNewClient($request->all());
    }
}
