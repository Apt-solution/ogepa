<?php

namespace App\Http\Controllers;
use App\Http\Requests\FormValidationRequest;
use App\Models\Client;
use App\Models\User;
use App\Models\Payment;
use App\Models\Remmitance;
use App\Models\IndustrialRemmitance;
use App\Models\ClientType;
use Illuminate\Http\Request;
use App\Services\ClientService;
use App\Services\UserService;
use App\Services\ChartService;
use DataTables;
use DB;
use Illuminate\Validation\Rule;

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
    
    public function addUser(Request  $request)
    {
        $monthlyPayment = $this->clientService->monthlyPayment($request['sub_client_type']);
        return view('addUser', compact($monthlyPayment));
    }

    public function regClient(FormValidationRequest $request)
    {
        $this->clientService->addNewClient($request->all());
        return redirect()->back()->with('status', 'Account Created');
    }

    public function showClient($id)
    {
       $users = $this->clientService->ClientProfile($id);
    //    return view('showUser', compact('users'));
        return response()->view('showUser', compact('users'));
    }

    public function ClientProfile($id)
    {
        $data = $this->userService->paymentHistory($id);
        $userchart = $this->chartService->userChart($id);
        $total = $this->clientService->total($id);
        return view('userprofile', compact('users', 'data', 'userchart', 'total'));
    }

    public function UpdateClient(Request $request, $id)
    {
        $validated = $request->validate([
            'no_of_sub_client_type' => ['required'],
            'full_name' => ['required','string'],
            'address'    => ['required'],
            'monthlyPayment' => ['required', 'regex:/^\d+(\.\d{1,2})?$/']
        ]);

        $this->clientService->updateClient($request->all(), $id);
        return redirect()->back()->with('status', 'User Data is Updated Successfully');
    }

    public function deleteClient($id)
    {
        $user = User::where('id', $id);
        $client = Client::where('user_id', $id);
        $payment = Payment::where('user_id', $id);
        $remmitance = Remmitance::where('user_id', $id);
        $industrial_remmitance = IndustrialRemmitance::where('user_id', $id);
        $client->delete();
        $user->delete();
        $payment->delete();
        $remmitance->delete();
        $industrial_remmitance->delete();
        return redirect()->back()->with('status', 'Data Deleted');
    }

    public function getPayment(Request $request)
    {
        $payment = ClientType::where('sub_client_type', $request->sub_category)->value('monthly_payment');
        return response($payment);
    }

}
