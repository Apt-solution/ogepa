<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AdminService;
use Session;

class AdminController extends Controller
{

    protected $adminService;
    public function __construct(
        AdminService $adminService
    ) {
        $this->adminService = $adminService;
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
}
