<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Payment;
use App\Models\User;
use App\Models\ClientType;
use DataTables;
use Illuminate\Http\Request;
use App\Services\AdminService;
use App\Services\UserService;
use Session;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class AdminController extends Controller
{

    protected $adminService, $userService;
    public function __construct(
        AdminService $adminService,
        UserService $userService
    ) {
        $this->adminService = $adminService;
        $this->userService = $userService;
    }


    public function automatedPrice()
    {
        $automatedPrice = $this->adminService->getAutomatedPrice();
        return view('admin.automatedPrice')->with('automatedPrice', $automatedPrice);
    }

    public function editAutomatedPrice(Request $request)
    {
        $this->adminService->updateAutomatedService($request->all());
        return redirect()->back()->with('success', 'amount update successfully');
    }

    public function payments()
    {
        return view('admin.searchPayments');
    }

    public function searchPayment(Request $request)
    {
        $request->validate([
            'from' => 'required',
            'to' => 'required',
        ]);
        Session::put('request', $request->all());
        return redirect('getSearchPayment');
    }

    public function getSearchPayment()
    {
        $payments = $this->adminService->getSearchPayment();
        return view('admin.payment')->with('payments', $payments);
    }

    public function userReceipt($id)
    {
        $id = Payment::where('id', $id)->value('id');
        $payments = $this->adminService->userReceipt($id);
        return view('admin.receipt', compact('payments'));
    }

    public function addSubAdmin()
    {
        return view('admin.addSubAdmin');
    }

    public function registerSubAdmin(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $this->adminService->registerAdmin($request->all());
        return redirect()->back()->with('success', 'commercial officer added successfully');
    }

    public function addIndustrialPayment()
    {
        $industries = $this->adminService->getIndustrialClients();
        $industriesCharges = $this->adminService->getIndustrialCharge();
        return view('admin.addIndustrialPayment')->with('industries', $industries)->with('industriesCharges', $industriesCharges);
    }

    public function addIndustrialData(Request $request)
    {
        $data = $this->adminService->addIndustrialCharge($request->all());
        return redirect()->back()->with('success', 'charges added successfully');
    }

    public function printIndustrialBill()
    {
        return view('admin.printIndustrialBill');
    }

    public function industrialBill(Request $request)
    {
        $bill = $this->adminService->getIndustrialBill($request->month);
        if ($bill->isEmpty()) {
            return redirect()->back()->with('error', 'no data found');
        }
        Session::put('month', $request->month);
        return redirect()->route('print-invoice');
    }

    public function printInvoice()
    {
        $month =  Session::get('month');
        $bills = $this->adminService->getIndustrialBill($month);
        return view('admin.printInvoice')->with('bills', $bills);
    }

    public function industrialPayment()
    {
        $industries = $this->adminService->getIndustrialClients();
        return view('admin.industrialPayment')->with('industries', $industries);
    }

    public function addAmountPaid(Request $request)
    {
        // check if the money 
        $checkIfAmountExist = $this->adminService->checkIfAmountExist($request->all());
        if (!$checkIfAmountExist) {
            return redirect()->back()->with('error', 'industry selected dont have payment in selected month');
        }

        $checkMonth = $this->adminService->checkRecentMonth($request['industry_id']);
        if($request['month'] < $checkMonth) {
            return redirect()->back()->with('error', 'Sorry! You can only pay the recent month of invoice generated');
        }

        Session::put('user_id', $request['industry_id']);
        Session::put('month', $request['month']);
        return redirect('enter-amount-paid');
    }

    public function enterAmountPaid()
    {
        return view('admin.enterAmountPaid');
    }

    public function addIndustrialAmountPaid(Request $request)
    {
        $validate = $request->validate([
            'amount_to_pay' => ['required']
        ]);
        $totalAmount = $this->adminService->checkAmountToPay($request['user_id']);
    
        if($request['amount'] > $totalAmount) {
            return redirect()->back()->with('error', "Amount is more than the amount to pay \n. kindly check the invoice history to check the anount to pay");
        }
        $this->adminService->addIndustrialAmountPaid($request->all());
        $amount_paid = $request['amount'];
        $amount_to_pay = $this->adminService->checkAmountToPay($request['user_id']);
        $arreas = $amount_to_pay -  $amount_paid;
        $this->adminService->fillArreas($request['user_id'], $request['month'], $arreas);
        return redirect()->route('industrial-paid-payment')->with('success', 'amount entered successfully');
    }

    public function addIndForCommOff()
    {
        $officers = $this->adminService->getCOmmercialOfficers();
        // dd($officers);
        return view('admin.addIndForCommOff')->with('officers', $officers);
    }

    public function action(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = DB::table('users')
                    ->join('clients', 'users.id', '=', 'clients.user_id')
                    ->select('users.*', 'clients.*')
                    ->where('clients.type', 'industrial')
                    ->where('users.full_name', 'like', '%' . $query . '%')
                    ->orWhere('users.phone', 'like', '%' . $query . '%')
                    ->orderBy('users.id', 'desc')
                    ->get();


                // $data = Client::where('code', 'like', '%' . $query . '%')
                //     ->orWhere('description', 'like', '%' . $query . '%')
                //     ->orderBy('id', 'desc')
                //     ->get();
            } else {
                // $data = DB::table('users')
                //     ->join('clients', 'users.id', '=', 'clients.user_id')
                //     ->select('users.*', 'clients.*')
                //     ->where('clients.type', 'industrial')
                //     ->get();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= '
          <div class="col-sm-12 rst"
          data-full_name = "' . $row->full_name . '"
          data-phone = "' . $row->phone . '"
          data-user_id = "' . $row->user_id . '"
          style="cursor:pointer;"
          >' . $row->full_name . ' (' . $row->user_id . ')</div>';
                }
            } else {
                $output = '
       <tr>
       <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }

    public function addIndustryForOfficer(Request $request)
    {
        $industryAdded = $this->adminService->enterIndustryFOrOfficer($request->all());
        return redirect()->back()->with('success', 'industry added for commercial officer successfully');
    }
}
