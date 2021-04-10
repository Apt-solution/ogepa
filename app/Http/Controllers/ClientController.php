<?php

namespace App\Http\Controllers;
use App\Http\Requests\FormValidationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\ClientService;
use DataTables;

class ClientController extends Controller
{
    protected $clientService;
    public function __construct(
        ClientService $clientService

    )
    {
        $this->clientService = $clientService;
        $this->middleware('auth');
    }

    public function allUser()
    {
        $data = User::with('clientType')->get();
        return $data;
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

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '<a href="javascript:void(0)" id="editUser" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit User" class=""><i class="fas fa-edit"></i></a> |
                                    <a href="javascript:void(0)" id="delUser" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete User" class="link-danger"><i class="fas fa-trash-alt"></i></a>
                                    ';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('index');
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
        $user->email = $request->input('email');
        $user->state = $request->input('state');
        $user->address = $request->input('address');
        $user->save();
        return redirect()->back()->withInput()  
                                ->with('status', 'User Info Updated successfully');

    }

    public function deleteClient($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect('/index')->with('status', 'User Deleted Successfully');
    }
}
