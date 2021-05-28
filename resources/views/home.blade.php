@extends('layouts.app')
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 jumbotron  shadow-lg" style="height: 20%; background-color:black;">
            <h5 class="text-white">Welcome, Admin!</h5>
        </div>
    </div>
    <div class="row" style="margin-top: -20px;">
        <div class="col-3 text-center">
            <div class="card p-1">
                <div class="row">
                    <div class="col">
                        <a href="{{ route('residential.user') }}" class="btn btn-success rounded p-4 btn-flat"><i class="fas fa-house-user p-3"></i></a>
                    </div>
                    <div class="col">
                        <h5 class="lead text-success">Residential</h5>
                        <span style="margin-right: 60px; font-weight:bolder">{{$residential }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 text-center">
            <div class="card p-1 ">
                <div class="row">
                    <div class="col">
                        <a href="{{ route('commercial.user') }}" class="btn btn-info rounded p-4 btn-flat"><i class="fas fa-store p-3"></i></a>
                    </div>
                    <div class="col">
                        <h5 class="lead text-info">Commercial</h5>
                        <span style="margin-right: 70px; font-weight:bolder">{{ $commercial }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3  text-center">
            <div class="card p-1 ">
                <div class="row">
                    <div class="col">
                        <a href="{{ route('industry.user') }}" class="btn btn-warning rounded p-4 btn-flat"><i class="fas fa-industry p-3"></i></a>
                    </div>
                    <div class="col">
                        <h5 class="lead text-warning">Industry</h5>
                        <span style="margin-right: 40px; font-weight:bolder">{{ $industrial }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 text-center">
            <div class="card p-1 ">
                <div class="row">
                    <div class="col">
                        <a href="{{ route('medical.user') }}" class="btn btn-danger rounded p-4 btn-flat"><i class="fas fa-hospital p-3"></i></a>
                    </div>
                    <div class="col">
                        <h5 class="lead text-danger">Medical</h5>
                        <span style="margin-right: 40px; font-weight:bolder">{{ $medical }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card ">
                <div class="card-header text-left text-bold bg-success">Residential</div>
                <div class="card-body">
                    {!! $residentialChart->container() !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card ">
                <div class="card-header text-left text-bold" style = "background-color:teal; color:white;">Commercial</div>
                <div class="card-body">
                    {!! $commercialChart->container() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card ">
                <div class="card-header text-left text-bold bg-warning" style="color:white;">Industrial</div>
                <div class="card-body">
                    {!! $industrialChart->container() !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card ">
                <div class="card-header text-left text-bold bg-danger">Medical</div>
                <div class="card-body">
                    {!! $medicalChart->container() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mx-auto">
           <div class="card shadow-lg">
               <div class="card-header text-white text-bold" style="background-color:#191970 ;">Comparison between the category of users</div>
               <div class="card-body">
               {!! $allClientTypeChart->container() !!}
               </div>
           </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> 
{{ $industrialChart->script() }}
{{ $medicalChart->script() }}
{{ $commercialChart->script() }}
{{ $residentialChart->script() }}
{{ $allClientTypeChart->script() }}
@endsection

<!-- <div class="row">
        <div class="col text-center col-md-3">
            <div class="card p-2 elevation-0">
                <div class="row">
                    <div class="col">
                        <button class="btn btn-danger rounded p-4 btn-flat"><i class="fas fa-credit-card p-3"></i></button>
                    </div>
                    <div class="col">
                        <h5 class="lead">{{ date('M-Y') }} Remmitance</h5>
                        <span style="margin-right: 40px; font-weight:bolder"> &#8358;{{ number_format($remmitance, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div> -->