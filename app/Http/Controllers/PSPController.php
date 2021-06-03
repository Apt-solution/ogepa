<?php

namespace App\Http\Controllers;
use App\Http\Requests\PSPFormValidation;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\ClientService;
use App\Services\UserService;
use App\Services\PSPService;
use DataTables;
use DB;

class PSPController extends Controller
{
    protected $PSPService;
    public function __construct(PSPService $PSPService)
    {
        $this->PSPService = $PSPService;
        $this->middleware('auth');
    }
    
    public function showPSP()
    {
        return view('PSP.register');
    }

    public function regPSP(PSPFormValidation $request)
    {
        $this->PSPService->addNewPSP($request->all());
        return redirect()->back()->with('status', 'PSP Account Created');
    }

    public function showClient($id)
    {
        $users = User::findorFail($id);
        return view('showUser', compact('users'));
    }


    public function UpdateClient(FormValidationRequest $request , $id)
    {
        $user = User::findorFail($id);
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->phone = $request->input('phone');
        $user->client_type = $request->input('client_type');
        $user->lga = $request->input('lga');
        $user->address = $request->input('address');
        $user->save();
        return redirect()->back()->withInput()  
                                ->with('status', 'User Info Updated successfully');
    }
}
