<link rel="stylesheet" href="{{asset('css/dropdown.css') }}">
<div class="sidebar" style="background-color: black;">
    @if(\Auth::User()->role === 'admin')
    <div class="wrapper">
	    <div class="acordeon-core">
            <div class="acordeon">
                <a class="text-sm text-white" href="{{route('home')}}"><i class="fas fa-home pr-1"></i>Dashboard</a>
            </div>
        
            <div class="acordeon">
                <input id="acordeon-2" type="checkbox" name="acordeons">
                <label for="acordeon-2" class="text-sm"><i class="fas fa-user-plus pr-1"></i>Register User</label>
                <div class="acordeon-content">
                    <p ><a class="text-xs" href="{{ route('user.reg') }}" style="background-color: #0b0f24; margin:-15px; padding-left:10px"><i class="fas fa-house-user pr-1"></i>Residential</a></p>
                    <hr style="border:1px solid red">
                    <p><a class="text-xs" href="" style="background-color: #0b0f24; margin:-15px;"><i class="fas fa-store pr-1"></i>Commerical</a></p>
                    <hr style="border:1px solid red">
                    <p><a class="text-xs" href="" style="background-color: #0b0f24; margin:-15px;"><i class="fas fa-hospital pr-1"></i>Medical</a></p>
                    <hr style="border:1px solid red">
                    <p><a  class="text-xs" href="" style="background-color: #0b0f24; margin:-15px;"><i class="fas fa-industry pr-1"></i>Industrial</a></p>
                </div>
            </div>

            <div class="acordeon">
                <a class="text-sm text-white" href="{{route('allUser')}}"><i class="fas fa-users rounded pr-1"></i>All User(s) Data </a>
            </div>

            <div class="acordeon">
                <input id="acordeon-3" type="checkbox" name="acordeons">
                <label for="acordeon-3" class="text-sm"><i class="fas fa-wallet pr-1"></i>Set Automated Payment</label>
                <div class="acordeon-content">
                    <p ><a class="text-xs" href="{{ route('residentialPayment') }}" style="background-color: #0b0f24; margin:-15px; padding-left:10px"><i class="fas fa-house-user pr-1"></i>Residential</a></p>
                    <hr style="border:1px solid red">
                    <p><a class="text-xs" href="{{ route('commercialPayment') }}" style="background-color: #0b0f24; margin:-15px;"><i class="fas fa-store pr-1"></i>Commerical</a></p>
                    <hr style="border:1px solid red">
                    <p><a class="text-xs" href="{{ route('medicalPayment') }}" style="background-color: #0b0f24; margin:-15px;"><i class="fas fa-hospital pr-1"></i>Medical</a></p>
                    <hr style="border:1px solid red">
                    <p><a  class="text-xs" href="{{ route('industrialPayment') }}" style="background-color: #0b0f24; margin:-15px;"><i class="fas fa-industry pr-1"></i>Industrial</a></p>
                </div>
            </div>

            <div class="acordeon">
                <a class="text-sm text-white" href="{{route('payments')}}"><i class="fas fa-receipt pr-1"></i>View Payment(s) </a>
            </div>

            <div class="acordeon">
                <a class="text-sm text-white" href="{{route('automatedPrice')}}"><i class="fas fa-home pr-1"></i>Automated Payment</a>
            </div>

        </div>
    <div>
    @endif

    @if(\Auth::User()->role === 'user')
    <li><a href="{{ route('user_profile') }}">my profile</a></li>
    @endif
</div>

