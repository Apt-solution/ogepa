@extends('layouts.app')
@section('content')
<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
<div class="container">
    <div class="row">
        <div class="col-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 style="color:green; font-weight:bold" class="lead text-center">Add New User</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">First name:</label>
                            <input name="fname" type="text" class="form-control" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <label for="">Last name:</label>
                            <input type="text" name="lname" class="form-control" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <label for="">Phone:</label>
                            <input type="text" name="phone" class="form-control" placeholder="Phone Number">
                        </div>
                        <div class="form-group">
                            <label for="">Email:</label>
                            <input type="email" name="email" class="form-control" placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <label for="lga">Select LGA:</label>
                            <select class="form-select js-example-basic-single pb-4" name="lga">
                            <option selected>Select LGA</option>
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
                        <div class="form-group">
                            <label for="">Address:</label>
                            <textarea class="form-control" name="" id="" cols="10" rows="2"></textarea>
                        </div>
                        <button class="btn btn-success float-right">ADD NEW USER</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
