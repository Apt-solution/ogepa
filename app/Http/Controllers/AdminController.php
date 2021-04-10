<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AdminService;

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

    public function setMonthlyPrice()
    {
        $allUser = $this->adminService->userMonthlyPrice();
        return $allUser;
        // foreach($allUser as $allUsers){
        //     echo '<li>'. $allUsers->ogwema_ref . ' '. $allUsers->client_type.' '. $allUsers->clientType->monthly_payment .'</li>';
        // }
    }
}
