<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AdminService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $adminService;
    public function __construct(AdminService $adminService)
    {
        $this->middleware('auth');
        $this->adminService = $adminService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::User()->role === 'admin'){
            $this->adminService->userMonthlyPrice();
        }
        return view('home');
    }
}
