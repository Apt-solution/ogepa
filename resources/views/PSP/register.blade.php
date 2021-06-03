@extends('layouts.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<div class="row">
    <div class="card bg-dark p-1">
        <div class="card-heading">
            Register New PSP
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-10 mt-2 mx-auto">
            @if(Session::has('status'))
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <strong>Account Created</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="card">
                <div class="card-header" style="background-color: black;">
                    <h5 class="card-title text-white">Account Creation</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('regPSP')}}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1 fullName">PSP Name</label>
                            <input type="text" name="full_name" value="{{ old('full_name') }}" class="form-control" placeholder="John / OGWAMA" aria-label="fname" aria-describedby="basic-addon1">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-user"></span></div>
                            </div>
                        </div>
                        @error('full_name')<p style="margin-top: -14px;" class="text-danger text-sm">{{ $message }}</p>@enderror

                        <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1 fullName">Email</label>
                            <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="psp@gmail.com" aria-label="fname" aria-describedby="basic-addon1">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                            </div>
                        </div>
                        @error('email')<p style="margin-top: -14px;" class="text-danger text-sm">{{ $message }}</p>@enderror

                        <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">Phone Number</label>
                            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="08012345678" aria-label="lname" aria-describedby="basic-addon1">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-phone"></span></div>
                            </div>
                        </div>
                        @error('phone')<p style="margin-top: -14px;" class="text-danger text-sm">{{ $message }}</p>@enderror

                        <div class="input-group mb-3" id="location">
                            <label class="input-group-text">Location</label>
                            <input type="text" name="location" value="{{ old('location') }}" class="form-control" placeholder="Abeokuta" aria-label="lname" aria-describedby="basic-addon1">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-map-marker"></span></div>
                            </div>
                        </div>
                        @error('location')<p style="margin-top: -14px;" class="text-danger text-sm">{{ $message }}</p>@enderror

                        <div class="input-group mb-3" id="location">
                            <label class="input-group-text">Password</label>
                            <input type="password" name="password" value="" class="form-control" placeholder="Enter password" aria-label="lname" aria-describedby="basic-addon1">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-lock"></span></div>
                            </div>
                        </div>
                        @error('password')<p style="margin-top: -14px;" class="text-danger text-sm">{{ $message }}</p>@enderror

                        <div class="input-group mb-3" id="location">
                            <label class="input-group-text">Re-Type Password</label>
                            <input type="password" name="password_confirmation" value="" class="form-control" placeholder="Re-Enter Password" aria-label="lname" aria-describedby="basic-addon1">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-lock"></span></div>
                            </div>
                        </div>
                        @error('password')<p style="margin-top: -14px;" class="text-danger text-sm">{{ $message }}</p>@enderror

                        <button class="btn btn-outline-dark float-right">Create account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection