@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
        @endif

        <div class="col-md-12 top-space"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="card col-md-12" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Search payment(s)</h5>
                    <p class="card-text">select the dates you want to check the payment</p>

                    <form action="{{ route('searchPayment') }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <label for="" class="col-md-12">from</label>
                            <input type="date" name="from" value="{{ old('from') }}" placeholder="date from" class="form-control @error('from') is-invalid @enderror">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-calendar"></span></div>
                            </div>
                            @error('from')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <label for="" class="col-md-12">to</label>
                            <input type="date" name="to" value="{{ old('to') }}" placeholder="date to" class="form-control @error('from') is-invalid @enderror">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-calendar"></span></div>
                            </div>
                            @error('to')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <input type="submit" class="btn btn-primary">
                    </form>

                </div>
            </div>
        </div>



        </table>

    </div>
</div>

<style>
    .top-space {
        height: 150px;
    }
</style>
@endsection