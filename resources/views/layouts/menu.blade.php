<div class="sidebar">
    @if(\Auth::User()->role === 'admin')
    <li><a href="{{route('home')}}"><span class="bi bi-speedometer"></span>Dashboard</a></li>
    <li><a href="{{ route('allUser') }}"><i class="fas fa-users rounded"></i> All User(s) / Client(s)</a></li>
    <li><a href="{{ route('automatedPrice') }}"><i class="fal fa-money-check-edit"></i>Set Automated Price(s)</a></li>
    <li><a  href="{{ route('payments') }}">View Payments</a></li>
    @endif

    @if(\Auth::User()->role === 'user')
    <li><a href="{{ route('user_profile') }}">my profile</a></li>
    @endif
</div>
