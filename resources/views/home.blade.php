@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 jumbotron bg-dark">
            <h5>Welcome, Admin!</h5>
        </div>
    </div>
    <div class="row" style="margin-top: -20px;">
        <div class="col text-center">
            <div class="card p-1 elevation-0">
                <div class="row">
                    <div class="col">
                        <button class="btn btn-success rounded p-4 btn-flat"><span class="material-icons p-3">apartment</span></button>
                    </div>
                    <div class="col">
                        <h5 class="lead">Residential</h5>
                        <span style="margin-right: 60px; font-weight:bolder">{{$residential }}</span> 
                    </div>
                </div>
            </div>
        </div>
        <div class="col text-center">
            <div class="card p-1 elevation-0">
                <div class="row">
                    <div class="col">
                        <button class="btn btn-info rounded p-4 btn-flat"><span class="material-icons p-3">business</span></button>
                    </div>
                    <div class="col">
                        <h5 class="lead">Commercial</h5>
                        <span style="margin-right: 70px; font-weight:bolder">{{ $commercial }}</span> 
                    </div>
                </div>
            </div>
        </div>
        <div class="col text-center">
            <div class="card p-2 elevation-0">
                <div class="row">
                    <div class="col">
                        <button class="btn btn-warning rounded p-4 btn-flat"><i class="fas fa-industry p-3"></i></button>
                    </div>
                    <div class="col">
                        <h5 class="lead">Industry</h5>
                        <span style="margin-right: 40px; font-weight:bolder">{{ $industrial }}</span> 
                    </div>
                </div>
            </div>
        </div>
        <div class="col text-center">
            <div class="card p-2 elevation-0">
                <div class="row">
                    <div class="col">
                        <button class="btn btn-danger rounded p-4 btn-flat"><i class="fas fa-hospital p-3"></i></button>
                    </div>
                    <div class="col">
                        <h5 class="lead">Medical</h5>
                        <span style="margin-right: 40px; font-weight:bolder">{{ $medical }}</span> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
