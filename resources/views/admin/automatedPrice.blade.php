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
                <th>Monthly Billing</th>
            </tr>
            @foreach($automatedPrice as $automatedPrices)
            <tr>
                <td>{{ $automatedPrices->client_type }}</td>
                <td>{{ $automatedPrices->monthly_payment }}</td>
                <td><a href="#" data-toggle="modal" data-target="#exampleModal{{ $automatedPrices->id }}"><i class="fa fa-edit btn btn-primary"></i></a></td>
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{ $automatedPrices->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit amount</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="{{ route('editAutomatedPrice') }}" method="post">
                                @csrf

                                <input type="hidden" name="id" value="{{ $automatedPrices->id }}">

                                <div class="form-group">
                                    <label for="">Type</label>
                                    <input type="text" name="client_type" class="form-control" value="{{ $automatedPrices->client_type }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="">amount</label>
                                    <input type="number" required name="monthly_payment" class="form-control" value="{{ $automatedPrices->monthly_payment }}">
                                </div>

                                <input type="submit" class="btn btn-primary" value="save changes">

                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->

                            </form>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </table>

    </div>
</div>
@endsection