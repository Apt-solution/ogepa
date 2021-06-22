@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="card bg-dark h-50">
            <div class="card-heading">
                Add an Industrial Payment
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

            <form method="post" action="{{ route('add-industrial-amount-paid') }}">
                @csrf
                <input type="hidden" name="user_id" value="{{ Session::get('user_id') }}">
                <input type="hidden" name="month" value="{{ Session::get('month') }}">
                <div class="input-group form-group mb-3 col-md-6">
                    <label for="">Amount</label><br /><p>&nbsp;</p>
                    <input type="number" name="amount" class="form-control" id="">
                </div>

                <input type="submit" class="btn btn-primary" value="Enter amount paid">

            </form>
        </div>


    </div>
</div>

<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
@endsection