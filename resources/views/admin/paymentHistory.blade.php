@extends('layouts.app')
@section('content')
<div class="row">
    <div class="card bg-dark h-50">
        <div class="card-heading">
            Check Payment Records
        </div>
    </div>
</div>
<div class="row  input-daterange">
    <div class="col-md-4">
        <div class="form-group">
            <label for="">From Date:</label>
            <input type="date" name="from_date" id="from_date" class="form-control">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="">To Date:</label>
            <input type="date" name="to_date" id="to_date" class="form-control">
        </div>
    </div>
    <div class="col-md-4" style="margin-top: 32px;">
        <div class="form-group">
            <button class="btn btn-outline-dark btn-block ">Search</button>
        </div>
    </div>
</div>
    <table class="table history table-bordered table-striped">
        <thead class="bg-dark">
            <th>First name</th>
            <th>Last name</th>
            <th>Ogwama No</th>
            <th>Ref No</th>
            <th>Amount</th>
            <th>Date Paid</th>
        </thead>
        <tbody>

        </tbody>
    </table>
<script>
$(document).ready(function(){
    $.noConflict();
    var table = $('.history').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('checkHistory') }}",
        columns: 
        [
            {data: 'first_name', name: 'users.first_name'},
            {data: 'last_name', name: 'users.last_name'},
            {data: 'ogwema_ref', name: 'users.ogwema_ref'},
            {data: 'ref', name: 'payments.ref'},
            {data: 'amount', name: 'payments.amount'}, 
            {data: 'updated_at', name: 'payments.updated_at'}
        ],
        
    });
})
</script>
@endsection