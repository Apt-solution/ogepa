<div class="sidebar">
    @if(\Auth::User()->role === 'admin')
    <li><a href="{{ route('allUser') }}">all user(s) / client(s)</a></li>
    <li><a href="{{ route('automatedPrice') }}">Set automated price(es)</a></li>
    <li><a href="{{ route('payments') }}">View payments</a></li>
    @endif

    @if(\Auth::User()->role === 'user')
    <li><a href="{{ route('user_profile') }}">my profile</a></li>
    @endif
</div>
