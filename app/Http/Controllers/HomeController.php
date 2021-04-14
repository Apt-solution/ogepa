<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AdminService;
use App\Models\User;
use App\Models\Payment;
use Carbon\Carbon;
use DB;

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
        // setting payment every month
        if (\Auth::User()->role === 'admin') {
            $this->adminService->userMonthlyPrice();
        }
        // return user to user profile
        if (\Auth::User()->role === 'user') {
            return redirect('user_profile');
        }
        $residential = User::where('client_type', 'residential')->count();
        $commercial = User::where('client_type', 'commercial')->count();
        $industrial = User::where('client_type', 'industrial')->count();
        $medical = User::where('client_type', 'medical')->count();
        if (\Auth::User()->role === 'admin') {
            $this->adminService->userMonthlyPrice();
        }
       $amount = DB::table('payments')->sum('ogwema_amount');
       return view('home', compact(['residential', 'commercial', 'industrial', 'medical', 'amount']));
    }


}
