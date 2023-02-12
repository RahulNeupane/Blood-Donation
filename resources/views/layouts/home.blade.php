<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LifeLine</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    {{-- box icons  --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- izitoast --}}
    <link rel="stylesheet" href="{{ asset('assets/iziToast.min.css') }}">
    @vite(['resources/js/app.js'])


</head>

<body>
    {{-- navbar starts  --}}
    <header class="header_section  bg-body py-0">
        <div class="container px-0">
            <nav class="navbar navbar-expand-lg custom_nav-container">
                <div class="container-fluid px-0">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img width="80" src="{{ url(asset('images/logo.png')) }}" alt="LOGO" />
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav">
                            @auth
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('donate') }}">Donate</a>
                                </li>
                            @else
                                <li class="nav-item active">
                                    <a class="nav-link" href="#whyus">Why us?</a>
                                </li>
                            @endauth
                            <li class="nav-item">
                                <div class="dropdown">
                                    <button class="nav-link dropdown-toggle" style="background:transparent;border:none;"
                                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Pages
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#team">Team</a></li>
                                        <li><a class="dropdown-item" href="#">Events</a></li>
                                        <li><a class="dropdown-item" href="{{ route('blogs') }}">Blog</a></li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#gallery">Gallery</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                            <li class="nav-item">
                                @auth
                                    <div class="dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <span><img src="{{ url('/images/user/' . auth()->user()->image) }}"
                                                    alt="user" width="20"
                                                    style="border-radius: 50%; object-fit:cover;"
                                                    class="me-2"></span>{{ auth()->user()->name }}
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('viewProfile') }}">Profile</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                                        </ul>
                                    </div>
                                @else
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
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

    <!-- Footer -->
    <div class="mt-5 pt-5 pb-5 footer bg-white shadow-sm border-1-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-xs-12 about-company">
                    <a class="mb-2" href="{{ route('home') }}">
                        <img width="80" src="{{ url(asset('images/logo.png')) }}" alt="LOGO" />
                    </a>
                    <p class="pr-5 text-black-50 mt-4">Blood is precious, give it freely. Your donation can be the
                        difference between life and death. </p>
                    <p class="h-5"><a href="#"><i class='bx bxl-facebook-circle'></i></a><a href="#"><i
                                class='bx bxl-twitter'></i></a><a href="#"><i class='bx bxl-linkedin'></i></a><a
                            href="#"><i class='bx bxl-instagram'></i></a></p>
                </div>
                <div class="col-lg-3 col-xs-12 links">
                    <h4 class="mt-lg-0 mt-sm-3">Links</h4>
                    <ul class="m-0 p-0">
                        <li class="list-group-item">-<a class="" href="{{ route('donate') }}">Donate</a></li>
                        <li class="list-group-item">- <a class="" href="#whyus">Why us?</a></li>
                        <li class="list-group-item">- <a class="" href="#team">Team</a></li>
                        <li class="list-group-item">- <a class="" href="#">Events</a></li>
                        <li class="list-group-item">- <a class="" href="#blogger">Blog</a></li>
                        <li class="list-group-item">- <a class="text-underline-hover" href="#gallery">Gallery</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 col-xs-12 location">
                    <h4 class="mt-lg-0 mt-sm-4">Location</h4>
                    <p>KamalPokhari, Kathmandu Nepal</p>
                    <p class="mb-0"><i class='bx bx-phone-call mr-5'></i> 44600</p>
                    <p><i class='bx bx-envelope mr-3'></i> lifeline@gmail.com</p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col copyright">
                    <p class=""><small class="text-black-50">© 2023. All Rights Reserved.Fancy
                            Freelancers</small>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->

    @yield('scripts')
    {{-- izi toast  --}}
    <script src="{{ asset('assets/iziToast.min.js') }}"></script>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                iziToast.error({
                    title: '',
                    position: 'topRight',
                    message: '{{ $error }}',
                });
            </script>
        @endforeach
    @endif

    @if (session()->get('error'))
        <script>
            iziToast.error({
                title: '',
                position: 'topRight',
                message: "{{ session()->get('error') }}",
            });
        </script>
    @endif
    @if (session()->get('success'))
        <script>
            iziToast.success({
                title: '',
                position: 'topRight',
                message: "{{ session()->get('success') }}",
            });
        </script>
    @endif
</body>

</html>
