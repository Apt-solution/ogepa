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
                Invoice Data
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
                    <h5 class="card-title"><a style="color:white;" href="{{ route('industry.user') }}"><span class="fas fa-arrow-left pr-4"></span></a> Add Invoice Data</h5>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                    @csrf
                    <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">Fullname / Industry Name</label>
                            <input type="text" name="industryName" disabled value="{{ $users->full_name }}" class="form-control" value="" placeholder="John" aria-label="fname" aria-describedby="basic-addon1">
                    </div>
                    
                    <div class="input-group mb-3">
                            <label class="input-group-text">Address</label>
                            <textarea name="address" class="form-control" aria-label="With textarea">{{ $users->client->address }}</textarea>
                    </div>

                    <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">Invoice Month</label>
                            <select class="form-control" name="month" id="invoiceMonth">
                            </select>
                    </div>

                    <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">Trips</label>
                            <select class="form-control" name="trip" id="noOfTrip">
                            </select>                   
                    </div>

                    <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">Per Trips(#)</label>
                            <input type="text" disabled name="perTrip" id="perTrip" value="{{ $users->client->initialAmount }}" class="form-control" value="" placeholder="" aria-label="fname" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">Total (#)</label>
                            <input type="text" disabled id="total1" name="total1" value="" class="form-control" value="" placeholder="" aria-label="fname" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">Current Charges(#)</label>
                            <input type="text" readonly name="currentCharge" id="current" value="" class="form-control" value="" placeholder="" aria-label="fname" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">Net Arreas (#)</label>
                            <input type="text"  name="netArreas" value="" id="net" class="form-control" value="" placeholder="" aria-label="fname" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">Money to be paid</label>
                            <input type="text"  name="total2" id="total2" value="" class="form-control" value="" placeholder="" aria-label="fname" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">Amount Paid in Words</label>
                            <input type="text" name="amtWords" id="amtWords" value="" class="form-control" value="" placeholder="" aria-label="fname" aria-describedby="basic-addon1">
                    </div>
                        <button class="btn btn-outline-success float-right">Generate Invoice</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
var th_val = ['', 'Thousand', 'Million', 'Billion', 'Trillion'];
// System for uncomment this line for Number of English 
// var th_val = ['','thousand','million', 'milliard','billion'];
 
var dg_val = ['Zero', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine'];
var tn_val = ['Ten', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen'];
var tw_val = ['Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];
function toWordsconver(s) {
  s = s.toString();
    s = s.replace(/[\, ]/g, '');
    if (s != parseFloat(s))
        return 'not a number ';
    var x_val = s.indexOf('.');
    if (x_val == -1)
        x_val = s.length;
    if (x_val > 15)
        return 'too big';
    var n_val = s.split('');
    var str_val = '';
    var sk_val = 0;
    for (var i = 0; i < x_val; i++) {
        if ((x_val - i) % 3 == 2) {
            if (n_val[i] == '1') {
                str_val += tn_val[Number(n_val[i + 1])] + ' ';
                i++;
                sk_val = 1;
            } else if (n_val[i] != 0) {
                str_val += tw_val[n_val[i] - 2] + ' ';
                sk_val = 1;
            }
        } else if (n_val[i] != 0) {
            str_val += dg_val[n_val[i]] + ' ';
            if ((x_val - i) % 3 == 0)
                str_val += 'hundred ';
            sk_val = 1;
        }
        if ((x_val - i) % 3 == 1) {
            if (sk_val)
                str_val += th_val[(x_val - i - 1) / 3] + ' ';
            sk_val = 0;
        }
    }
    if (x_val != s.length) {
        var y_val = s.length;
        str_val += 'point ';
        for (var i = x_val + 1; i < y_val; i++)
            str_val += dg_val[n_val[i]] + ' ';
    }
    return str_val.replace(/\s+/g, ' ');
}
$(document).ready(function(){
    for(let month = 1; month <=12; month++)
    {
        $('#invoiceMonth').append('<option value="'+month+'">'+ month + '</option>');
        $('#noOfTrip').append('<option value="'+month+'">'+ month + '</option>');
    }

    $('select#noOfTrip').change(function(){
        let noOfTrip = $(this).children("option:selected").val();
        let perTrip = $('#perTrip').val();
        let total = perTrip * noOfTrip;
        $('#total1').val(total);
        $('#current').val(total);
    });

    $('#net').focusout(function(){
        let net = $(this).val();
        let current = $('#current').val();
        let net2 = parseInt(net, 10);
        let current2 = parseInt(current, 10)
        let total2 = net2 + current2;
        $('#total2').val(total2);
        let Inwords = toWordsconver(total2);
        $('#amtWords').val(Inwords);
    });
})
</script>
@endsection
