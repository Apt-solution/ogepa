<?php
namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\ClientService;
use App\Services\PSPService;
use DataTables;
use DB;

class DataTableController extends Controller
{
    protected $pspService;
    public function __construct(PSPService $pspService)
    {
       $this->pspService = $pspService;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $all = DB::table('users')
            ->join('clients', 'users.id', '=', 'clients.user_id')
            ->select(['users.id', 'users.full_name', 'users.phone', 'users.ogwema_ref', 'users.lga', 'clients.user_id', 'clients.type', 'clients.sub_client_type', 'clients.no_of_sub_client_type', 'clients.address'])
            ->where('clients.type', '!=', 'PSP')
            ->where('clients.type', '!=', 'Vendor');
            
            return Datatables::of($all)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                       $btn = '<a href="/show/'.$row->id.'" data-id="'.$row->id.'" id="editUser" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit User" class="badge badge-primary p-1"><i class="fas fa-user-edit"></i></a>
                        <form action="/delete-user/'.$row->id.'" method="post">
                        '.csrf_field().'
                        '.method_field("DELETE").'
                        <button class="btn btn-danger btn-xs" title="DELETE USER DATA" id="deleteUser"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        ';
                         return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('index');
    }

    public function residentialUser(Request $request)
    {
        if ($request->ajax()) {
            $residential = DB::table('users')
            ->join('clients', 'users.id', '=', 'clients.user_id')
            ->select(['users.id', 'users.full_name', 'users.phone', 'users.ogwema_ref', 'users.lga', 'clients.user_id', 'clients.type', 'clients.sub_client_type', 'clients.no_of_sub_client_type', 'clients.address'])
            ->where('clients.type', 'Residential');
            return Datatables::of($residential)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="/show/'.$row->id.'" data-id="'.$row->id.'" id="editUser" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit User" class="badge badge-primary p-1"><i class="fas fa-user-edit"></i></a>
                        <form action="/delete-user/'.$row->id.'" method="post">
                        '.csrf_field().'
                        '.method_field("DELETE").'
                        <button class="btn btn-danger btn-xs" title="DELETE USER DATA" id="deleteUser"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        ';
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
            ->select(['users.id', 'users.full_name', 'users.phone', 'users.ogwema_ref', 'users.lga', 'clients.user_id', 'clients.type', 'clients.sub_client_type', 'clients.no_of_sub_client_type', 'clients.address'])
            ->where('clients.type', 'Commercial');
            return Datatables::of($commercial)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="/show/'.$row->id.'" data-id="'.$row->id.'" id="editUser" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit User" class="badge badge-primary p-1"><i class="fas fa-user-edit"></i></a>
                        <form action="/delete-user/'.$row->id.'" method="post">
                        '.csrf_field().'
                        '.method_field("DELETE").'
                        <button class="btn btn-danger btn-xs" title="DELETE USER DATA" id="deleteUser"><i class="fas fa-trash-alt"></i></button>
                        </form>';
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
            ->select(['users.id', 'users.full_name', 'users.phone', 'users.ogwema_ref', 'users.lga', 'clients.user_id', 'clients.type', 'clients.sub_client_type', 'clients.no_of_sub_client_type', 'clients.address'])
            ->where('clients.type', 'Industrial');
            return Datatables::of($industry)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="/show/'.$row->id.'" data-id="'.$row->id.'" id="editUser" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit User" class="badge badge-primary p-1"><i class="fas fa-user-edit"></i></a> |
                        <a href="/invoice/'.$row->id.'" data-id="'.$row->id.'" id="User" data-bs-toggle="tooltip" data-bs-placement="top" title="Invoice Data" class="badge badge-info p-1"><i class="fas fa-receipt"></i></a>
                        <form action="/delete-user/'.$row->id.'" method="post">
                        '.csrf_field().'
                        '.method_field("DELETE").'
                        <button class="btn btn-danger btn-xs" title="DELETE USER DATA" id="deleteUser"><i class="fas fa-trash-alt"></i></button>
                        </form>';
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
            ->select(['users.id', 'users.full_name', 'users.phone', 'users.ogwema_ref', 'users.lga', 'clients.user_id', 'clients.type', 'clients.sub_client_type', 'clients.no_of_sub_client_type', 'clients.address'])
            ->where('clients.type', 'Medical');
            return Datatables::of($medical)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="/show/'.$row->id.'" data-id="'.$row->id.'" id="editUser" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit User" class="badge badge-primary p-1"><i class="fas fa-user-edit"></i></a>
                        <form action="/delete-user/'.$row->id.'" method="post">
                        '.csrf_field().'
                        '.method_field("DELETE").'
                        <button class="btn btn-danger btn-xs" title="DELETE USER DATA" id="deleteUser"><i class="fas fa-trash-alt"></i></button>
                        </form>';
                         return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('index');
    }

       
    public function getUserPayment(Request $request)
    {       
        if($request->ajax()){
        $payments = DB::table('users')
        ->join('clients', 'clients.user_id', '=', 'users.id')
        ->join('payments', 'payments.user_id', '=', 'users.id')
        ->select(['payments.id', 'payments.amount', 'payments.ref', 'payments.month_paid', 'payments.updated_at','users.full_name', 'clients.type','clients.sub_client_type','users.ogwema_ref'])
        ->where('status', 'successful')->orderBy('payments.updated_at', 'DESC');
        return Datatables::of($payments)->make(true);
        }
        return view('admin.paymentHistory');
    }

    public function passAllPSPToTable(Request $request)
    {
        if ($request->ajax()) {
            $psp =DB::table('users')
            ->join('clients', 'users.id', '=', 'clients.user_id')
            ->select(['users.id', 'users.full_name', 'users.phone', 'users.ogwema_ref', 'users.lga', 'users.location',  'clients.user_id', 'clients.type'])
            ->where('clients.type', 'PSP');
            return Datatables::of($psp)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="/psp-vendor/'.$row->id.'" data-id="'.$row->id.'" id="editUser" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit User" class="badge badge-primary p-1"><i class="fas fa-user-edit"></i></a>
                        <form action="/delete-user/'.$row->id.'" method="post">
                        '.csrf_field().'
                        '.method_field("DELETE").'
                        <button class="btn btn-danger btn-xs" title="DELETE USER DATA" id="deleteUser"><i class="fas fa-trash-alt"></i></button>
                        </form>';
                         return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        $psp = $this->pspService->noOfPSP();
        $vendor = $this->pspService->noOfVendor();
        return view('PSPVendor.psp-vendor-table', compact('psp', 'vendor'));
    }

    public function passAllVendorToTable(Request $request)
    {
        if ($request->ajax()) {
            $vendor =DB::table('users')
            ->join('clients', 'users.id', '=', 'clients.user_id')
            ->select(['users.id', 'users.full_name', 'users.phone', 'users.ogwema_ref', 'users.lga', 'users.location',  'clients.user_id', 'clients.type'])
            ->where('clients.type', 'Vendor');
            return Datatables::of($vendor)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="/psp-vendor/'.$row->id.'" data-id="'.$row->id.'" id="editUser" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit User" class="badge badge-primary p-1"><i class="fas fa-user-edit"></i></a>
                        <form action="/delete-user/'.$row->id.'" method="post">
                        '.csrf_field().'
                        '.method_field("DELETE").'
                        <button class="btn btn-danger btn-xs" title="DELETE USER DATA" id="deleteUser"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        ';
                         return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        $psp = $this->pspService->noOfPSP();
        $vendor = $this->pspService->noOfVendor();
        return view('PSPVendor.psp-vendor-table', compact('psp', 'vendor'));
    }
}
