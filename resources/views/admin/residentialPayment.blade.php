@extends('layouts.app')
@section('content')
<div class="row">
    <div class="card"  style="background-color: #191970;">
        <div class="card-header text-center text-white h-100 ">
            <h5 class="lead">Set Amount To Be Paid To All Catergories of Residential </h5>
        </div>
    </div>
</div>
<div class="row" style="margin-top: -25px;">
    <div class="col-12">
        <fieldset class="border border-success p-2">
            <legend class="w-auto lead" style="float:none; padding:inherit;">Residential</legend>
                <p class="lead text-sm p-0 m-0 text-italic">Enter Bungalow Monthly Payment</p>
                <div class="input-group mb-2">
                    <label class="input-group-text" id="basic-addon1">Set Amount:</label>
                    <input type="text" name="first_name"  class="form-control" placeholder="0000" aria-label="fname" aria-describedby="basic-addon1">
                </div>
                <div class="float-right">
                    <button class="btn btn-sm btn-danger">Edit</button>
                    <button class="btn btn-sm btn-success">Save</button>
                </div>
               
                
        </fieldset>
    </div>
</div>

@endsection()