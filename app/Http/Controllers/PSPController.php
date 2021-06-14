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
        return redirect()->back()->with('status', 'Account Created');
    }

    public function UpdatePSP(Request $request , $id)
    {
        $validated = $request->validate([
            'phone' => ['required', 
                        'digits:11',
                         Rule::unique('users')->ignore($id)
                       ],
            'email' => ['email',
                        'regex:/(.+)@(.+)\.(.+)/i',
                        Rule::unique('users')->ignore($id)
                       ],
            'full_name' => ['required','string'],
            'lga'       => ['required'],
            'location'  => ['required']
        ]);

        $this->PSPService->updatePSP($request->all(), $id);
        return redirect()->back()->with('status', 'User Data is Updated Successfully');
    }
}
