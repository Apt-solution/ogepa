@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">


        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div class="row container d-flex justify-content-center">
                    <div class="col-xl-10 col-md-12">
                        <div class="card user-card-full">
                            <div class="row m-l-0 m-r-0">
                                <div class="col-sm-4 bg-c-lite-green user-profile">
                                    <div class="card-block text-center text-white">
                                        <div class="m-b-25"> <img src="{{ asset('images/user.png') }}" class="img-radius" alt="User-Profile-Image"> </div>
                                        <h6 class="f-w-600">{{ $data['user_details']->first_name.' '.$data['user_details']->last_name }}</h6>
                                        <p>{{ $data['user_details']->phone }}</p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                        <p>Ogwema Ref: {{ $data['user_details']->ogwema_ref }}</p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
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
                                                <p class="m-b-10 f-w-600">{{ date('M-Y') }} Billing</p>
                                                <h6 class="text-muted f-w-400">&#8358; {{ number_format($data['current_billing'], 2) }}</h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Total Due</p>
                                                <h6 class="text-muted f-w-400">&#8358; {{ number_format($data['total_due'], 2) }}</h6>
                                            </div>
                                        </div>
                                        <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Make Payment</h6>
                                        <div class="row">
                                            <input type="button" name="answer" value="MAKE A PAYMENT" onclick="showDiv()" />
                                            <div id="welcomeDiv" style="display:none;" class="answer_list"> 
                                                <form action="">
                                                @csrf
                                                <input type="number" class="form-control" placeholder="enter amount" min="500" required>
                                                </form>
                                            </div>
                                        </div>
                                        <ul class="social-link list-unstyled m-t-40 m-b-10">
                                            <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                            <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                            <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                                        </ul>
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
                                            </script>
@endsection