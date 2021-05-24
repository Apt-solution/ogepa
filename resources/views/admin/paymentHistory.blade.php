@extends('layouts.app')
@section('content')
<div class="row">
    <div class="card bg-dark h-50">
        <div class="card-heading">
            Check Payment Records
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="">From Date:</label>
            <input type="date" name="from_date" class="form-control">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="">To Date:</label>
            <input type="date" name="to_date" class="form-control">
        </div>
    </div>
    <div class="col-md-4" style="margin-top: 32px;">
        <div class="form-group">
            <button class="btn btn-primary">Search</button>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead class="bg-dark">
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