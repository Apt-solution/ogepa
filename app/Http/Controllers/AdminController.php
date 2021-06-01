<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use App\Models\ClientType;
use DataTables;
use Illuminate\Http\Request;
use App\Services\AdminService;
use App\Services\UserService;
use Session;
use DB;

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
        return redirect()->back()->with('success', 'sub-admin added successfully');
    }

    public function addIndustrialPayment()
    {
        $industries = $this->adminService->getIndustrialClients();
        $industriesCharges = $this->adminService->getIndustrialCharge();
        return view('admin.addIndustrialPayment')->with('industries', $industries)->with('industriesCharges', $industriesCharges);
    }



    


}
