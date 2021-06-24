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
<div class="table-responsive">
    <table class="table history table-bordered table-striped">
        <thead class="bg-dark">
            <th>Fullname / Industry Name</th>
            <th>Ogwama No</th>
            <th>Per Trip</th>
            <th>No of Trip</th>
            <th>Total Amount</th>
            <th>Arrears</th>
            <th>Month</th>
            <th>Action</th>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>
<script>
$(document).ready(function(){
    $.noConflict();
    var table = $('.history').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('invoiceHistory') }}",
        columns: 
        [
            {data: 'full_name', name: 'users.full_name'},
            {data: 'ogwema_ref', name: 'users.ogwema_ref'},
            {data: 'initialAmount', name: 'clients.initialAmount'},
            {data: 'no_of_trip', name: 'industrial_remmitances.no_of_trip'}, 
            {data: 'amount_to_pay', name: 'industrial_remmitances.amount_to_pay'},
            {data: 'arreas', name: 'industrial_remmitances.arreas'},
            {data: 'month_due', name: 'industrial_remmitances.month_due'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ],
        
    });
})
</script>
@endsection