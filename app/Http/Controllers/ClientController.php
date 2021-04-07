<?php

namespace App\Http\Controllers;

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
        return view('index');
    }

    public function addClient(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
            'address' => 'required|string|min:5',
            'phone' => 'required|string|min:11',
            'lga' => 'required|string|min:11',
        ]);
        $client = $this->clientService->addNewClient($request->all());
    }
    
    public function addUser()
    {
        return view('addUser');
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

    public function UpdateClient($id)
    {
        $users = User::findorFail($id);
    }

    public function deleteClient($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect('/index')->with('status', 'User Deleted Successfully');
    }
}
