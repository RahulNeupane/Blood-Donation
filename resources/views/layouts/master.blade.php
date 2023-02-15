<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LifeLine</title>
    @vite(['resources/js/app.js'])
    {{-- css  --}}
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    {{-- izitoast --}}
    <link rel="stylesheet" href="{{ asset('assets/iziToast.min.css') }}">
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    {{-- dynamic login  --}}
    <link rel="stylesheet" href="css/style.css">
</head>

<body>


    @yield('content')


    {{-- box icons  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/dist/boxicons.js"
        integrity="sha512-kWH92pHUC/rcjpSMu19lT+H6TlZwZCAftg9AuSw+AVYSdEKSlXXB8o6g12mg5f+Pj5xO40A7ju2ot/VdodCthw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- izi toast  --}}
    <script src="{{ asset('assets/iziToast.min.js') }}"></script>
    {{-- dynamic login  --}}
    <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js'></script>
    <script src="js/index.js"></script>


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
