<div class="sidebar" style="background-color: black;">
    @if(\Auth::User()->role === 'admin')
    <li style="margin-bottom: -15px;"><a href="{{route('home')}}" class="text-sm"><i class="fas fa-home"></i> Dashboard</a></li>
    <li style="margin-bottom: -15px;"><a href="{{ route('user.reg') }}" class="text-sm"><i class="fas fa-user-plus"></i> Register User</a></li>
    <li style="margin-bottom: -15px;"><a href="{{ route('showPSPVendor') }}" class="text-sm"><i class="fas fa-user-plus"></i> Register PSP / Vendor</a></li>
    <li style="margin-bottom: -15px;"><a href="{{ route('allUser') }}" class="text-sm"><i class="fas fa-users rounded"></i> All User(s) / Client(s)</a></li>
    <li style="margin-bottom: -15px;"><a href="{{ route('PSPList') }}" class="text-sm"><i class="fas fa-users rounded"></i> All PSP / Vendor</a></li>
    <!-- <li style="margin-bottom: -15px;"><a  href="{{ route('payments') }}" class="text-sm"> <i class="fas fa-receipt pr-1"></i> View Payments</a></li> -->
    <li style="margin-bottom: -15px;"><a  href="{{ route('automatedPrice') }}" class="text-sm"> <i class="fas fa-wallet"></i> Set Automated Payment</a></li>
    <li style="margin-bottom: -15px;"><a href="{{route('showHistory') }}" class="text-sm"><i class="fas fa-history pr-1"></i>View Payment History</a></li>
    <li style="margin-bottom: -15px;"><a href="{{route('addSubAdmin') }}" class="text-sm"><i class="fas fa-user pr-1"></i>Add Commercial Officer</a></li>
    <li style="margin-bottom: -15px;"><a href="{{route('addSubAdmin') }}" class="text-sm"><i class="fas fa-user pr-1"></i>Add industry for Comm. Officer</a></li>
    <!-- <li style="margin-bottom: -15px;"><a href="{{route('add-industrial-payment') }}" class="text-sm"><i class="fas fa-user pr-1"></i>Add Industrial Payment</a></li> -->
    <!-- <li style="margin-bottom: -15px;"><a href="{{route('print-industrial-bill') }}" class="text-sm"><i class="fas fa-user pr-1"></i>Print Industrial Bill</a></li> -->
    <li style="margin-bottom: -15px;"><a href="{{route('industrial-paid-payment') }}" class="text-sm"><i class="fas fa-user pr-1"></i>Add Industrial Paid Payment</a></li>
    @endif

    @if(\Auth::User()->role === 'user')
    <li><a href="{{ route('user_profile') }}">my profile</a></li>
    @endif
</div>
