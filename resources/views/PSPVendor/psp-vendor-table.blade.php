@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12  card bg-dark p-1">
            PSP & Vendor List
        </div>
        <div class="mb-2">
            <a href="{{ route('showPSPVendor') }}" class="btn btn-outline-dark btn-flat rounded"><span class="fas fa-plus-circle pr-2"></span>Add New PSP / Vendor</a>
        </div>
        @if(Session::has('status'))
            <div id="alert" class="alert alert-danger text-center">
                {{ Session::get('status') }}
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body bg-danger pb-4 rounded-sm text-white">
                    <a href="{{ route('PSPList') }}">PSP</a>
                    <p>{{ $psp }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body bg-info pb-4 rounded-sm text-white">
                <a href="{{ route('vendorList') }}">Vendor</a>
                    <p>{{ $vendor }}</p>
                </div>
            </div>
        </div>
    </div>
    @if(Route::current()->getName() == "PSPList")
    <div class="row" id="psp">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered psp text-center" style="width:100%">
                    <thead class="bg-danger">
                        <th>Fullname</th>
                        <th>Phone</th>
                        <th>User No</th>
                        <th>Categories</th>
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
    @elseif(Route::current()->getName() == "vendorList")
    <div class="row" id="vendor">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-striped vendor text-center" style="width:100%">
                    <thead class="bg-info">
                        <th>Fullname</th>
                        <th>Phone</th>
                        <th>User No</th>
                        <th>Categories</th>
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
      var table = $('.psp').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('PSPList') }}",
        columns: 
        [
            {data: 'full_name', name: 'users.full_name'},
            {data: 'phone', name: 'users.phone'},
            {data: 'ogwema_ref', name: 'users.ogwema_ref'},
            {data: 'type', name: 'clients.type'},
            {data: 'location', name: 'users.location'},
            {data: 'lga', name: 'users.lga'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });
    // vendor
    var table = $('.vendor').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('vendorList') }}",
        columns: 
        [
            {data: 'full_name', name: 'users.full_name'},
            {data: 'phone', name: 'users.phone'},
            {data: 'ogwema_ref', name: 'users.ogwema_ref'},
            {data: 'type', name: 'clients.type'},
            {data: 'location', name: 'users.location'},
            {data: 'lga', name: 'users.lga'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });

    
    $('.psp, .vendor').on('click', '#deleteUser', function(){
        if(!confirm("Note: Once you delete this user, all of these user's record will be removed across board. \nDo you still want to continue?"))
        event.preventDefault();
    });

    setTimeout(() => {
    $('#alert').fadeOut();
   }, 2000);
});
</script>
@endsection
