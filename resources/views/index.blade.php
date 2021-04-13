@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mx-auto">
            <h4 id="ed" class="lead">User's Data</h4>
            <hr>
            <div class="mb-2">
                <a href="{{ URL::to('/addUser') }}" class="btn btn-success btn-flat rounded">Add new User</a>
            </div>
            <table class="table table-bordered data-table text-center" style="width:100%">
                <thead>
                    <th>SN</th>
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
<script type="text/javascript">
$(document).ready(function(){
    $.noConflict();
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('users.index') }}",
        columns: 
        [
            {data: 'id', name: 'id'},
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
