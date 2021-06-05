<?php

namespace App\Http\Controllers;
use App\Models\Industrial;

use Illuminate\Http\Request;
use App\Services\ClientService;


class InvoiceController extends Controller
{

    protected $clientService, $userService, $chartService;
    public function __construct(
        ClientService $clientService
    )
    {
        $this->clientService = $clientService;
        $this->middleware('auth');
    }

    public function showInvoice($id)
    {
       $users = $this->clientService->ClientProfile($id);
       return view('admin.invoiceData', compact('users'));
    }

    public function InvoiceData(Request $request)
    {
        $industrial = array(
            'industryName' => $request['industryName'],
            'address'       => $request['address'],
            'invoiceMonth'       => $request['invoiceMonth'],
            'trip'       => $request['trip'],
            'perTrip'       => $request['perTrip'],
            'total1'       => $request['total1'],
            'currentCharge'       => $request['currentCharge'],
            'netArreas'       => $request['netArreas'],
            'total2'        => $request['total2'],
            'amtWords'      => $request['amtWords']
        );
        $datas = Industrial::create($industrial);
        return view('admin.invoice', compact('datas'));
    }
}
