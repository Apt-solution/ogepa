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
    
    <title>Residential Invoices</title>
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
        top: 4.5cm;
        left:2.5cm;
    }
    .address{
        position: absolute;
        top: 5.4cm;
        left: 3cm;
    }
    .desc{
        position: absolute;
        top: 10.5cm;
        left: 2.5cm;
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
        top: 10.5cm;
        left: 11.5cm;
    }
    .month{
        position: absolute;
        top: 9.5cm;
        left:16.5cm;
    }
    .current{
        position: absolute;
        top: 13cm;
        left:5cm;
    }
    .net{
        position: absolute;
        top: 13.5cm;
        left:4cm;
    }
    .total2{
        position: absolute;
        top: 14.2cm;
        left: 2.5cm;
    }
    .due{
        position: absolute;
        top: 18cm;
        left: 14.5cm;
    }
    .month2{
        position: absolute;
        top: 18cm;
        left: 17cm;
    }
    .amtPaid{
        position: absolute;
        top: 19.2cm;
        left:1.6cm;
    }
    .amtWord{
        position: absolute;
        top: 22cm;
        left:5cm;
    }
    .amtPaid2{
        position: absolute;
        top: 25.2cm;
        left:1.6cm;
    }
    .due1{
        position: absolute;
        top: 24cm;
        left: 14.8cm;
    }
    .month3{
        position: absolute;
        top: 24cm;
        left: 17cm;
    }
</style>
</head>
<body class="A4">
@foreach($residential_invoice_data as $key => $data)
    <div class="container sheet">
        <div class="name">
            <p>{{ $data[0]->full_name }}</p>
        </div>
        <div class="address">
            <p>{{ $data[0]->address }}</p>
        </div>
        <div class="desc">
            <p>OGWAMA BILL</p>
        </div>
        <div class="trip">
            <p></p>
        </div>
        <div class="per-trip">
            <p></p>
        </div>
        <div class="total1">
            <p>{{ $data[0]->initialAmount }}</p>
        </div>
        <div class="month">
            <p>{{ date('F', mktime(0, 0, 0,  date('m')-1, 10)) }}</p>
        </div>
        <div class="current">
            <p>{{ $data[0]->initialAmount }}</p>
        </div>
        <div class="net">
            <p>{{ $data[0]->amount_to_pay - $data[0]->initialAmount }} </p>
        </div>
        <div class="total2">
            <p>{{ $data[0]->amount_to_pay }}</p>
        </div>
        <div class="due">
            <p>{{ $data[0]->amount_to_pay }}</p>
        </div>
        <div class="month2">
            <p>{{ date('F', mktime(0, 0, 0,  date('m')-1, 10)) }}</p>
        </div>
        <div class="amtPaid">
            <p>{{ $data[0]->amount_to_pay }}</p>
        </div>
        <div class="amtWord">
            <p id="amtWord">{{ $data[0]->amount_to_pay }}</p>
        </div>
        <div class="amtPaid2">
            <p>{{ $data[0]->amount_to_pay }}</p>
        </div>
        <div class="due1">
            <p>{{ $data[0]->amount_to_pay }}</p>
        </div>
        <div class="month3">
            <p>{{ date('F', mktime(0, 0, 0,  date('m')-1, 10)) }}</p> 
        </div>
    </div>
@endforeach
</body>
<script>
    $(document).ready(function(){
        // toWordsconver($('#amtWord').text());
        $('#amtWord').text();
    });

</script>
</html>