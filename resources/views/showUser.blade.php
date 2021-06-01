@extends('layouts.app')
@section('content')
<script>
$(document).ready(function() {
    $.noConflict();
    $('.js-example-basic-single').select2();
});
</script>
<div class="row">
        <div class="card bg-dark p-1">
            <div class="card-heading">
                Update User's Data
            </div>
        </div>
    </div>
<div class="container">
    <div class="row">
        <div class="col-10 mt-2 mx-auto">
                @if(Session::has('status'))
                    <div class="alert alert-success text-center">
                        <p>{{ Session::get('status') }}</p>
                    </div>
                @endif
            <div class="card">
                <div class="card-header bg-success">
                    <h5 class="card-title"><a style="color:white;" href="{{ url()->previous() }}"><span class="fas fa-arrow-left pr-4"></span></a> Update user's data</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('user.update', $users->id)}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1 ">Client Type</label>
                            <select selected name="client_type" class="form-select" id="clientType">
                                    <option selected value="{{$users->type}}">{{$users->type}}</option>
                            </select>
                        </div>
                        @error('type')<p style="margin-top: -14px;" class="text-danger text-sm">{{ $message }}</p>@enderror

                        <div class="input-group mb-3" id="resident" >
                            <label class="input-group-text" id="basic-addon1">Category:</label>
                            <select name="sub_client_type" class="form-select">
                                <option selected value="{{$users->sub_client_type}}">{{$users->sub_client_type}}</option>
                                <option value="Bungalow">Bungalow</option>
                                <option value="Duplex">Duplex</option>
                                <option value="Flat">Flat</option>
                                <option value="Self-Contain">Self-Contain</option>
                                <option value="Minor Shop">Minor Shop</option>
                                <option value="Room">Room</option>
                            </select>
                        </div>
                        @error('sub_client_type')<p style="margin-top: -14px;" class="text-danger text-sm">{{ $message }}</p>@enderror

                        <div class="input-group mb-3" id="commercial">
                            <label class="input-group-text" id="basic-addon1">Category:</label>
                            <select name="sub_client_type" class="form-select">
                            <option selected value="{{$users->sub_client_type}}">{{$users->sub_client_type}}</option>
                                <option value="Eatery">Eatery</option>
                                <option value="Super Store">Super Store</option>
                                <option value="Commercial Bank">Commercial Bank</option>
                                <option value="Micro Finance Bank">Micro Finance Bank</option>
                                <option value="School">School</option>
                                <option value="Food-Canteen">Food-Canteen</option>
                                <option value="Printing Shop">Printing Shop</option>
                                <option value="Shopping Complex">Shopping Complex</option>
                                <option value="Medium Category Entry">Medium Category Entry</option>
                                <option value="Medium Store">Medium Store</option>
                                <option value="Mini Supermarket">Mini Supermarket</option>
                                <option value="Church/Mosque">Church / Mosque</option>
                                <option value="Fuel Station">Fuel Station</option>
                                <option value="Bakery">Bakery</option>
                                <option value="Hospital and Municipal Waste">Hospital and Municipal Waste</option>
                            </select>
                        </div>
                        @error('sub_client_type')<p style="margin-top: -14px;" class="text-danger text-sm">{{ $message }}</p>@enderror

                        <div class="input-group mb-3" id="industry">
                            <label class="input-group-text" id="basic-addon1">Category:</label>
                            <select name="sub_client_type" class="form-select">
                                <option value="{{$users->sub_client_type}}">{{$users->sub_client_type}}</option>
                                <option value="Foods, Tobacco & Beverages Production & Processing">Foods, Tobacco & Beverages Production & Processing</option>
                                <option value="Chemical, Petrochemicals and Allied Products">Chemical, Petrochemicals and Allied Products</option>
                                <option value="Engineering and Construction">Engineering and Construction</option>
                                <option value="Resources Recovery and General Services">Resources Recovery and General Services</option>
                            </select>
                        </div>
                        @error('sub_client_type')<p style="margin-top: -14px;" class="text-danger text-sm">{{ $message }}</p>@enderror

                        <div class="input-group mb-3" id="catNo">
                            <label class="input-group-text" id="basic-addon1">No of Category / tons</label>
                            <input type="text" name="no_of_sub_client_type" value="{{ $users->no_of_sub_client_type }}" class="form-control" placeholder="1" aria-label="fname" aria-describedby="basic-addon1">
                        </div>
                        @error('no_of_sub_client_type')<p style="margin-top: -14px;" class="text-danger text-sm">{{ $message }}</p>@enderror

                        <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">Fullname / Industry Name</label>
                            <input type="text" name="full_name" value="{{ $users->user->full_name }}" class="form-control" value="" placeholder="John" aria-label="fname" aria-describedby="basic-addon1">
                        </div>
                        @error('full_name')<p style="margin-top: -14px;" class="text-danger text-sm" >{{ $message }}</p>@enderror
                       
                        <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">Phone Number</label>
                            <input type="text" name="phone" value="{{ $users->user->phone }}" class="form-control" placeholder="08012345678" aria-label="lname" aria-describedby="basic-addon1">
                        </div>
                        @error('phone')<p style="margin-top: -14px;" class="text-danger text-sm" >{{ $message }}</p>@enderror

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

                        <button class="btn btn-outline-success float-right">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
      
       $('select#clientType').change(function(){
            var clientType = $(this).children("option:selected").val();
            if(clientType == "Residential")
            {
                $('#resident').show();
                $('#commercial').hide();
                $('#industry').hide();
                $('#lga').show();
                $('#catNo').show();
                $('#location').hide();
                $('#address').show();

            }
            else if(clientType == "Commercial")
            {
                $('#resident').hide();
                $('#commercial').show();
                $('#industry').hide();
                $('#lga').show();
                $('#catNo').show();
                $('#location').hide();
                $('#address').show();
            }
            else if(clientType == "Industrial")
            {
                $('#resident').hide();
                $('#commercial').hide();
                $('#industry').show();
                $('#lga').show();
                $('#location').hide();
                $('#catNo').show();
                $('#address').show();
            }
            else if(clientType == "Medical")
            {
                $('#resident').hide();
                $('#commercial').hide();
                $('#industry').hide();
                $('#lga').show();
                $('#catNo').hide();
                $('#address').show();
            }
       });
    });
</script>
@endsection
