<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
    <script src="{{ asset('js/moneyToWord.js') }}"></script>
    <title>Industrial Invoice</title>
<style>
    @page { size: A4 }

    @media print {
        .pageBreak{
            page-break-after:always;
        }
    }
    body{
        font-family: 'Times New Roman', Times, serif;
        font-size: 14px;
        font-weight: bold;
    }
    .container{
        position: relative;
    }
    .name{
        position: absolute;
        top: 3.9cm;
        left:2.7cm;
    }
    .address{
        position: absolute;
        top: 4.8cm;
        left: 3.3cm;
    }
    .desc{
        position: absolute;
        top: 9.5cm;
        left:1.5cm;
    }
    .trip{
        position: absolute;
        top: 9.5cm;
        left:5.8cm;
    }
    .per-trip{
        position: absolute;
        top: 9.5cm;
        left:7.5cm;
    }
    .total1{
        position: absolute;
        top: 9.5cm;
        left:10.8cm;
    }
    .month{
        position: absolute;
        top: 9.5cm;
        left:16.5cm;
    }
    .current{
        position: absolute;
        top: 11.4cm;
        left:11cm;
    }
    .net{
        position: absolute;
        top: 11.9cm;
        left:11cm;
    }
    .total2{
        position: absolute;
        top: 12.3cm;
        left:10cm;
    }
    .due{
        position: absolute;
        top: 19cm;
        left:10cm;
    }
    .month2{
        position: absolute;
        top: 19cm;
        left:12.5cm;
    }
    .amtPaid{
        position: absolute;
        top: 20.3cm;
        left:1.3cm;
    }
    .amtWord{
        position: absolute;
        top: 21.3cm;
        left:5.5cm;
    }
    .amtPaid2{
        position: absolute;
        top: 25.3cm;
        left:1.3cm;
    }
    .due1{
        position: absolute;
        top: 24.3cm;
        left: 14.6cm;
    }
    .month3{
        position: absolute;
        top: 24.3cm;
        left:16.8cm;
    }
</style>
</head>
<body class="A4">
    <div class="container sheet">
        <div class="name">
        @isset( $datas['industryName'])
            <p>{{ $datas['industryName'] }}</p>
        @endisset
        @isset($invoice_data)
        @foreach($invoice_data as $data)
            <p>{{ $data->full_name }}</p>
        @endforeach
        @endisset
        </div>
        <div class="address">
        @isset( $datas['address'])
            <p>{{ $datas['address'] }}</p>
        @endisset
        @isset($invoice_data)
        @foreach($invoice_data as $data)
            <p>{{ $data->address }}</p>
        @endforeach
        @endisset
        </div>
        <div class="desc">
            <p>OGWAMA BILL</p>
        </div>
        <div class="trip">
        @isset( $datas['trip'])
            <p>{{ $datas['trip'] }}</p>
        @endisset
        @isset($invoice_data)
        @foreach($invoice_data as $data)
            <p>{{ $data->no_of_trip }}</p>
        @endforeach
        @endisset
        </div>
        <div class="per-trip">
        @isset( $datas['perTrip'])
            <p>{{ $datas['perTrip'] }}</p>
        @endisset
        @isset($invoice_data)
        @foreach($invoice_data as $data)
            <p>{{ $data->initialAmount }}</p>
        @endforeach
        @endisset
        </div>
        <div class="total1">
        @isset( $datas['total1'])
            <p>{{ $datas['total1'] }}</p>
        @endisset
        @isset($invoice_data)
        @foreach($invoice_data as $data)
            <p>{{ $data->initialAmount * $data->no_of_trip }}</p>
        @endforeach
        @endisset
        </div>
        <div class="month">
        @isset( $datas['invoiceMonth'])
            <p>{{ $datas['invoiceMonth'] }}</p>
        @endisset
        @isset($invoice_data)
        @foreach($invoice_data as $data)
            <p>{{ date('F', mktime(0, 0, 0,  $data->month_due, 10)) }}</p>
        @endforeach
        @endisset
        </div>
        <div class="current">
        @isset( $datas['currentCharge'])
          <p>{{ $datas['currentCharge'] }}</p>
        @endisset
        @isset($invoice_data)
        @foreach($invoice_data as $data)
            <p>{{ $data->initialAmount * $data->no_of_trip }}</p>
        @endforeach
        @endisset
        </div>
        <div class="net">
        @isset( $datas['netArreas'])
            <p>{{ $datas['netArreas'] }}</p>
        @endisset
        @isset($invoice_data)
            <p>{{ $last_month_arrears }}</p>
        @endisset
        </div>
        <div class="total2">
        @isset( $datas['amount_to_pay'])
            <p>{{ $datas['amount_to_pay'] }}</p>
        @endisset
        @isset($invoice_data)
        @foreach($invoice_data as $data)
            <p>{{ $data->amount_to_pay }}</p>
        @endforeach
        @endisset
        </div>
        <div class="due">
        @isset( $datas['amount_to_pay'])
            <p>{{ $datas['amount_to_pay'] }}</p>
        @endisset
        @isset($invoice_data)
        @foreach($invoice_data as $data)
            <p>{{ $data->amount_to_pay }}</p>
        @endforeach
        @endisset
        </div>
        <div class="month2">
        @isset( $datas['invoiceMonth'])
            <p>{{ $datas['invoiceMonth'] }}</p>
        @endisset
        @isset($invoice_data)
        @foreach($invoice_data as $data)
            <p>{{ date('F', mktime(0, 0, 0,  $data->month_due, 10)) }}</p>
        @endforeach
        @endisset
        </div>
        <div class="amtPaid">
        @isset( $datas['amount_to_pay'])
            <p>{{ $datas['amount_to_pay'] }}</p>
        @endisset
        @isset($invoice_data)
        @foreach($invoice_data as $data)
            <p>{{ $data->amount_to_pay }}</p>
        @endforeach
        @endisset
        </div>
        <div class="amtWord">
        @isset($datas['amtWord'])
            <p>{{ $datas['amtWord'] }}</p>
        @endisset
        @isset($invoice_data)
        @foreach($invoice_data as $data)
            <p>{{ $data->amount_to_pay }}</p>
        @endforeach
        @endisset
        </div>
        <div class="amtPaid2">
        @isset( $datas['amount_to_pay'])
            <p>{{ $datas['amount_to_pay'] }}</p>
        @endisset
        @isset($invoice_data)
        @foreach($invoice_data as $data)
            <p>{{ $data->amount_to_pay }}</p>
        @endforeach
        @endisset
        </div>
        <div class="due1">
        @isset( $datas['amount_to_pay'])
            <p>{{ $datas['amount_to_pay'] }}</p>
        @endisset
        @isset($invoice_data)
        @foreach($invoice_data as $data)
            <p>{{ $data->amount_to_pay }}</p>
        @endforeach
        @endisset
        </div>
        <div class="month3">
        @isset( $datas['invoiceMonth'])
            <p>{{ $datas['invoiceMonth'] }}</p>
        @endisset
        @isset($invoice_data)
        @foreach($invoice_data as $data)
            <p>{{ date('F', mktime(0, 0, 0,  $data->month_due, 10)) }}</p>
        @endforeach
        @endisset
        </div>
    </div>
</body>
<script>
$(document).ready(function(){
    let amtWords = toWordsconver(@{{ arrears }});
   alert(toWordsconver(amtWords));
});
</script>

</html>