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
                <a href="{{ route('dashboard') }}"><img src="{{ url('/images/logo.png') }}" alt="LOGO"
                        width="120"></a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm mb-5">
                <a href="" class=""><img src="{{ url('images/favicon.png') }}" alt="LOGO"
                        width="30"></a>
            </div>
            <ul class="sidebar-menu">
                <li class="menu-header">Dashboard</li>
                <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="nav-link" data-bs-toggle="tooltip"
                        data-bs-placement="right" data-bs-title="Dashboard"><i
                            class="fas fa-fire"></i><span>Dashboard</span></a>
                </li>
                <li class="{{ request()->routeIs('allUsers') ? 'active' : '' }}">
                    <a href="{{ route('allUsers') }}" class="nav-link" data-bs-toggle="tooltip"
                        data-bs-placement="right" data-bs-title="All Users"><i class="fas fa-user"></i><span>All
                            Users</span></a>
                </li>
                <li class="{{ request()->routeIs('changepass') ? 'active' : '' }}">
                    <a href="{{ route('changepass') }}" class="nav-link" data-bs-toggle="tooltip"
                        data-bs-placement="right" data-bs-title="Change Password"><i class="fas fa-key"></i><span>Change
                            Password</span></a>
                </li>
                <li class="">
                    <a href="{{ route('home') }}" class="nav-link" data-bs-toggle="tooltip"
                    data-bs-placement="right" data-bs-title="Goto Home Page"><i class="fas fa-home" ></i><span>Goto
                            Homepage</span></a>
                </li>
                <li
                    class="dropdown {{ Request::is('events') ? 'active' : '' }} || {{ Request::is('events/*') ? 'active' : '' }} || {{ Request::is('gallery') ? 'active' : '' }} || {{ Request::is('gallery/*') ? 'active' : '' }} || {{ Request::is('blogger') ? 'active' : '' }} || {{ Request::is('blogger/*') ? 'active' : '' }} || {{ request()->routeIs('carousel*') ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-home"></i><span>Homepage
                            Items</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ request()->routeIs('carousel*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('carousel.index') }}"><i
                                    class='bx bx-calendar-event'></i>Carousel</a>
                        </li>
                        <li
                            class="{{ Request::is('events') ? 'active' : '' }} || {{ Request::is('events/*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('events.index') }}"><i
                                    class='bx bx-calendar-event'></i>Events</a>
                        </li>
                        <li
                            class="{{ Request::is('gallery') ? 'active' : '' }} || {{ Request::is('gallery/*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('gallery.index') }}"><i
                                    class="fas fa-image"></i>Gallery</a>
                        </li>
                    </ul>
                </li>

                <li
                    class="dropdown {{ Request::is('donate-request') ? 'active' : '' }} || {{ Request::is('receive-request') ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-tint"></i><span>Blood
                            Request</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ Request::is('donate-request') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('donateRequest') }}"><i class='bx bx-donate-blood'></i>Donate
                                Request</a>
                        </li>
                        <li class="{{ Request::is('receive-request') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('receiveRequests') }}"><i class='bx bxs-donate-blood'></i>Receive
                                Request</a></li>
                    </ul>
                </li>
                <li
                    class="dropdown {{ Request::is('blog-categories*') ? 'active' : '' }}|| {{ Request::is('blog*') ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i
                            class="fab fa-blogger-b"></i><span>Blog</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ request()->routeIs('blogCategory*') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('blogCategory.index') }}"><i class="fa fa-list"></i>Category</a>
                        </li>
                        <li class="{{ request()->routeIs('blog*') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('blog.index') }}"><i class="fab fa-blogger-b"></i>Blog</a>
                        </li>
                        <li class="{{ request()->routeIs('show_comments') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('show_comments') }}"><i class="fas fa-comment"></i> <span> Pending
                                    Comments </span></a>
                        </li>
                        <li class="{{ request()->routeIs('approved_comments') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('approved_comments') }}"><i class="fas fa-comment"></i> <span>
                                    Comments</span></a>
                        </li>
                        <li class="{{ request()->routeIs('show_reply') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('show_reply') }}"><i class="fas fa-reply"></i>Pending Reply</a>
                        </li>
                        <li class="{{ request()->routeIs('approved_reply') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('approved_reply') }}"><i class="fas fa-reply"></i>Approved Reply</a>
                        </li>
                    </ul>
                </li>
                <li
                    class="dropdown {{ request()->routeIs('reward*') ? 'active' : '' }} || {{ request()->routeIs('showReedemedRewards') ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i
                            class="fas fa-trophy"></i><span>Reward</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ request()->routeIs('reward*') ? 'active' : '' }}">
                            <a href="{{ route('reward.index') }}" class="nav-link"><i
                                    class="fas fa-trophy"></i><span>All Rewards</span></a>
                        </li>
                        <li class="{{ request()->routeIs('showReedemedRewards') ? 'active' : '' }}"><a
                                class="nav-link" href="{{ route('showReedemedRewards') }}"><i
                                    class="fas fa-trophy"></i><span>Reedemed</span> Rewards</a></li>
                    </ul>
                </li>
                <li
                    class="dropdown {{ request()->routeIs('redeemReports') ? 'active' : '' }} || {{ request()->routeIs('donateReports') ? 'active' : '' }} || {{ request()->routeIs('receiveReports') ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i
                            class='fas fa-file'></i><span>Report</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ request()->routeIs('donateReports') ? 'active' : '' }}">
                            <a href="{{ route('donateReports') }}" class="nav-link"><i
                                    class='bx bxs-report'></i>Donate Reports</a>
                        </li>
                        <li class="{{ request()->routeIs('receiveReports') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('receiveReports') }}"><i class='bx bxs-report'></i>Receive Reports</a>
                        </li>
                        <li class="{{ request()->routeIs('redeemReports') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('redeemReports') }}"><i class='bx bxs-report'></i><span>Reedemed
                                    Reports</span></a></li>
                    </ul>
                </li>

                <li class="menu-header">Log Out</li>
                <li>
                    <a href="{{ route('logout') }}" class="nav-link" data-bs-toggle="tooltip"
                    data-bs-placement="right" data-bs-title="Logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span></a>
                </li>
            </ul>
        </aside>
    </div>
</div>
