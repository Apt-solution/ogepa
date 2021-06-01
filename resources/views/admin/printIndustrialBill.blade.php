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

        @if (\Session::has('error'))
        <div class="alert alert-danger">
            <ul>
                <li>{!! \Session::get('error') !!}</li>
            </ul>
        </div>
        @endif

        <div class="col-md-12">

            <form method="post" action="{{ route('industrial-bill') }}">
                @csrf

                <div class="col-md-6 form-group">
                    <label for="">Month</label>
                    <select name="month" id="" class="form-control">
                        @for ($i=1; $i < 13; $i++)
                         <option>{{ $i }}</option>
                        @endfor
                    </select>
                </div>

                <input type="submit" class="btn btn-primary">
            </form>
        </div>


    </div>
</div>


@endsection