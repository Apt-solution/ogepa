<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>User's Receipt</title>
	<link rel='stylesheet' type='text/css' href="{{asset('css/style1.css') }}"  />
</head>

<body>
	
	<div id="page-wrap" >
		<h5 id="header">RECEIPT</h5>
		
		<div id="identity">
		
            <h5 id="address">Address: <br>{{ $data['user_details']->address }}
            <br><br>
            Phone: <br> {{ $data['user_details']->phone }}</h5>

            <div style="text-align: right;">
              <img id="image" style="height: 100px; width:100px; margin-top:-10px" src="{{asset('images/ogwama.png')}}" alt="logo" />
            </div>
		
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">

            <h4 id="customer-title">{{ $data['user_details']->first_name }} <br>{{ $data['user_details']->last_name }}</h4>

            <table id="meta">
			@foreach($payment as $pay)
                <tr>
                    <td class="meta-head">Invoice #</td>
                    <td><h4>{{$pay->ref}}</h4></td>
                </tr>
                <tr>

                    <td class="meta-head">Date</td>
                    <td><h4 id="date">{{$pay->created_at->format('d-M-Y')}}</h4></td>
                </tr>
                <tr>
                    <td class="meta-head">Amount Due</td>
                    <td><div class="due"><span>&#8358;</span>{{ number_format($data['total_due'], 2) }}</div></td>
                </tr>
			@endforeach
            </table>
		
		</div>
		
		<table id="items">
		@foreach($payment as $pay)
		  <tr>
		      <th>Item</th>
		      <th>Description</th>
		      <th>Unit Cost</th>
		      <th>Quantity</th>
		      <th>Price</th>
		  </tr>
		  
		  <tr class="item-row">
		      <td class="item-name"><div class="delete-wpr"><h4>Waste Product</h4></div></td>
		      <td class="description"><h4 disabled>Waste Payment for OGWAMA ({{$pay->created_at->format('M-Y')}})</h4></td>
		      <td><h4 class="cost"><span>&#8358;</span>{{ number_format($data['monthlyPayment'], 2) }}</h4></td>
		      <td><h4 class="qty">1</h4></td>
		      <td><span class="price"><span>&#8358;</span>{{ number_format($data['monthlyPayment'], 2) }}</span></td>
		  </tr>
		  
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Subtotal</td>
		      <td class="total-value"><div id="subtotal"><span>&#8358;</span>{{ $pay->amount }}</div></td>
		  </tr>
		  <tr>

		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Total</td>
		      <td class="total-value"><div id="total"><span>&#8358;</span>{{ $pay->amount }}</div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Amount Paid</td>

		      <td class="total-value"><h4 id="paid"><span>&#8358;</span>{{ $pay->amount }}</h4></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Balance Due</td>
		      <td class="total-value balance"><div class="due"><span>&#8358;</span>{{ number_format($data['total_due'], 2) }}</div></td>
		  </tr>
		@endforeach
		</table>
		
		<div id="terms">
		  <h5>Terms</h5>
		  <h4>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</h4>
		</div>
	
	</div>
	
</body>

</html>