@extends('layouts.app')
@section('content')
<script>
$(document).ready(function(){
    $.noConflict();
      var table = $('.all-user').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('checkPayment') }}",
        columns: 
        [
            {data: 'id', name: 'id'},
            {data: 'anount', name: 'amount'},
            {data: 'ref', name: 'ref'},
            {data: 'updated_at', name: 'updated_at'},
        ]
    });
});
</script>

<div class="row">
    <div class="card">
        <div class="card-header text-center text-white h-100 " style="background-color: #191970; border-bottom: 2px solid white; ">
            <h5  class="lead">Check User Payment </h5>
        </div>
    </div>
</div>
<div class="row ">
    <div class="col-md-4 input-daterange">
        <input type="text" class="form-control" name="from_date" id="from_date" placeholder="From Date" readonly>
    </div>
    <div class="col-md-4">
        <input type="text" class="form-control" name="to_date" id="to_date" placeholder="To Date" readonly>
    </div>
    <div class="col-md-4">
        <button name="filter" id="filter" class="btn btn-primary">Filter</button>
    </div>
</div>
<br>
<div class="table-responsive">
    <table class="table allUser table-bordered" id="history_table">
        <thead>
            <th>ID</th>
            <th>Amount</th>
            <th>Ref No</th>
            <th>Date Paid</th>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>

@endsection
