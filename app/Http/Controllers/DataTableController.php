<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\ClientService;
use DataTables;
use DB;

class DataTableController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '
                           <a href="/show/'.$row->id.'" data-id="'.$row->id.'" id="editUser" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit User" class="badge badge-primary p-1"><i class="fas fa-user-edit"></i></a> |
                           <a href="/profile/'.$row->id.'" data-id="'.$row->id.'" id="editUser" data-bs-toggle="tooltip" data-bs-placement="top" title="Show user profile" class="badge badge-info p-1"><i class="fas fa-user-cog"></i></a>';
                            return $btn;
                    })->rawColumns(['action', 'checkbox'])
                    ->make(true);
        }
        
        return view('index');
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

    public function industryUser(Request $request)
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

    
    public function getUserPayment(Request $request)
    {            
        return view('admin.paymentHistory');
    }
}
