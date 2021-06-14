<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
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
            <p>{{ $datas->industryName }}</p>
        </div>
        <div class="address">
            <p>{{ $datas->address }}</p>
        </div>
        <div class="desc">
            <p>OGWAMA BILL</p>
        </div>
        <div class="trip">
            <p>{{ $datas->trip }}</p>
        </div>
        <div class="per-trip">
            <p>{{ $datas->perTrip }}</p>
        </div>
        <div class="total1">
            <p>{{ $datas->total1 }}</p>
        </div>
        <div class="month">
            <p>{{ $datas->invoiceMonth }}</p>
        </div>
        <div class="current">
        {{ $datas->currentCharge }}
        </div>
        <div class="net">
            <p>{{ $datas->netArreas }}</p>
        </div>
        <div class="total2">
            <p>{{ $datas->total1 }}</p>
        </div>
        <div class="due">
            <p>{{ $datas->total1 }}</p>
        </div>
        <div class="month2">
            <p>{{ $datas->invoiceMonth }}</p>
        </div>
        <div class="amtPaid">
            <p>{{ $datas->total1 }}</p>
        </div>
        <div class="amtWord">
            <p>{{ strtoupper($amtWord) }}</p>
        </div>
        <div class="amtPaid2">
            <p>{{ $datas->total1 }}</p>
        </div>
        <div class="due1">
            <p>{{ $datas->total1 }}</p>
        </div>
        <div class="month3">
            <p>{{ $datas->invoiceMonth }}</p>
        </div>
    </div>
</body>

</html>