@extends('layouts.app')
@section('content')
<script src="{{ asset('js/moneyToWord.js') }}"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="row">
        <div class="card bg-dark p-1">
            <div class="card-heading">
                Invoice Data
            </div>
        </div>
    </div>
<div class="container">
    <div class="row">
        <div class="col-10 mx-auto">
            <div class="w3-panel w3-leftbar w3-border-blue w3-pale-blue">
                <p class="mt-2">Note: Kindly check through all the below data..Once invoice has been generated no changes can be reverted</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-10 mt-2 mx-auto">
                @if(Session::has('status'))
                    <div class="alert alert-danger text-center">
                        <p>{{ Session::get('status') }}</p>
                    </div>
                @endif
            <div class="card">
                <div class="card-header bg-success">
                    <h5 class="card-title"><a style="color:white;" href="{{ route('industry.user') }}"><span class="fas fa-arrow-left pr-4"></span></a> Add Invoice Data</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('invoiceData') }}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $users->id }}">
                    <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">Ogwama Code:</label>
                            <input type="text" name="ogwamaCode" readonly value="{{ $users->ogwema_ref }}" class="form-control" value="" placeholder="John" aria-label="fname" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">Fullname / Industry Name</label>
                            <input type="text" name="industryName" readonly value="{{ $users->full_name }}" class="form-control" value="" placeholder="John" aria-label="fname" aria-describedby="basic-addon1">
                    </div>
                    
                    <div class="input-group mb-3">
                            <label class="input-group-text">Address</label>
                            <textarea readonly name="address" class="form-control" aria-label="With textarea">{{ $users->client->address }}</textarea>
                    </div>

                    <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">Invoice Month</label>
                            <select class="form-control" name="month_due" id="invoiceMonth">
                            <option selected disabled value="0">Choose</option>
                            </select>
                    </div>
                    @error('month_due')
                        <div style="margin-top: -14px;" class="text-danger text-xs">{{  $message  }}</div>
                    @enderror  

                    <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">Trips</label>
                            <select class="form-control" name="no_of_trip" id="noOfTrip">
                                <option selected disabled value="0">Choose</option>
                            </select>                   
                    </div>
                    @error('no_of_trip')
                        <div style="margin-top: -14px;" class="text-danger text-xs">{{  $message  }}</div>
                    @enderror

                    <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">Per Trips(#)</label>
                            <input type="text" readonly name="perTrip" id="perTrip" value="{{ $users->client->initialAmount }}" class="form-control" value="" placeholder="" aria-label="fname" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">Total (#)</label>
                            <input type="text" readonly id="total1" name="total1" value="{{ $users->client->initialAmount }}" class="form-control" value="" placeholder="" aria-label="fname" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">Current Charges(#)</label>
                            <input type="text" readonly name="currentCharge" id="current" class="form-control" value="{{ $users->client->initialAmount }}" placeholder="" aria-label="fname" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">Net Arreas (#)</label>
                            <input type="text" readonly  name="netArreas" value="{{ $arreas }}" id="net" class="form-control" value="" placeholder="" aria-label="fname" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">Money to be paid</label>
                            <input type="text" readonly  name="amount_to_pay" id="total2" value="" class="form-control" value="" placeholder="" aria-label="fname" aria-describedby="basic-addon1">
                    </div>
                    @error('amount_to_pay')
                        <div style="margin-top: -14px;" class="text-danger text-xs">{{  $message  }}</div>
                    @enderror

                    <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">Amount Paid in Words</label>
                            <input type="text" name="amtWord" id="amtWords" value="" class="form-control" value="" placeholder="" aria-label="fname" aria-describedby="basic-addon1">
                    </div>
                        <button  onclick="myFunction();" class="btn btn-outline-success float-right">Generate Invoice</button>
                    </form>
                    <button id="btn" class="btn btn-primary">Back</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$('#btn').click(function(){
    swal('Hello')
});

   function myFunction() {
      if(!confirm("Are You Sure You Want To Proceed?"))
      event.preventDefault();
  }
  
$(document).ready(function(){

    let month = {
        'Jan': 1,
        'Feb': 2,
        'Mar': 3,
        'Apr': 4,
        'May': 5,
        'Jun': 6,
        'Jul': 7,
        'Aug': 8,
        'Sept': 9,
        'Oct': 10,
        'Nov': 11,
        'Dec': 12
    };

    for(const key in month){
        console.log(key + ":" + month[key]);
        $('#invoiceMonth').append('<option value="'+month[key]+'">'+ key + '</option>');
    }

    for(let trip = 1; trip <=12; trip++)
    {
        $('#noOfTrip').append('<option value="'+trip+'">'+ trip + '</option>');
    }

    $('select#noOfTrip').change(function(){
        let noOfTrip = $(this).children("option:selected").val();
        let perTrip = $('#perTrip').val();
        let total = perTrip * noOfTrip;
        $('#total1').val(total);
        $('#current').val(total);
        let net = $('#net').val();
        let current = $('#current').val();
        let net2 = parseInt(net, 10);
        let current2 = parseInt(current, 10)
        let total2 = net2 + current2;
        $('#total2').val(total2);
        let Inwords = toWordsconver(total2);
        $('#amtWords').val(Inwords + "Naira Only");
    });

})
</script>
@endsection
