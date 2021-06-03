<?php
namespace App\Http\Controllers;

use App\Models\Payment;
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
            $data = DB::table('users')
            ->join('clients', 'users.id', '=', 'clients.user_id')
            ->select(['users.id', 'users.full_name', 'users.phone', 'clients.user_id', 'clients.type', 'clients.sub_client_type', 'clients.no_of_sub_client_type', 'clients.lga', 'clients.ogwama_ref', 'clients.address'])
            ->where('clients.type', 'residential')
            ->orWhere('clients.type', 'industrial')
            ->orWhere('clients.type', 'medical')
            ->orWhere('clients.type', 'commercial')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="#" data-id="'.$row->id.'" id="editUser" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit User" class="badge badge-primary p-1"><i class="fas fa-user-edit"></i></a> |
                        <a href="#" data-id="'.$row->id.'" id="editUser" data-bs-toggle="tooltip" data-bs-placement="top" title="Show user profile" class="badge badge-info p-1"><i class="fas fa-user-cog"></i></a>';
                         return $btn;
                    })->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('index');
    }

    public function residentialUser(Request $request)
    {
        if ($request->ajax()) {
            $residential = DB::table('users')
            ->join('clients', 'users.id', '=', 'clients.user_id')
            ->select(['users.id', 'users.full_name', 'users.phone', 'clients.user_id', 'clients.type', 'clients.sub_client_type', 'clients.no_of_sub_client_type', 'clients.lga', 'clients.ogwama_ref', 'clients.address'])
            ->where('clients.type', 'Residential');
            return Datatables::of($residential)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="#" data-id="'.$row->id.'" id="editUser" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit User" class="badge badge-primary p-1"><i class="fas fa-user-edit"></i></a> |
                        <a href="#" data-id="'.$row->id.'" id="editUser" data-bs-toggle="tooltip" data-bs-placement="top" title="Show user profile" class="badge badge-info p-1"><i class="fas fa-user-cog"></i></a>';
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
            $commercial =DB::table('users')
            ->join('clients', 'users.id', '=', 'clients.user_id')
            ->select(['users.id', 'users.full_name', 'users.phone', 'clients.user_id', 'clients.type', 'clients.sub_client_type', 'clients.no_of_sub_client_type', 'clients.lga', 'clients.ogwama_ref', 'clients.address'])
            ->where('clients.type', 'Commercial');
            return Datatables::of($commercial)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="#" data-id="'.$row->id.'" id="editUser" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit User" class="badge badge-primary p-1"><i class="fas fa-user-edit"></i></a> |
                        <a href="#" data-id="'.$row->id.'" id="editUser" data-bs-toggle="tooltip" data-bs-placement="top" title="Show user profile" class="badge badge-info p-1"><i class="fas fa-user-cog"></i></a>';
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
            $industry = DB::table('users')
            ->join('clients', 'users.id', '=', 'clients.user_id')
            ->select(['users.id', 'users.full_name', 'users.phone', 'clients.user_id', 'clients.type', 'clients.sub_client_type', 'clients.no_of_sub_client_type', 'clients.lga', 'clients.ogwama_ref', 'clients.address'])
            ->where('clients.type', 'Industrial');
            return Datatables::of($industry)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="#" data-id="'.$row->id.'" id="editUser" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit User" class="badge badge-primary p-1"><i class="fas fa-user-edit"></i></a> |
                        <a href="#" data-id="'.$row->id.'" id="editUser" data-bs-toggle="tooltip" data-bs-placement="top" title="Show user profile" class="badge badge-info p-1"><i class="fas fa-user-cog"></i></a>';
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
            $medical = DB::table('users')
            ->join('clients', 'users.id', '=', 'clients.user_id')
            ->select(['users.id', 'users.full_name', 'users.phone', 'clients.user_id', 'clients.type', 'clients.sub_client_type', 'clients.no_of_sub_client_type', 'clients.lga', 'clients.ogwama_ref', 'clients.address'])
            ->where('clients.type', 'Medical');
            return Datatables::of($medical)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="#" data-id="'.$row->id.'" id="editUser" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit User" class="badge badge-primary p-1"><i class="fas fa-user-edit"></i></a> |
                        <a href="#" data-id="'.$row->id.'" id="editUser" data-bs-toggle="tooltip" data-bs-placement="top" title="Show user profile" class="badge badge-info p-1"><i class="fas fa-user-cog"></i></a>';
                         return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('index');
    }

    public function getPayment()
    {
       return view('admin.paymentHistory');
    }
    
    public function getUserPayment(Request $request)
    {       
        $payments = DB::table('users')
        ->join('clients', 'clients.user_id', '=', 'users.id')
        ->join('payments', 'payments.user_id', '=', 'users.id')
        ->select(['payments.id', 'payments.amount', 'payments.ref', 'payments.updated_at','users.full_name', 'clients.type','clients.sub_client_type','clients.ogwama_ref'])
        ->where('status', 'successful')->orderBy('payments.updated_at', 'DESC');
        return Datatables::of($payments)->make(true);
 
    }
}
