<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('home') }}" style="background-color: black;" class="brand-link">
        <img src="{{asset('images/ogwama.png') }}"
             alt="OGEPA Logo"
             class="brand-image img-circle">
        <span style="color: white;" class="brand-text font-weight-light">OGWAMA ADMIN</span>
    </a>

    <div class="sidebar" style="background-color: black;">
        <nav class="mt-2" >
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>

</aside>
