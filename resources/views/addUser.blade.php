@extends('layouts.app')
@section('content')
<script>
$(document).ready(function() {
    $.noConflict();
    $('.js-example-basic-single').select2();
});
</script>
<div class="container">
    <div class="row">
        <div class="col-10 mt-2 mx-auto">
            <div class="card">
                <div class="card-header bg-success">
                    <h5 class="card-title">Account Creation</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('user.reg')}}" method="post">
                        <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">First Name</label>
                            <input type="text" class="form-control" placeholder="John" aria-label="fname" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">Last Name</label>
                            <input type="text" class="form-control" placeholder="Doe" aria-label="lname" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">Phone Number</label>
                            <input type="text" class="form-control" placeholder="08012345678" aria-label="lname" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1">Email Address</label>
                            <input type="text" class="form-control" placeholder="emailaddress@domain.com" aria-label="lname" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Local Govt:</label>
                            <select class="form-select" id="inputGroupSelect01">
                                <option selected>Choose...</option>
                                <option value="Abeokuta_North">Abeokuta_North</option>
                                <option value="Abeokuta_South">Abeokuta_South</option>
                                <option value="Ado_Odo_Ota">Ado_Odo_Ota</option>
                                <option value="Ewekoro">Ewekoro</option>
                                <option value="Ifo">Ifo</option>
                                <option value="Ijebu_East">Ijebu_East</option>
                                <option value="Ijebu_North">Ijebu_North</option>
                                <option value="Ijebu_North_East">Ijebu_North_East</option>
                                <option value="Ikenne">Ikenne</option>
                                <option value="Imeko_Afon">Imeko_Afon</option>
                                <option value="Ipokia">Ipokia</option>
                                <option value="Obafemi_Owode">Obafemi_Owode</option>
                                <option value="Odeda">Odeda</option>
                                <option value="Odogbolu">Odogbolu</option>
                                <option value="Ogun_Water_Side">Ogun_Water_Side</option>
                                <option value="Remo_North">Remo_North</option>
                                <option value="Sagamu">Sagamu</option>
                                <option value="Yewa_North">Yewa_North</option>
                                <option value="Yewa_South">Yewa_South</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text">Address</label>
                            <textarea class="form-control" aria-label="With textarea"></textarea>
                        </div>
                        <button class="btn btn-success float-right">ADD NEW USER</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
