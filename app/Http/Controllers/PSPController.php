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
use Illuminate\Validation\Rule;

class PSPController extends Controller
{
    protected $PSPService;
    public function __construct(PSPService $PSPService)
    {
        $this->PSPService = $PSPService;
        $this->middleware('auth');
    }
    
    public function showPSPVendor()
    {
        return view('PSPVendor.register-psp-vendor');
    }

    public function regPSPVendor(PSPFormValidation $request)
    {
        $this->PSPService->addNewPSPVendor($request->all());
        return redirect()->back()->with('status', 'Account Created');
    }

    public function updatePSPVendor(Request $request , $id)
    {
        $validated = $request->validate([
<<<<<<< HEAD
=======
            'phone' => ['nullable', 
                        'digits:11',
                         Rule::unique('users')->ignore($id)
                       ],
            'email' => ['nullable',
                       'regex:/(.+)@(.+)\.(.+)/i',
                       Rule::unique('users')->ignore($id)
                      ],
>>>>>>> 8b9acd58a595f0f7735ce57633604fe8a4f86b34
            'full_name' => ['required','string'],
            'lga'       => ['required'],
            'location'  => ['required']
        ]);

        $this->PSPService->updatePSPVendor($request->all(), $id);
        return redirect()->back()->with('status', 'Data is Updated Successfully');
    }

    public function PSPVendorDetails($id)
    {
        $psp_vendor = $this->PSPService->showPSPVendor($id);
        return view('PSPVendor.psp-vendor-details', compact('psp_vendor'));
    }
}
