<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\ClientService;
use App\Services\InvoiceService;
use NumberFormatter;
use App\Models\IndustrialRemmitance;
use App\Models\Payment;
use DataTables;
use DB;


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
            'amount_to_pay' => ['required'],
        ]); 
        $industrial['user_id'] = $request['user_id'];
        $industrial['arreas'] = $request['amount_to_pay'];

        $check_invoice = $this->invoiceService->checkInvoice($request['user_id'], $request['month_due']);
        if($check_invoice === 1){
            $request->session()->forget('status');
            return redirect()->back()->with('status', 'Invoice Of This Month Has Been Generated For This User');
        }

        $check_old_invoice = $this->invoiceService->checkOldInvoice($request['user_id']);
        $newInvoice = $check_old_invoice + 1;
        if($check_old_invoice){
            if($newInvoice < $request['month_due']){
                return redirect()->back()->with('status', 'Invoice Of Last Month Has Not Been Generated For This User');
            }
            if($check_old_invoice > $request['month_due']){
                return redirect()->back()->with('status', 'Sorry, you can not generate invoice of an old month, kindly check the invoice in the invoice history ');
            }
        }
        
        $industrial_remmitance = IndustrialRemmitance::create($industrial);
        return view('admin.industrialInvoice', compact('datas'));
    }

    public function getArreas(Request $request)
    {
        $month = $this->invoiceService->checkOldInvoice($request->user_id);
        $arreas = $this->invoiceService->getArreas($request->user_id, $month + 1);
        return response($arreas);
    }

    public function getUserInvoiceData($id)
    {
        $invoice_data = $this->invoiceService->getUserInvoiceData($id);
        $last_month_arrears = $this->invoiceService->getPreviousMonthArrears($id);
        return view('admin.industrialInvoice', compact('invoice_data', 'last_month_arrears'));

    }

    public function getInvoiceList(Request $request)
    {       
        if ($request->ajax()) {
            $payments = DB::table('users')
            ->join('clients', 'clients.user_id', '=', 'users.id')
            ->join('industrial_remmitances', 'industrial_remmitances.user_id', '=', 'users.id')
            ->select(['industrial_remmitances.id', 'industrial_remmitances.amount_to_pay', 'industrial_remmitances.no_of_trip', 'industrial_remmitances.month_due', 'industrial_remmitances.arreas', 'users.full_name', 'clients.type', 'clients.sub_client_type', 'clients.initialAmount', 'users.ogwema_ref']);
            return Datatables::of($payments)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="/user-invoice-data/'.$row->id.'" data-id="'.$row->id.'" id="editUser" data-bs-toggle="tooltip" data-bs-placement="top" title="Print Invoice" class="badge badge-primary p-1"><i class="fas fa-receipt"></i></a>';
                         return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.invoiceHistory');
    }


}
