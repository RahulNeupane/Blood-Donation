<div class="main-wrapper main-wrapper-1">
    <div class="navbar-bg"></div>
    <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
                <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </form>
        <ul class="navbar-nav navbar-right">
            <li class="">
                <a href="#" data-toggle="dropdown" class="nav-link nav-link-lg nav-link-user">
                    <div class="d-sm-none d-lg-inline-block">Welcome back, {{ auth()->user()->name }}</div>
                </a>
            </li>
        </ul>
    </nav>
    <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand mb-5">
                <a href="{{route('dashboard')}}"><img src="{{ url('/images/logo.png') }}" alt="LOGO"
                        width="120"></a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm mb-5">
                <a href="" class=""><img src="{{ url('images/favicon.png') }}" alt="LOGO"
                        width="30"></a>
            </div>
            <ul class="sidebar-menu">
                <li class="menu-header">Dashboard</li>
                <li class="">
                    <a href="{{route('dashboard')}}" class="nav-link"><i
                            class="fas fa-fire"></i><span>Dashboard</span></a>
                </li>
                <li class="">
                    <a href="{{route('changepass')}}" class="nav-link"><i
                            class="fas fa-fire"></i><span>Change Password</span></a>
                </li>
                <li class="">
                    <a href="{{route('allUsers')}}" class="nav-link"><i
                            class="fas fa-fire"></i><span>All Users</span></a>
                </li>
                <li class="">
                    <a href="{{route('home')}}" class="nav-link"><i
                            class="fas fa-fire"></i><span>Goto Homepage</span></a>
                </li>
                {{-- <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown"><i
                            class="fas fa-clipboard-list"></i><span>Categories</span></a>
                    <ul class="dropdown-menu">
                        <li class=""><a class="nav-link"
                                href="">Add Categories</a></li>
                        <li class=""><a class="nav-link"
                                href="">All Categories</a></li>
                    </ul>
                </li> --}}
                <li class="menu-header">Log Out</li>
                <li>
                    <a href="{{ route('signout') }}" class="nav-link">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Log Out</span>
                    </a>
                </li>
            </ul>
        </aside>
    </div>
</div>
