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
<div class="container animate__animated animate__zoomInDown">
    <div class="row">
        <div class="col-10 mt-2 mx-auto">
            @if(Session::has('status'))
                <div id="alert" class="alert alert-success text-center">
                    {{  Session::get('status') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header" style="background-color: black;">
                    <h5 class="card-title text-white"><a style="color:white;" href="{{ url()->previous() }}"><span class="fas fa-arrow-left pr-4"></span></a> Update user's data</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('user.update', $users->id)}}" method="post">
                    @method('PUT')
                    @csrf
                        <div class="input-group mb-3">
                                <label class="input-group-text" id="basic-addon1">Fullname / Industry Name</label>
                                <input type="text" required name="full_name" value="{{ $users->full_name }}" class="form-control" value="" placeholder="John" aria-label="fname" aria-describedby="basic-addon1">
                        </div>
                        @error('full_name')<p style="margin-top: -14px;" class="text-danger text-sm" >{{ $message }}</p>@enderror
                    
                        <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1 ">Client Type</label>
                            <select required selected name="type" class="form-select" id="clientType">
                                    <option selected value="{{$users->client->type}}">{{$users->client->type}}</option>
                            </select>
                        </div>
                        @error('type')<p style="margin-top: -14px;" class="text-danger text-sm">{{ $message }}</p>@enderror

                        <div class="input-group mb-3" id="resident" >
                            <label class="input-group-text" id="basic-addon1">Category:</label>
                            <select required name="sub_client_type" id="sub_category" class="form-select">
                                <option selected value="{{$users->client->sub_client_type}}">{{$users->client->sub_client_type}}</option>
                                <option disabled>Choose</option>
                            </select>
                        </div>
                        @error('sub_client_type')<p style="margin-top: -14px;" class="text-danger text-sm">{{ $message }}</p>@enderror

                        <div class="input-group mb-3" id="catNo">
                            <label class="input-group-text" id="basic-addon1">No of Category / tons</label>
                            <select required name="no_of_sub_client_type" id="no_of_sub_category" class="form-select">
                               <option selected value="{{ $users->client->no_of_sub_client_type }}">{{ $users->client->no_of_sub_client_type }}</option> 
                               <option disabled>Choose</option>
                            </select>                
                        </div>
                        @error('no_of_sub_client_type')<p style="margin-top: -14px;" class="text-danger text-sm">{{ $message }}</p>@enderror
                       
                        <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">Monthly Payment</label>
                            <input required type="text" name="monthlyPayment" id="monthlyPayment" value="{{ $users->client->initialAmount }}" class="form-control" placeholder="200000" aria-label="lname" aria-describedby="basic-addon1">                
                        </div>
                        @error('monthlyPayment')<p style="margin-top: -14px;" class="text-danger text-sm">{{ $message }}</p>@enderror

                        <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">Phone Number</label>
                            <input type="text" name="phone" value="{{ $users->phone }}" class="form-control" placeholder="08012345678" aria-label="lname" aria-describedby="basic-addon1">
                        </div>
                        @error('phone')<p style="margin-top: -14px;" class="text-danger text-sm" >{{ $message }}</p>@enderror

                        <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1 email">Email <span class="text-xs text-tiny">(optional)</span></label>
                            <input  type="email" name="email" value="{{ $users->email }}" class="form-control" placeholder="johndoe@gmail.com" aria-label="fname" aria-describedby="basic-addon1">
                        </div>
                        @error('email')<p style="margin-top: -14px;" class="text-danger text-sm">{{ $message }}</p>@enderror
                        
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Local Govt:</label>
                            <select required name="lga" class="form-select" id="inputGroupSelect01">
                                <option selected value="{{$users->lga}}">{{$users->lga}}</option>
                                <option disabled>Choose...</option>
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
                        <div class="input-group mb-3">
                            <label class="input-group-text">Address</label>
                            <textarea required name="address" value="{{ $users->client->address }}" class="form-control" aria-label="With textarea">{{ $users->client->address }}</textarea>
                        </div>
                        @error('address')<p style="margin-top: -14px;" class="text-danger text-sm" >{{ $message }}</p>@enderror

                        <button class="btn btn-outline-dark float-right">Update Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

 setTimeout(() => {
    $('#alert').fadeOut();
   }, 2000);

    $status = {!! json_encode(Session::get('status')) !!}
    if($status){
        swal("Account Updated!", "Click Ok to Continue!", "success");
    }
    
    $(document).ready(function(){
        var residential = ['Room', 'Self_Contain', 'Flat', 'Bungalow', 'Duplex', 'Minor_Shop'];
        var commercial = ['Commercial_Bank', 'Micro_Finance_Bank', 'School', 'Shopping_Complex', 'Printing_Shop',
                          'Food_Canteen', 'Big_Eatery', 'Small_Eatery', 'Super_Store', 'Medium_Store', 
                          'Mini_Supermarket', 'Religion_Center', 'Fuel_Station', 'Bakery', 'Hospital'
                         ];
        var industrial = ['10 ton', '15-20 ton', 'compactor'];
        
        
        var no =[1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]; 
        $type = {!! json_encode($users->client->type) !!}
        if($type == 'Residential')
        {
            for( const resident of residential)
            {
                $('#sub_category').append('<option value="'+resident+'">'+ resident + '</option>');
            }
            for( const catNo of no)
            {
                $('#no_of_sub_category').append('<option value="'+catNo+'">'+ catNo + '</option>');

            }   
        }
        else if ($type == 'Commercial')
        {
            for( const resident of commercial)
            {
                
                $('#sub_category').append('<option value="'+resident+'">'+ resident + '</option>');
            } 
            for( const catNo of no)
            {
                $('#no_of_sub_category').append('<option value="'+catNo+'">'+ catNo + '</option>');

            } 
        }
        else if ($type == 'Industrial')
        {
            for( const resident of industrial)
            {
                $('#sub_category').append('<option value="'+resident+'">'+ resident + '</option>');
            } 
        }
        else if(clientType == 'Medical')
        {
               $('#sub_category').append('<option value="Medical">Medical</option>');
               $('#no_of_sub_category').append('<option value="'+1+'">'+ 1 + '</option>');
        }

            $("select#no_of_sub_category, select#sub_category").change(function(){
            $clientType = $('#sub_category').children("option:selected").val();
                $.ajax({
                    type: 'GET',
                    data: {'sub_category':$clientType},
                    url: '{{ URL::to('get-amount') }}',
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
