@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12  card bg-dark p-1">
            PSP & Vendor List
        </div>
        <div class="mb-2">
            <a href="{{ route('showPSPVendor') }}" class="btn btn-outline-dark btn-flat rounded"><span class="fas fa-plus-circle pr-2"></span>Add New User</a>
        </div>
    </div>
    @if(Route::current()->getName() == "PSPList")
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered psp text-center" style="width:100%">
                    <thead class="bg-dark">
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
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-striped vendor text-center" style="width:100%">
                    <thead class="bg-green">
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

});
</script>
@endsection
