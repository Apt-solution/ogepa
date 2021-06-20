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

            <form method="post" action="{{ route('add-amount-paid') }}">
                @csrf

                <div class="input-group mb-3 col-md-6">
                    <label for="">Industry</label>
                    <select class="js-example-basic-single form-control" name="industry_id">
                        @foreach($industries as $industry)
                        <option value="{{ $industry->user_id }}">{{ $industry->user->full_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group mb-3 col-md-6">
                    <label for="">Month</label>
                    <select id="month" class="js-example-basic-single form-control" name="month">
                    </select>
                </div>

                <input type="submit" class="btn btn-primary" value="Add amount paid">

            </form>
        </div>


    </div>
</div>

<script>
    let month = {
        'Jan': 1,
        'Feb': 2,
        'Mar': 3,
        'Apr': 4,
        'May': 5,
        'Jun': 6,
        'Jul': 7,
        'Aug': 8,
        'Sept': 9,
        'Oct': 10,
        'Nov': 11,
        'Dec': 12
    };

    $(document).ready(function() {
        $('.js-example-basic-single').select2();
        for(const key in month){
        console.log(key + ":" + month[key]);
        $('#month').append('<option value="'+month[key]+'">'+ key + '</option>');
    }
    });
</script>
@endsection