<?php

namespace App\Http\Controllers;
use App\Http\Requests\FormValidationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\ClientService;
use DataTables;
use DB;

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
                           $btn = '<a href="/show/'.$row->id.'" data-id="'.$row->id.'" id="editUser" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit User" class="badge badge-primary p-1"><i class="fas fa-user-edit"></i></a> |
                           <a href="/profile/'.$row->id.'" data-id="'.$row->id.'" id="editUser" data-bs-toggle="tooltip" data-bs-placement="top" title="Show user profile" class="badge badge-info p-1"><i class="fas fa-user-cog"></i></a>';
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

    public function ClientProfile($id)
    {
        $users = User::findorFail($id);
        return view('userprofile', compact('users'));
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

    public function residentialUser(Request $request)
    {
        if ($request->ajax()) {
            $residential = DB::select('select * from users where client_type = ?', ['residential']);
            return Datatables::of($residential)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<a href="/show/'.$row->id.'" data-id="'.$row->id.'" id="editUser" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit User" class="badge badge-primary p-1"><i class="fas fa-user-edit"></i></a> |
                           <a href="/profile/'.$row->id.'" data-id="'.$row->id.'" id="editUser" data-bs-toggle="tooltip" data-bs-placement="top" title="Show user profile" class="badge badge-info p-1"><i class="fas fa-user-cog"></i></a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('index');
    }

    public function commercialUser(Request $request)
    {
        if ($request->ajax()) {
            $commercial = DB::select('select * from users where client_type = ?', ['commercial']);
            return Datatables::of($commercial)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<a href="/show/'.$row->id.'" data-id="'.$row->id.'" id="editUser" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit User" class="badge badge-primary p-1"><i class="fas fa-user-edit"></i></a> |
                           <a href="/profile/'.$row->id.'" data-id="'.$row->id.'" id="editUser" data-bs-toggle="tooltip" data-bs-placement="top" title="Show user profile" class="badge badge-info p-1"><i class="fas fa-user-cog"></i></a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('index');
    }

    public function IndustryUser(Request $request)
    {
        if ($request->ajax()) {
            $industry = DB::select('select * from users where client_type = ?', ['industrial']);
            return Datatables::of($industry)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<a href="/show/'.$row->id.'" data-id="'.$row->id.'" id="editUser" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit User" class="badge badge-primary p-1"><i class="fas fa-user-edit"></i></a> |
                           <a href="/profile/'.$row->id.'" data-id="'.$row->id.'" id="editUser" data-bs-toggle="tooltip" data-bs-placement="top" title="Show user profile" class="badge badge-info p-1"><i class="fas fa-user-cog"></i></a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('index');
    }

    public function medicalUser(Request $request)
    {
        if ($request->ajax()) {
            $medical = DB::select('select * from users where client_type = ?', ['medical']);
            return Datatables::of($medical)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<a href="/show/'.$row->id.'" data-id="'.$row->id.'" id="editUser" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit User" class="badge badge-primary p-1"><i class="fas fa-user-edit"></i></a> |
                           <a href="/profile/'.$row->id.'" data-id="'.$row->id.'" id="editUser" data-bs-toggle="tooltip" data-bs-placement="top" title="Show user profile" class="badge badge-info p-1"><i class="fas fa-user-cog"></i></a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('index');
    }

}
