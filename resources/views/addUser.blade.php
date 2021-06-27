@extends('layouts.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<div class="row">
    <div class="card bg-dark p-1">
        <div class="card-heading">
            Register New User
        </div>
    </div>
</div>
<div class="container animate__animated animate__zoomInDown">
    <div class="row">
        <div class="col-10 mt-2 mx-auto">
            <div class="card">
                <div class="card-header" style="background-color: black;">
                    <h5 class="card-title text-white">Account Creation</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('user.reg')}}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1 fullName">Fullname / Industry Name</label>
                            <input required type="text" name="full_name" value="{{ old('full_name') }}" class="form-control" placeholder="John / OGWAMA" aria-label="fname" aria-describedby="basic-addon1">
                        </div>
                        @error('full_name')<p style="margin-top: -14px;" class="text-danger text-sm">{{ $message }}</p>@enderror

                        <div class="input-group mb-3" id="type">
                            <label class="input-group-text" id="basic-addon1">Create a new account for</label>
                            <select required name="type" class="form-select" id="clientType">
                                <option selected disabled >Choose</option>
                                <option value="Residential">Residential</option>
                                <option value="Industrial">Industrial</option>
                                <option value="Commercial">Commercial</option>
                                <option value="Medical">Medical</option>
                            </select>
                        </div>
                        @error('type')<p style="margin-top: -14px;" class="text-danger text-sm">{{ $message }}</p>@enderror

                        <div class="input-group mb-3" id="resident" >
                            <label class="input-group-text" id="basic-addon1">Category:</label>
                            <select required name="sub_client_type" id="sub_category" class="form-select">
                               <option selected disabled>Choose</option> 
                            </select>
                        </div>
                        @error('sub_client_type')<p style="margin-top: -14px;" class="text-danger text-sm">{{ $message }}</p>@enderror

                        <div class="input-group mb-3" id="catNo">
                            <label class="input-group-text" id="basic-addon1">No of Category / tons</label>
                            <select required name="no_of_sub_client_type" id="no_of_sub_category" class="form-select">
                               <option selected disabled>Choose</option> 
                            </select>                
                        </div>
                        @error('no_of_sub_client_type')<p style="margin-top: -14px;" class="text-danger text-sm">{{ $message }}</p>@enderror

                        <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">Monthly Payment</label>
                            <input required type="text" name="monthlyPayment"  value="{{ old('monthlyPayment') }}" id="monthlyPayment" value="" class="form-control" placeholder="200000" aria-label="lname" aria-describedby="basic-addon1">                
                        </div>
                        @error('monthlyPayment')<p style="margin-top: -14px;" class="text-danger text-sm">{{ $message }}</p>@enderror

                        <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">Phone Number</label>
                            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="08012345678" aria-label="lname" aria-describedby="basic-addon1">
                        </div>
                        @error('phone')<p style="margin-top: -14px;" class="text-danger text-sm">{{ $message }}</p>@enderror
                        
                        <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1 email">Email <span class="text-xs text-tiny">(optional)</span></label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="johndoe@gmail.com" aria-label="fname" aria-describedby="basic-addon1">
                        </div>
                        @error('email')<p style="margin-top: -14px;" class="text-danger text-sm">{{ $message }}</p>@enderror
                        
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
                                <option value="Ogun_WaterSide">Ogun_Water_Side</option>
                                <option value="Remo_North">Remo_North</option>
                                <option value="Sagamu">Sagamu</option>
                                <option value="Yewa_North">Yewa_North</option>
                                <option value="Yewa_South">Yewa_South</option>
                            </select>
                        </div>
                        @error('lga')<p style="margin-top: -14px;" class="text-danger text-sm">{{ $message }}</p>@enderror

                        <div class="input-group mb-3" id="address">
                            <label class="input-group-text">Address</label>
                            <textarea required name="address" class="form-control" aria-label="With textarea">{{ old('address') }}</textarea>
                        </div>
                        @error('address')<p style="margin-top: -14px;" class="text-danger text-sm">{{ $message }}</p>@enderror

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
        {{  Session::forget('status') }}
    }

    $(document).ready(function(){
        var residential = ['Choose', 'Room', 'Self_Contain', 'Flat', 'Bungalow', 'Duplex', 'Minor_Shop'];
        var commercial = ['Choose','Commercial_Bank', 'Micro_Finance_Bank', 'School', 'Shopping_Complex', 'Printing_Shop',
                          'Food_Canteen', 'Big_Eatery', 'Small_Eatery', 'Super_Store', 'Medium_Store', 
                          'Mini_Supermarket', 'Religion_Center', 'Fuel_Station', 'Bakery', 'Hospital', 'Hotel', 'Bear Parlour / Bar', 'Table Water Factory', 'Frozen Foods'
                         ];
        var industrial = ['Choose', '10 ton', '15-20 ton', 'compactor'];
        
       $('select#clientType').change(function(){
        var clientType = $(this).children("option:selected").val();
            if(clientType == 'Residential')
            {
                $('#sub_category').text('');
                $('#no_of_sub_category').text('');

                $('#catNo').show();
                $('#resident').show();
                for( const resident of residential)
                {
                    $('#sub_category').append('<option value="'+resident+'">'+ resident + '</option>');
                }  
                for(let catNo = 1; catNo <= 1000; catNo++)
                {
                    $('#no_of_sub_category').append('<option value="'+catNo+'">'+ catNo + '</option>');

                }
            }
            else if(clientType == 'Commercial')
            {
                $('#no_of_sub_category').text('');
                $('#sub_category').text('');
                $('#catNo').show();
                $('#resident').show();
                for( const resident of commercial)
                {
                   
                    $('#sub_category').append('<option value="'+resident+'">'+ resident + '</option>');
                } 
                for(let catNo = 1; catNo <= 1000; catNo++)
                {
                    $('#no_of_sub_category').append('<option value="'+catNo+'">'+ catNo + '</option>');

                }
            }
            else if(clientType == 'Industrial')
            {
                $('#sub_category').text('');
                $('#no_of_sub_category').text('');

                $('#catNo').show();
                $('#resident').show();
                for( const resident of industrial)
                {
                    $('#sub_category').append('<option value="'+resident+'">'+ resident + '</option>');
                }  
                    $('#no_of_sub_category').append('<option value="'+1+'">'+ 1 + '</option>');
            }
            else if(clientType == 'Medical')
            {
                $('#sub_category').text('');
                $('#no_of_sub_category').text('');

                $('#catNo').show();
                $('#resident').show();
               $('#sub_category').append('<option value="Medical">Medical</option>');
               $('#no_of_sub_category').append('<option value="'+1+'">'+ 1 + '</option>');
            }
       });

       $("select#no_of_sub_category, select#sub_category").change(function(){
       
        $clientType = $('#sub_category').children("option:selected").val();
        $.ajax({
            type: 'GET',
            data: {'sub_category':$clientType},
            url: "{{ URL::to('get-amount') }}",
            success: function(data)
            {
               $no_of_sub_category = $('select#no_of_sub_category').children("option:selected").val();
               $amount = $no_of_sub_category * data;
               $('input:text#monthlyPayment').val($amount);
            }
            });
       });
       
    });
</script>
@endsection