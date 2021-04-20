<div class="sidebar">
    @if(\Auth::User()->role === 'admin')
    <li><a href="{{route('home')}}"><i class="fas fa-home"></i> Dashboard</a></li>
    <li><a href="{{ route('allUser') }}"><i class="fas fa-users rounded"></i> All User(s) / Client(s)</a></li>
    <li><a href="{{ route('automatedPrice') }}"><i class="fas fa-wallet"></i> Set Automated Price(s)</a></li>
    <li><a  href="{{ route('payments') }}"> <i class="fas fa-receipt"></i> View Payments</a></li>
    @endif

    @if(\Auth::User()->role === 'user')
    <li><a href="{{ route('user_profile') }}">my profile</a></li>
    @endif
</div>
