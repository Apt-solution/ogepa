@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12  card bg-dark p-1">
            User's Information
        </div>
        <div class="mb-2">
            <a href="{{ URL::to('/addUser') }}" class="btn btn-outline-dark btn-flat rounded"><span class="fas fa-plus-circle pr-2"></span>Add New User</a>
        </div>
    </div>
    @if(Route::current()->getName() == "allUser")
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered all-user text-center" style="width:100%">
                    <thead class="bg-dark">
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>User No</th>
                        <th>Type</th>
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
            <div class="table-responsive">
                <table class="table table-bordered table-striped residential text-center" style="width:100%">
                    <thead class="bg-green">
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>User No</th>
                        <th>Type</th>
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
            <div class="table-responsive">
                <table class="table table-bordered commercial text-center" style="width:100%">
                    <thead class="bg-info">
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>User No</th>
                        <th>Type</th>
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
            <div class="table-responsive">
                <table class="table table-bordered industry text-center" style="width:100%">
                    <thead class="bg-warning">
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>User No</th>
                        <th>Type</th>
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
            <div class="table-responsive">
                <table class="table table-bordered medical text-center" style="width:100%">
                    <thead class="bg-danger">
                    
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>User No</th>
                        <th>Type</th>
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
            {data: 'first_name', name: 'first_name'},
            {data: 'last_name', name: 'last_name'},
            {data: 'phone', name: 'phone'},
            {data: 'ogwema_ref', name: 'ogwema_ref'},
            {data: 'client_type', name: 'client_type'},
            {data: 'lga', name: 'lga'},
            {data: 'address', name: 'address'},
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
            {data: 'first_name', name: 'first_name'},
            {data: 'last_name', name: 'last_name'},
            {data: 'phone', name: 'phone'},
            {data: 'ogwema_ref', name: 'ogwema_ref'},
            {data: 'client_type', name: 'client_type'},
            {data: 'lga', name: 'lga'},
            {data: 'address', name: 'address'},
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
            {data: 'first_name', name: 'first_name'},
            {data: 'last_name', name: 'last_name'},
            {data: 'phone', name: 'phone'},
            {data: 'ogwema_ref', name: 'ogwema_ref'},
            {data: 'client_type', name: 'client_type'},
            {data: 'lga', name: 'lga'},
            {data: 'address', name: 'address'},
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
            {data: 'first_name', name: 'first_name'},
            {data: 'last_name', name: 'last_name'},
            {data: 'phone', name: 'phone'},
            {data: 'ogwema_ref', name: 'ogwema_ref'},
            {data: 'client_type', name: 'client_type'},
            {data: 'lga', name: 'lga'},
            {data: 'address', name: 'address'},
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
            {data: 'first_name', name: 'first_name'},
            {data: 'last_name', name: 'last_name'},
            {data: 'phone', name: 'phone'},
            {data: 'ogwema_ref', name: 'ogwema_ref'},
            {data: 'client_type', name: 'client_type'},
            {data: 'lga', name: 'lga'},
            {data: 'address', name: 'address'},
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
