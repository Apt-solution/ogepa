@extends('layouts.app')
@section('content')
<div class="row">
    <div class="card bg-dark p-1">
        <div class="card-heading">
            Register New PSP / Vendor
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-10 mt-2 mx-auto">
            <div class="card">
                <div class="card-header" style="background-color: black;">
                    <h5 class="card-title text-white">Account Creation</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('regPSPVendor')}}" method="post">
                        @csrf
                        <div class="input-group mb-3" id="type">
                            <label class="input-group-text" id="basic-addon1">Create a new account for</label>
                            <select required name="type" class="form-select" id="clientType">
                                <option selected disabled >Choose</option>
                                <option value="PSP">PSP</option>
                                <option value="Vendor">Vendor</option>
                            </select>
                        </div>
                        @error('type')<p style="margin-top: -14px;" class="text-danger text-sm">{{ $message }}</p>@enderror
                        
                        <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1 fullName">Company Name</label>
                            <input type="text" name="full_name" value="{{ old('full_name') }}" class="form-control" placeholder="John / OGWAMA" aria-label="fname" aria-describedby="basic-addon1">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-user"></span></div>
                            </div>
                        </div>
                        @error('full_name')<p style="margin-top: -14px;" class="text-danger text-sm">{{ $message }}</p>@enderror

                        <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1 fullName">Email <span class="text-xs text-tiny">(optional)</span></label>
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

                        <div class="input-group mb-3" id="lga">
                            <label class="input-group-text" for="inputGroupSelect01">Local Govt:</label>
                            <select required name="lga" width="15%" class="form-select">
                                <option selected disabled>Choose...</option>
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
                                <option value="Ogun_Water_Side">Ogun_WaterSide</option>
                                <option value="Remo_North">Remo_North</option>
                                <option value="Sagamu">Sagamu</option>
                                <option value="Yewa_North">Yewa_North</option>
                                <option value="Yewa_South">Yewa_South</option>
                            </select>
                        </div>
                        @error('lga')<p style="margin-top: -14px;" class="text-danger text-sm">{{ $message }}</p>@enderror
                        
                        <div class="input-group mb-3" id="location">
                            <label class="input-group-text">Zone</label>
                            <input type="text" name="location" value="{{ old('location') }}" class="form-control" placeholder="Abeokuta" aria-label="lname" aria-describedby="basic-addon1">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-map-marker"></span></div>
                            </div>
                        </div>
                        @error('location')<p style="margin-top: -14px;" class="text-danger text-sm">{{ $message }}</p>@enderror

                        <button class="btn btn-outline-dark float-right">Create account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$status = {!! json_encode(Session::get('status')) !!}
    if($status){
        swal("Account Created!", "Click Ok to Continue!", "success");
    }
</script>
@endsection