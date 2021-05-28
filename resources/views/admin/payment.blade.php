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

        <div class="col-md-1"></div>
        <table class="table table-striped table-bordered col-md-10">
            <tr>
                <th>Client type</th>
                <th>Client name</th>
                <th>Phone</th>
                <th>amount</th>
                <th>date paid</th>
                <th>Ref No</th>
            </tr>
            <?php $total = 0; ?>
            @foreach($payments as $payment)
            <tr>
                <td>{{ $payment->user->client_type }}</td>
                <td>{{ $payment->user->first_name.' '.$payment->user->last_name }}</td>
                <td>{{ $payment->user->phone }}</td>
                <td>{{ $payment->amount }}</td>
                <td>{{ $payment->updated_at }}</td>
                <td>{{ $payment->ref }}</td>
            </tr>
            <?php $total += $payment->amount ?>
            @endforeach
            <tr>
                <th colspan="3" class="text-right">TOTAL</th>
                <th class="text-right">{{ number_format($total, 2) }}</th>
            </tr>
        </table>

    </div>
</div>
@endsection