@extends('layouts.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
<div class="container">
    <div class="row">
        <div class="col-10 mt-2 mx-auto">
<<<<<<< HEAD
                @if(Session::has('status'))
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <strong>Account Created</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            <div class="card elevation-3">
=======
            @if(Session::has('status'))
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <strong>Account Created</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="card">
>>>>>>> e6e5d22934291511dce989b68e90c46c244a6216
                <div class="card-header bg-success">
                    <h5 class="card-title">Account Creation</h5>
                </div>
                <div class="card-body">
<<<<<<< HEAD
                    <form action="{{route(user.reg')}}" method="post">
                    @csrf
=======
                    <form action="{{route('user.reg')}}" method="post">
                        @csrf
>>>>>>> e6e5d22934291511dce989b68e90c46c244a6216
                        <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">First Name</label>
                            <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control" placeholder="John" aria-label="fname" aria-describedby="basic-addon1">
                        </div>
                        @error('first_name')<p style="margin-top: -14px;" class="text-danger text-sm">{{ $message }}</p>@enderror

                        <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">Last Name</label>
                            <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control" placeholder="Doe" aria-label="lname" aria-describedby="basic-addon1">
                        </div>
                        @error('last_name')<p style="margin-top: -14px;" class="text-danger text-sm">{{ $message }}</p>@enderror

                        <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">Phone Number</label>
                            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="08012345678" aria-label="lname" aria-describedby="basic-addon1">
                        </div>
                        @error('phone')<p style="margin-top: -14px;" class="text-danger text-sm">{{ $message }}</p>@enderror

                        <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">Client Type</label>
                            <select name="client_type" class="form-select" id="">
                                <option>residential</option>
                                <option>indestrial</option>
                                <option>commercial</option>
                                <option>medical</option>
                            </select>
                        </div>
                        @error('client_type')<p style="margin-top: -14px;" class="text-danger text-sm">{{ $message }}</p>@enderror

                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Local Govt:</label>
                            <select name="lga" width="15%" class="form-select">
                                <option selected>Choose...</option>
                                <option value="Abeokuta_North">Abeokuta_North</option>
                                <option value="Abeokuta_South">Abeokuta_South</option>
                                <option value="Ado_Odo_Ota">Ado_Odo_Ota</option>
                                <option value="Ewekoro">Ewekoro</option>
                                <option value="Ifo">Ifo</option>
                                <option value="Ijebu_East">Ijebu_East</option>
                                <option value="Ijebu_North">Ijebu_North</option>
                                <option value="Ijebu_North_East">Ijebu_North_East</option>
                                <option value="Ikenne">Ikenne</option>
                                <option value="Imeko_Afon">Imeko_Afon</option>
                                <option value="Ipokia">Ipokia</option>
                                <option value="Obafemi_Owode">Obafemi_Owode</option>
                                <option value="Odeda">Odeda</option>
                                <option value="Odogbolu">Odogbolu</option>
                                <option value="Ogun_Water_Side">Ogun_Water_Side</option>
                                <option value="Remo_North">Remo_North</option>
                                <option value="Sagamu">Sagamu</option>
                                <option value="Yewa_North">Yewa_North</option>
                                <option value="Yewa_South">Yewa_South</option>
                            </select>
                        </div>
                        @error('state')<p style="margin-top: -14px;" class="text-danger text-sm">{{ $message }}</p>@enderror

                        <div class="input-group mb-3">
                            <label class="input-group-text">Address</label>
                            <textarea name="address" class="form-control" aria-label="With textarea">{{ old('address') }}</textarea>
                        </div>
                        @error('address')<p style="margin-top: -14px;" class="text-danger text-sm">{{ $message }}</p>@enderror

                        <button class="btn btn-success float-right">ADD NEW USER</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection