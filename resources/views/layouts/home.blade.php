<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LifeLine</title>
    <link rel="stylesheet" href="{{asset('assets/style.css')}}">
    {{-- dropify css  --}}
    <link rel="stylesheet" href="{{asset('assets/plugins/dropify/css/dropify.min.css')}}">
    {{-- box icons  --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @vite(['resources/js/app.js'])

</head>
<body>
    {{-- navbar starts  --}}
    <header class="header_section  bg-body py-0">
        <div class="container px-0">
            <nav class="navbar navbar-expand-lg custom_nav-container">
                <div class="container-fluid px-0">
                    <a class="navbar-brand" href="{{route('home')}}">
                        <img width="80" src="{{ url(asset('images/logo.png')) }}" alt="LOGO" />
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Why us?</a>
                            </li>
                            <li class="nav-item">
                                <div class="dropdown">
                                    <button class="nav-link dropdown-toggle" style="background:transparent;border:none;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                      Pages
                                    </button>
                                    <ul class="dropdown-menu">
                                      <li><a class="dropdown-item" href="#">Team</a></li>
                                      <li><a class="dropdown-item" href="#">Events</a></li>
                                      <li><a class="dropdown-item" href="#">Blog</a></li>
                                    </ul>
                                  </div>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="#">Gallery</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                            <li class="nav-item">
                                @auth
                                    <div class="dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span><img src="{{url('/images/'.auth()->user()->image)}}" alt="user" width="20" style="border-radius: 50%" class="me-2"></span>{{auth()->user()->name}}
                                        </a>
                                      
                                        <ul class="dropdown-menu">
                                          <li><a class="dropdown-item" href="{{route('viewProfile')}}">Profile</a></li>
                                          <li><a class="dropdown-item" href="#">Another action</a></li>
                                          <li><a class="dropdown-item" href="{{route('signout')}}">Logout</a></li>
                                        </ul>
                                      </div>
                                @else
                                    <a class="nav-link" href="{{route('login')}}">Login</a>
                                @endauth
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    {{-- navbar ends  --}}

    @yield('content')
    
    {{-- dropify js  --}}
    <script src="{{asset('assets/plugins/dropify/js/dropify.min.js')}}"></script>

    @yield('scripts')
</body>
</html>