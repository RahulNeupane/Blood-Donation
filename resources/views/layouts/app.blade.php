<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LifeLine</title>
    @vite(['resources/js/app.js'])
</head>
<body>
    {{-- navbar starts  --}}
    <header class="header_section  bg-body py-0">
        <div class="container px-0">
            <nav class="navbar navbar-expand-lg custom_nav-container">
                <div class="container-fluid px-0">
                    <a class="navbar-brand" href="">
<<<<<<< HEAD
                        <img width="80" src="{{ url(asset('images/blooddonation.jpg')) }}" alt="LOGO" />
=======
                        <img width="80" src="{{ url(asset('images/logo.png')) }}" alt="LOGO" />
>>>>>>> cc64e07436d6fb8657af94f15e707bb86728314f
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
<<<<<<< HEAD
                                      <li><a class="dropdown-item" href="route{{('events')}}">Events</a></li>
=======
                                      <li><a class="dropdown-item" href="#">Events</a></li>
>>>>>>> cc64e07436d6fb8657af94f15e707bb86728314f
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
                                <a class="nav-link" href="{{route('login')}}">Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    {{-- navbar ends  --}}

    @yield('content')
    
</body>
</html>