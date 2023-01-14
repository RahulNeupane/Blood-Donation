<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LifeLine</title>
    @vite(['resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('sidebar/dropify/css/dropify.min.css') }}">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('sidebar/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sidebar/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('sidebar/modules/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sidebar/modules/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('sidebar/modules/owlcarousel2/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sidebar/modules/owlcarousel2/dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sidebar/plugins/dropify/css/dropify.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('sidebar/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('sidebar/css/components.css') }}">
</head>

<body>
    <div id="app">
        @guest
            {{-- @yield('content') --}}
        @else
            <div class="main-wrapper main-wrapper-1">
                <div class="navbar-bg"></div>

                <!-- sidebar section start  -->
                @include('layouts.sidebar');
                <!-- sidebar section ends  -->



                <!-- Main Content -->
                <div class="main-content">
                    @yield('content')
                </div>

                {{-- footer starts here  --}}
                <footer class="main-footer">
                    <div class="footer-left">
                        Copyright &copy; 2023 <div class="bullet"></div> Design By <a
                            href="https://github.com/rahulneupane">Fancy Freelancers</a>
                    </div>
                    <div class="footer-right"></div>
                </footer>
            </div>
        @endguest
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('sidebar/dropify/js/dropify.min.js') }}"></script>

    {{-- sidebar --}}
    <!-- General JS Scripts -->
    <script src="{{ asset('sidebar/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('sidebar/modules/popper.js') }}"></script>
    <script src="{{ asset('sidebar/modules/tooltip.js') }}"></script>
    <script src="{{ asset('sidebar/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('sidebar/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('sidebar/modules/moment.min.js') }}"></script>
    <script src="{{ asset('sidebar/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('sidebar/modules/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('sidebar/modules/chart.min.js') }}"></script>
    <script src="{{ asset('sidebar/modules/owlcarousel2/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('sidebar/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('sidebar/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <script src="{{ asset('sidebar/plugins/dropify/js/dropify.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('sidebar/js/page/index.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('sidebar/js/scripts.js') }}"></script>
    <script src="{{ asset('sidebar/js/custom.js') }}"></script>

    @yield('scripts')
</body>

</html>
