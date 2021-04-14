@extends('layouts.app')
@section('content')
<script>
$(document).ready(function() {
    $.noConflict();
    $('.js-example-basic-single').select2();
});
</script>
<div class="container">
    <div class="row">
        <div class="col-10 mt-2 mx-auto">
                @if(Session::has('status'))
                    <div class="alert alert-success text-center">
                        <p>{{ Session::get('status') }}</p>
                    </div>
                @endif
            <div class="card elevation-3">
                <div class="card-header bg-success">
                    <h5 class="card-title"><a style="color:white;" href="{{ url()->previous() }}"><span class="fas fa-arrow-left pr-4"></span></a> Update user's data</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('user.update', $users->id)}}" method="post">
                    @method('PUT')
                    @csrf
                        <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">First Name</label>
                            <input type="text" name="first_name" value="{{ $users->first_name }}" class="form-control" value="" placeholder="John" aria-label="fname" aria-describedby="basic-addon1">
                        </div>
                        @error('first_name')<p style="margin-top: -14px;" class="text-danger text-sm" >{{ $message }}</p>@enderror
                       
                        <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">Last Name</label>
                            <input type="text" name="last_name" value="{{ $users->last_name }}" class="form-control" placeholder="Doe" aria-label="lname" aria-describedby="basic-addon1">
                        </div>
                        @error('last_name')<p style="margin-top: -14px;" class="text-danger text-sm" >{{ $message }}</p>@enderror

                        <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">Phone Number</label>
                            <input type="text" name="phone" value="{{ $users->phone }}" class="form-control" placeholder="08012345678" aria-label="lname" aria-describedby="basic-addon1">
                        </div>
                        @error('phone')<p style="margin-top: -14px;" class="text-danger text-sm" >{{ $message }}</p>@enderror

                        <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">Client Type</label>
                            <select name="client_type" class="form-select" id="">
                                    <option selected value="{{$users->client_type}}">{{$users->client_type}}</option>
                                    <option value="residential">Residential</option>
                                    <option value="industrial">Industrial</option>
                                    <option value="commercial">Commercial</option>
                                    <option  value="medical">Medical</option>
                            </select>
                        </div>
                        @error('client_type')<p style="margin-top: -14px;" class="text-danger text-sm">{{ $message }}</p>@enderror

                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Local Govt:</label>
                            <select name="lga" class="form-select" id="inputGroupSelect01">
                                <option>Choose...</option>
                                <option selected value="{{$users->lga}}">{{$users->lga}}</option>
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
                        <div class="input-group mb-3">
                            <label class="input-group-text">Address</label>
                            <textarea name="address" value="{{ $users->address }}" class="form-control" aria-label="With textarea">{{ $users->address }}</textarea>
                        </div>
                        @error('address')<p style="margin-top: -14px;" class="text-danger text-sm" >{{ $message }}</p>@enderror

                        <button class="btn btn-success float-right">UPDATE USER</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
