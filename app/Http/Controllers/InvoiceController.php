<?php

namespace App\Http\Controllers;
use App\Models\Industrial;

use Illuminate\Http\Request;
use App\Services\ClientService;
use App\Services\AdminService;
use NumberFormatter;
use Session;

class InvoiceController extends Controller
{

    protected $clientService, $userService, $adminService;
    public function __construct(
        ClientService $clientService,
        AdminService $adminService
    )
    {
        $this->clientService = $clientService;
        $this->adminService = $adminService;

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
        $amt = new NumberFormatter("en", NumberFormatter::SPELLOUT);
        $amtWord = $amt->format($request['total1']);
        return view('admin.industrialInvoice', compact('datas', 'amtWord'));
    }

    // public function industrialInvoice()
    // {
    //     $month =  Session::get('month');
    //     $amt = new NumberFormatter("en", NumberFormatter::SPELLOUT);
    //     $amtWord = $amt->format(1000);
    //     $bills = $this->adminService->getIndustrialBill($month);
    //     return view('admin.industrialInvoice', compact('bills', 'amtWord'));
    // }

}
