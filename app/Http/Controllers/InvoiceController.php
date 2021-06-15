<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\ClientService;
use App\Services\AdminService;
use NumberFormatter;
use App\Models\IndustrialRemmitance;

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
        $industrial_remmitance = IndustrialRemmitance::create($industrial);
        return view('admin.industrialInvoice', compact('datas'));
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
