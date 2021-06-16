<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\ClientService;
use App\Services\InvoiceService;
use NumberFormatter;
use App\Models\IndustrialRemmitance;
use App\Models\Payment;


class InvoiceController extends Controller
{

    protected $clientService, $userService, $invoiceService;
    public function __construct(
        ClientService $clientService,
        InvoiceService $invoiceService
    )
    {
        $this->clientService = $clientService;
        $this->invoiceService = $invoiceService;

        $this->middleware('auth');
    }

   
    public function showInvoice($id)
    {
       $users = $this->clientService->ClientProfile($id);
       $payment = $this->invoiceService->getAmountPaid($id);
       $remmitance = $this->invoiceService->getArreas($id);
       $arreas = $remmitance - $payment; 
       
       return view('admin.invoiceData', compact('users', 'arreas'));
    }

    public function InvoiceData(Request $request)
    {

        $datas = array(
            'industryName'  => $request['industryName'],
            'address'       => $request['address'],
            'invoiceMonth'  => date('F', mktime(0, 0, 0, $request['month_due'], 10)),
            'trip'          => $request['no_of_trip'],
            'perTrip'       => $request['perTrip'],
            'total1'        => $request['total1'],
            'currentCharge' => $request['currentCharge'],
            'netArreas'     => $request['netArreas'],
            'amount_to_pay' => $request['amount_to_pay'],
            'amtWord'       => $request['amtWord']
        );
        
        $industrial = $request->validate([
            'month_due'     => ['required'],
            'no_of_trip'    => ['required'],
            'amount_to_pay' => ['required']
        ]); 
        $industrial['user_id'] = $request['user_id'];

        $check_invoice = $this->invoiceService->checkInvoice($request['user_id'], $request['month_due']);
        if($check_invoice === 1){
            return redirect()->back()->with('status', 'Invoice Of This Month Has Been Generated For This User');
        }

        $industrial_remmitance = IndustrialRemmitance::create($industrial);
        return view('admin.industrialInvoice', compact('datas'));
    }

}
