@extends('layouts.app')

@section('content')
<div class="row">
    <div class="card bg-dark p-1">
        <div class="card-heading">
            Reset User Password
        </div>
    </div>
</div>
<div class="container">
    @if(Session::has('status'))
        <div class="alert alert-success">
            <p>{{ Session::get('status') }}</p>
        </div>  
    @endif
    <div class="row">
        <div class="col-sm-5">
            <form action="{{route('resetUserPwd')}}" method="post">
            @csrf
                <div class="form-group">
                    <label for="">Enter User Ogwama Code:</label>
                    <input required type="text" class="form-control" name="ogwama_ref" placeholder="User Ogwama Code">
                    @error('ogwama_ref')<p style="margin-top: -2px;" class="text-danger text-sm">{{ $message }}</p>@enderror
                </div>
                <button class="btn btn-success">RESET PASSWORD</button>
            </form>
        </div>
    </div>
</div>

@endsection