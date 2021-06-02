@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="card bg-dark h-50">
            <div class="card-heading">
                Print Invoice
            </div>
        </div>
    </div>
    <div class="row">
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
        @endif

        @if (\Session::has('error'))
        <div class="alert alert-danger">
            <ul>
                <li>{!! \Session::get('error') !!}</li>
            </ul>
        </div>
        @endif

        <div class="col-md-12">

            @foreach($bills as $bill)
            

            <div class="col-md-10 invoice">

                <div class="ref-space"></div>
                <span class="ref">{{ $bill->user->ogwama_ref }}</span><br>
                <div class="other-space"></div>
                <span class="name">{{ $bill->user->full_name }}</span><br>
                <span class="name">{{ $bill->user->location }}</span><br>
                <div class="space2"></div>
                <span class="amount">OGWAMA Bill</span> <span class="money">{{ $bill->amount_to_pay }}</span><span class="date">{{ $bill->created_at->format('M Y') }}</span>
                <div class="space3"></div>
                <span class="money2">{{ $bill->amount_to_pay }}</span><br>
                <span class="money2">{{ '0.00' }}</span><br>
                <span class="money2">{{ $bill->amount_to_pay }}</span><br>
                <div class="mid-space"></div>
                <span class="money3">{{ $bill->amount_to_pay }}</span><br>
                <p></p>
                <span class="amount-in-words" id="words{{ $bill->id }}"></span>
                <div class="top-space"></div>
                <div class="top-space"></div>
            </div>
            @endforeach

        </div>


    </div>
</div>
<script>
var a = ['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];
var b = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];

function inWords(rawValue){
	var num=rawValue,
		a=['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '],
		b=['','','twenty','thirty','forty','fifty','sixty','seventy','eighty','ninety'],
		c=['thousand', 'million',''],
		words='';

	num=('000000000'+num.toString()).substr(-9) // Make number into a predictiable nine character string
		.match(/.{3}/g); // Split string into chuncks of three numbers then reverse order of returned array

	for(var i=0;i<c.length;i++){
		var n=num[i],
			str='';
		str+=(words!='')?' '+c[c.length-1-i]+' ':'';
		str+=(n[0]!=0)?(a[Number(n[0])]+'hundred '):'';
		n=n.substr(1);
		str+=(n!=0)?((str!='')?'and ':'')+(a[Number(n)]||b[n[0]]+' '+a[n[1]]):'';
		words+=str;
	}
return words.replace(/ +/g,' ').replace(/ $/,'');
}

var myStringArray = {};
myStringArray = <?php echo json_encode($bills); ?>;
var arrayLength = myStringArray.length;
for (var i = 0; i < arrayLength; i++) {
    var floor = Math.floor;
    var num = floor(parseFloat(myStringArray[i].amount_to_pay));
    var id = myStringArray[i].id;
    // console.log(num);
    document.getElementById('words'+id).innerHTML =  inWords(num);
    //Do something
}

</script>

<style>
    .ref{
        margin-left: 650px;
    }
    .other-space{
        height: 130px;
    }
    .ref-space{
        height: 65px;
    }
    .amount-in-words{
        margin-left: 200px;
    }
    .space2 {
        height: 120px;
    }

    .amount {
        margin-left: 100px;
    }

    .money {
        margin-left: 250px;
    }
    .space3{
        height: 20px;
    }
    .money2{
        margin-left: 530px;
    }
    .money3{
        margin-left: 100px;
    }

    .date {
        margin-left: 90px;
    }

    .invoice {
        background-image: url('images/INDUSTRIAL.png');
        background-repeat: no-repeat;
        background-size: 100%;
    }

    .top-space {
        height: 220px;
    }

    .mid-space {
        height: 240px;
    }

    .name {
        margin-left: 120px;
    }
</style>

@endsection