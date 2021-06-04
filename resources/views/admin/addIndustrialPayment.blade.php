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

            <form method="post" action="{{ route('add-industrial-data') }}">
                @csrf

                @foreach($industries as $industry)
                <div class="row col-md-12">
                    <div class="col-md-6 form-group">
                        <label for="">Industry</label><br>
                        {{ $industry->user->full_name }}
                        <!--<input type="text" name="company[]" readonly class="form-control" value="{{ $industry->user->full_name }}">-->
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="">Select Type</label>
                        <select name="type[]" class="form-control myemployee" id="{{ $industry->id }}" onchange="getComboAaa(this)">
                            <option value="">select type</option>
                            @foreach($industriesCharges as $industriesCharge)
                            <option>{{ $industriesCharge->sub_client_type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="">Amount</label>
                        <input type="number" required id="amount{{ $industry->id }}" name="amount[]" value="50000" class="form-control">
                    </div>
                </div>
                <input type="hidden" name="id[]" value="{{ $industry->user_id }}">
                @endforeach

                <input type="submit" class="btn btn-primary">
            </form>
        </div>


    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    var arrayw = {};
    var arrayw = <?php echo json_encode($industriesCharges); ?>;

    function getComboAaa(selectObject) {
        var selId = $(selectObject).attr('id');
        var employee = $('#' + selId + ' option:selected');
        var detail = employee.val();
        let user = arrayw.find(item => item.sub_client_type == detail);
        var amount = user.monthly_payment;
        $('#amount' + selId).val(amount);
    }
</script>
@endsection