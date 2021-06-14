<style>
 
    .invoice {
        background-image: url('/images/INDUSTRIAL.png');
        background-repeat: no-repeat;
        background-size: 100%;
        font-family: 'Times New Roman', Times, serif;
        font-size: 11pt;
        
        width: 900px;
    }
    .ref-space{
        height: 10px;
        font-weight: bold;

    }
    .other-space{
        height: 140px;
    }
    .name {
        margin-left: 150px;
        margin-top: 20px;
        padding: 10px;
        font-weight: bold;

    }
    .space2 {
        height: 100px;
    }
    .amount {
        margin-left: 100px;
        font-weight: bold;

    }
    .money {
        margin-left: 350px;
        font-weight: bold;

    }
    .date {
        margin-left: 90px;
        font-weight: bold;

    }
    .space3{
        height: 67px;
    }
    .money2{
        margin-left: 620px;
        font-weight: bold;

    }
    .amount-in-words{
        margin-left: 300px;
        text-transform: capitalize;
        font-weight: bold;
    }
    .money3{
        margin-left: 100px;
        font-weight: bold;

    }
    .top-space {
        height: 220px;
    }
    @media print {
  #printPageButton {
    display: none;
  }
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
$(window).on('load', function() {
var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};
$('#pdfview').click(function () {
    doc.fromHTML($('#pdfdiv').html(), 15, 15, {
        'width': 800,
            'elementHandlers': specialElementHandlers
    });
    doc.save('file.pdf');
});
});
</script>
    
<button id="printPageButton" onClick="window.print()">Print</button>
<div class="container">
    <div class="row">
        <div class="card bg-dark h-50">
            <div class="card-heading">
                <!--Print Invoice-->
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

        <div class="col-md-12" style="margin: 0px auto;">

            @foreach($bills as $bill)
            


            <div class="invoice" id="pdfdiv">

                <div class="ref-space"></div>
                <div class="ref" style="margin-left:720px; margin-top:70px;font-weight: bold;">{{ $bill->user->ogwama_ref }}</div><br>
                <div class="other-space"></div>
                <span class="name">{{ $bill->user->full_name }}</span><br>
                <p></p>
                <span class="name">{{ $bill->user->location }}</span><br>
                <div class="space2"></div>
                <span class="amount">OGWAMA Bill</span> <span class="money">{{ $bill->amount_to_pay }}</span><span class="date">{{ 'May, 2021' }}</span>
                <div class="space3"></div>
                <span class="money2">{{ $bill->amount_to_pay }}</span><br>
                <p></p>
                <span class="money2">{{ '0.00' }}</span><br>
                <p></p>
                <span class="money2">{{ $bill->amount_to_pay }}</span><br>
                <div class="mid-space"></div>
                
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <span class="money3">{{ $bill->amount_to_pay }}</span><br>
                <p></p>
                <span class="amount-in-words" id="words{{ $bill->id }}"></span>
                <div class="top-space"></div>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <!--<div class="top-space"></div>-->
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



