@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@section('content')
<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            @if($users->client_type == "residential")
                            <img src="{{asset('images/residential.jpeg') }}" alt=""/>
                            @endif
                            @if($users->client_type == "industrial")
                            <img src="{{asset('images/industry.jpeg') }}" alt=""/>
                            @endif
                            @if($users->client_type == "commercial")
                            <img src="{{asset('images/commercial.jpeg') }}" alt=""/>
                            @endif
                            @if($users->client_type == "medical")
                            <img class="text-warning" src="{{asset('images/medical.jfif') }}" alt=""/>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        {{ $users->first_name }} {{ $users->last_name }}
                                    </h5>
                                    <h6>
                                        {{ ucwords($users->client_type) }} User
                                    </h6>
                                    <p class="proile-rating">USER'S ID : <span>{{ $users->ogwema_ref }}</span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Payment History</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a class="profile-edit-btn" href="{{route('user.show', $users->id) }}">Edit Profile</a> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $users->ogwema_ref }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Client Type:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ ucwords($users->client_type) }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>fullname:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $users->first_name }} {{ $users->last_name }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $users->phone }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Local Govt:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ ucwords($users->lga) }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Address:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $users->address }}</p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Last Payment:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>2000</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Amount Owed:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>400</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Amount to pay:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>2000</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Total amount to pay:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>2400</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Availability</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>6 months</p>
                                            </div>
                                        </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Your Bio</label><br/>
                                        <p>Your detail description</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
@endsection
