@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif

        <div class="page-content page-container" id="page-content" style="margin-top: 60px;;">
            <div class="padding">
                <div class="row container d-flex justify-content-center">
                    <div class="col-xl-10 col-md-12">
                        <div class="card user-card-full">
                            <div class="row m-l-0 m-r-0">
                                <div class="col-sm-4 bg-c-lite-green user-profile">
                                    <div class="card-block text-center text-white">
                                        <div class="m-b-25"> <img src="{{ asset('public/images/user.png') }}" class="img-radius" alt="User-Profile-Image"> </div>
                                        <h6 class="f-w-600">{{ $data['user_details']->first_name.' '.$data['user_details']->last_name }}</h6>
                                        <p>{{ $data['user_details']->phone }}</p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                        <p>Ogwema Ref: {{ $data['user_details']->ogwema_ref }}</p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                        <p><a href="#" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">View Payment History</a></p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" style="color: #000;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Payment Histories</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-striped">
                                                            <tr>
                                                                <td>Payment Date</td>
                                                                <td>Amount</td>
                                                            </tr>
                                                            @foreach($data['paymentHistories'] as $payment)
                                                            <tr>
                                                                <td>{{ $payment->created_at }}</td>
                                                                <td>{{ $payment->amount }}</td>
                                                                <td><a href="{{route('user.receipt', $payment->id) }}">Download Receipt</a></td>
                                                            </tr>
                                                            @endforeach
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="card-block">
                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Address</p>
                                                <h6 class="text-muted f-w-400">{{ $data['user_details']->address }}</h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Local Govt.</p>
                                                <h6 class="text-muted f-w-400">{{ $data['user_details']->lga }}</h6>
                                            </div>
                                        </div>
                                        <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Billing</h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">{{ $data['month_name']. date('-Y') }} Billing</p>
                                                <h6 class="text-muted f-w-400">&#8358; {{ number_format($data['current_billing'], 2) }}</h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Arrears</p>
                                                <h6 class="text-muted f-w-400">&#8358; {{ number_format($data['total_due'], 2) }}</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Total Due</p>
                                                <h6 class="text-muted f-w-400">&#8358; {{ number_format($data['total_due'], 2) }}</h6>
                                            </div>
                                        </div>
                                        <p>&nbsp;</p>
                                        <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600 ">Make Payment</h6>
                                        <div class="row">
                                            <input type="button" class="btn btn-primary btn-flat rounded" name="answer" value="MAKE A PAYMENT" onclick="showDiv()" />
                                            <div id="welcomeDiv" style="display:none;" class="answer_list">
                                                <p>&nbsp;</p>
                                                <form method="POST" style="margin-top: -20px;" action="{{ route('confirmPay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                                                    @csrf
                                                    <input type="number" readonly value="{{ $data['total_due'] }}" id="amount-entered" class="form-control"  placeholder="Enter amount" min="500" required>
                                                    <input type="hidden" name="amount" id="amount">
                                                    <input type="hidden" name="charges" id="charges">
                                                    <input type="hidden" name="total_due" id="total_due">
                                                    <input type="submit" class="btn btn-success btn-block mt-2" value="CONTINUE TO PAY">

                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    function showDiv() {
        document.getElementById('welcomeDiv').style.display = "block";
    }

    $(document).ready(function(){ 
        amount = $("#amount-entered").val();
        // getting paystack amount and 15 naira pay
        charges = (amount * 0.015) + 200;
        if(charges > 2000){
            charges = 2200;
        }
        total_due = parseInt(amount) + parseInt(charges);
        $("#amount").val(amount)
        $("#charges").val(charges)
        $("#total_due").val(total_due)
        $("#charges_span").text(charges)
        $("#total_payment").text(total_due)
        $("#payment-btn").val('PAY ' + total_due)
        $("#amount_in_kobo").val(total_due * 100)
        // console.log($("#amount-entered").val());
    });
</script>
@endsection