<?php

namespace App\Http\Controllers;
use App\Http\Requests\FormValidationRequest;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\ClientService;
use App\Services\UserService;
use App\Services\ChartService;
use DataTables;
use DB;



class ClientController extends Controller
{
    protected $clientService, $userService, $chartService;
    public function __construct(
        ClientService $clientService,
        UserService $userService,
        ChartService $chartService

    )
    {
        $this->clientService = $clientService;
        $this->userService = $userService;
        $this->chartService = $chartService;
        $this->middleware('auth');
    }

    public function allUser()
    {
        return view('index');
    }
    
    public function addUser()
    {
        return view('addUser');
    }

    public function regClient(FormValidationRequest $request)
    {
        $this->clientService->addNewClient($request->all());
        return redirect()->back()->with('status', 'User Account Created');
    }

    public function showClient($id)
    {
       $users = $this->clientService->ClientProfile($id);
       return view('showUser', compact('users'));
    }

    public function ClientProfile($id)
    {
        $users = User::findorFail($id);
        $data = $this->userService->paymentHistory($id);
        $userchart = $this->chartService->userChart($id);
        $total = $this->clientService->total($id);
        return view('userprofile', compact('users', 'data', 'userchart', 'total'));
    }

    public function UpdateClient(Request $request, $id)
    {
        $this->clientService->updateClient($request->all(), $id);
        return redirect()->back()->with('status', 'User Data is Updated Successfully');
    }

}
