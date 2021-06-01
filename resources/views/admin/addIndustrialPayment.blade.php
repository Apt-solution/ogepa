@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="card bg-dark h-50">
            <div class="card-heading">
                Add Industrial Payment
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

        <div class="col-md-12">

            <form method="post" action="{{ route('register-sub-admin') }}">
                @csrf

                @foreach($industries as $industry)
                <div class="row col-md-12">
                    <div class="col-md-6 form-group">
                        <label for="">Industry</label>
                        <input type="text" name="company[]" readonly class="form-control" value="{{ $industry->user->full_name }}">
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="">Select Type</label>
                        <select name="type" class="form-control" id="">
                            <option value="">select type</option>
                            @foreach($industriesCharges as $industriesCharge)
                            <option>{{ $industriesCharge->sub_client_type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="">Amount</label>
                        <input type="number" name="amount[]" class="form-control">
                    </div>
                </div>
                @endforeach

            </form>
        </div>


    </div>
</div>
@endsection