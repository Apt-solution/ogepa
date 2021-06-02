<link rel="stylesheet" href="{{asset('css/dropdown.css') }}">
<div class="sidebar" style="background-color: black;">
    @if(\Auth::User()->role === 'admin')
    <li style="margin-bottom: -15px;"><a href="{{route('home')}}" class="text-sm"><i class="fas fa-home"></i> Dashboard</a></li>
    <!-- <li style="margin-bottom: -15px;"><a href="{{ route('user.reg') }}" class="text-sm"><i class="fas fa-user-plus"></i> Register User</a></li> -->
    <!-- <li style="margin-bottom: -15px;"><a href="{{ route('showPSP') }}" class="text-sm"><i class="fas fa-user-plus"></i> Register PSP</a></li> -->
    <!-- <li style="margin-bottom: -15px;"><a href="{{ route('allUser') }}" class="text-sm"><i class="fas fa-users rounded"></i> All User(s) / Client(s)</a></li> -->
    <!-- <li style="margin-bottom: -15px;"><a  href="{{ route('payments') }}" class="text-sm"> <i class="fas fa-receipt pr-1"></i> View Payments</a></li> -->
    <li style="margin-bottom: -15px;"><a  href="{{ route('automatedPrice') }}" class="text-sm"> <i class="fas fa-wallet"></i> Set Automated Payment</a></li>
    <!-- <li style="margin-bottom: -15px;"><a href="{{route('showHistory') }}" class="text-sm"><i class="fas fa-history pr-1"></i>View Payment History</a></li> -->
    @endif

    @if(\Auth::User()->role === 'user')
    <li><a href="{{ route('user_profile') }}">my profile</a></li>
    @endif
</div>

