<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Services\AdminService;
use App\Services\ChartService;
use App\Models\User;
use App\Models\Payment;
use Carbon\Carbon;
use DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $adminService, $chartService;
    public function __construct(AdminService $adminService, ChartService $chartService)
    {
        $this->middleware('auth');
        $this->adminService = $adminService;
        $this->chartService = $chartService;

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // setting payment every month
        // if (\Auth::User()->role === 'admin') {
        //     $this->adminService->userMonthlyPrice();
        // }
        // return user to user profile
        if (\Auth::User()->role === 'user') {
            return redirect('user_profile');
        }
        $residential = Client::where('type', 'residential')->count();
        $commercial = Client::where('type', 'commercial')->count();
        $industrial = Client::where('type', 'industrial')->count();
        $medical = Client::where('type', 'medical')->count();
        // $monthRemmitance = $this->adminService->getMonthRemmitance();
        $industrialChart = $this->chartService->getIndustrialChart();
        $medicalChart = $this->chartService->getMedicalChart();
        $commercialChart = $this->chartService->getCommercialChart();
        $residentialChart = $this->chartService->getResidentialChart();
        $allClientTypeChart = $this->chartService->allClientTypeChart();
        // // if (\Auth::User()->role === 'admin') {
        //     $this->adminService->userMonthlyPrice();
        // }
        return view('home', compact(['residential', 'commercial', 'industrial', 'medical', 'industrialChart', 'medicalChart', 'commercialChart', 'residentialChart', 'allClientTypeChart']));
    }


}
