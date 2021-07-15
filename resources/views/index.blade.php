@extends('layouts.app')
@section('content')
<div class="container animate__animated animate__zoomInDown">
    <div class="row">
        <div class="col-12  card bg-dark p-1">
            User's Information
        </div>
        <div class="mb-2">
            <a href="{{ route('user') }}" class="btn btn-outline-dark btn-flat rounded"><span class="fas fa-plus-circle pr-2"></span>Add New User</a>
        </div>
        @if(Session::has('status'))
            <div id="alert" class="alert alert-danger text-center">
                {{ Session::get('status') }}
            </div>
        @endif
    </div>
    @if(Route::current()->getName() == "allUser")
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered all-user text-center" style="width:100%">
                    <thead class="bg-dark">
                        <th>Fullname</th>
                        <th>Phone</th>
                        <th>OGWAMA No</th>
                        <th>Categories</th>
                        <th>Sub-Categories</th>
                        <th>No of Sub-Categories</th>
                        <th>Local Govt</th>
                        <th>Address</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @elseif(Route::current()->getName() == "residential.user")
    <div class="row">
        <div class="col-12">
        <form action="{{route('residentialInvoice')}}" method="post">
        @csrf
            <button disabled  class="btn btn-success btn-sm mb-2"> <i class="fas fa-print pr-2"></i>Generate Residential Invoice</button>
        </form>
            <div class="table-responsive">
                <table class="table table-bordered table-striped residential text-center" style="width:100%">
                    <thead class="bg-green">
                        <th>Fullname</th>
                        <th>Phone</th>
                        <th>OGWAMA NO</th>
                        <th>Categories</th>
                        <th>Sub-Categories</th>
                        <th>No of Sub-Categories</th>
                        <th>Local Govt</th>
                        <th>Address</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @elseif(Route::current()->getName() == "commercial.user")
    <div class="row">
        <div class="col-md-12 mx-auto">
        <form action="{{route('commercialInvoice')}}" method="post">
        @csrf
        <button disabled class="btn btn-info btn-sm mb-2"> <i class="fas fa-print pr-2"></i>Generate Commercial Invoice</button>
        </form>
            <div class="table-responsive">
                <table class="table table-bordered commercial text-center" style="width:100%">
                    <thead class="bg-info">
                        <th>Fullname</th>
                        <th>Phone</th>
                        <th>OGWAMA NO</th>
                        <th>Categories</th>
                        <th>Sub-Categories</th>
                        <th>No of Sub-Categories</th>
                        <th>Local Govt</th>
                        <th>Address</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @elseif(Route::current()->getName() == "industry.user")
    <div class="row">
        <div class="col-md-12">
        <form action="#">
        @csrf
            <button disabled class="btn btn-primary btn-sm mb-2"> <i class="fas fa-print pr-2"></i>Generate Industry Invoice</button>
            <br><a href="{{ route('invoiceHistory') }}" class="badge badge-primary p-2 mb-3">Invoice Generated</a>
        </form>
            <div class="table-responsive">
                <table class="table table-bordered industry text-center" style="width:100%">
                    <thead class="bg-warning">
                        <th>Industry Name</th>
                        <th>Phone</th>
                        <th>OGWAMA NO</th>
                        <th>Categories</th>
                        <th>Sub-Categories</th>
                        <th>No of Sub-Categories</th>
                        <th>Local Govt</th>
                        <th>Address</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @elseif(Route::current()->getName() == "medical.user")
    <div class="row">
        <div class="col-md-12">
        <button disabled class="btn btn-danger btn-sm mb-2"> <i class="fas fa-print pr-2"></i>Generate Medical Invoice</button>
            <div class="table-responsive">
                <table class="table table-bordered medical text-center" style="width:100%">
                    <thead class="bg-danger">
                        <th>Fullname</th>
                        <th>Phone</th>
                        <th>OGWAMA NO</th>
                        <th>Categories</th>
                        <th>Sub-Categories</th>
                        <th>No of Sub-Categories</th>
                        <th>Local Govt</th>
                        <th>Address</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
</div>
<script type="text/javascript">
$(document).ready(function(){
    $.noConflict();
      var table = $('.all-user').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('users.index') }}",
        columns: 
        [
            {data: 'full_name', name: 'users.full_name'},
            {data: 'phone', name: 'users.phone'},
            {data: 'ogwema_ref', name: 'users.ogwema_ref'},
            {data: 'type', name: 'clients.type'},
            {data: 'sub_client_type', name: 'clients.sub_client_type'},
            {data: 'no_of_sub_client_type', name: 'clients.no_of_sub_client_type'},
            {data: 'lga', name: 'users.lga'},
            {data: 'address', name: 'clients.address'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });
    // residential
    var table = $('.residential').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('residential.user') }}",
        columns: 
        [
            {data: 'full_name', name: 'users.full_name'},
            {data: 'phone', name: 'users.phone'},
            {data: 'ogwema_ref', name: 'users.ogwema_ref'},
            {data: 'type', name: 'clients.type'},
            {data: 'sub_client_type', name: 'clients.sub_client_type'},
            {data: 'no_of_sub_client_type', name: 'clients.no_of_sub_client_type'},
            {data: 'lga', name: 'users.lga'},
            {data: 'address', name: 'clients.address'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });
    
    // commercial
    var table = $('.commercial').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('commercial.user') }}",
        columns: 
        [
            {data: 'full_name', name: 'users.full_name'},
            {data: 'phone', name: 'users.phone'},
            {data: 'ogwema_ref', name: 'users.ogwema_ref'},
            {data: 'type', name: 'clients.type'},
            {data: 'sub_client_type', name: 'clients.sub_client_type'},
            {data: 'no_of_sub_client_type', name: 'clients.no_of_sub_client_type'},
            {data: 'lga', name: 'users.lga'},
            {data: 'address', name: 'clients.address'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });

        // industry
        var table = $('.industry').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('industry.user') }}",
        columns: 
        [
            {data: 'full_name', name: 'users.full_name'},
            {data: 'phone', name: 'users.phone'},
            {data: 'ogwema_ref', name: 'users.ogwema_ref'},
            {data: 'type', name: 'clients.type'},
            {data: 'sub_client_type', name: 'clients.sub_client_type'},
            {data: 'no_of_sub_client_type', name: 'clients.no_of_sub_client_type'},
            {data: 'lga', name: 'users.lga'},
            {data: 'address', name: 'clients.address'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });

     // medical
     var table = $('.medical').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('medical.user') }}",
        columns: 
        [
            {data: 'full_name', name: 'users.full_name'},
            {data: 'phone', name: 'users.phone'},
            {data: 'ogwema_ref', name: 'users.ogwema_ref'},
            {data: 'type', name: 'clients.type'},
            {data: 'sub_client_type', name: 'clients.sub_client_type'},
            {data: 'no_of_sub_client_type', name: 'clients.no_of_sub_client_type'},
            {data: 'lga', name: 'users.lga'},
            {data: 'address', name: 'clients.address'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });

    $('.residential, .commercial, .industry, .medical, .allUser').on('click', '#deleteUser', function(){
        if(!confirm("Note: Once you delete this user, all of these user's record will be removed across board. \nDo you still want to continue?"))
        event.preventDefault();
    });

   setTimeout(() => {
    $('#alert').fadeOut();
   }, 3000);

});
</script>
@endsection
