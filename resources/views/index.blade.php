@extends('layouts.home')
@section('content')

    {{-- slider  --}}
    <div id="carouselExampleCaptions" class="carousel slide" data-aos="fade-in" data-aos-duration="1500">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ url('/images/carousel/' . $carousels[0]->image) }}" class="d-block w-100"
                    style="height: 90vh; filter: brightness(35%)">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="text-shadow">Eliminate blood scarcity in NEPAL</h1>
                    <p class="text-shadow">by donating your time to make an impact, your blood to save lives or your money
                        to create a holistic
                        blood management cycle.</p>
                    <a href="{{ route('donate') }}" class="btn btn-danger">Donate Now <i class='bx bxs-right-arrow'></i></a>
                </div>
            </div>

            <div class="carousel-item">
                <img src="{{ url('/images/carousel/' . $carousels[1]->image) }}" class="d-block w-100"
                    style="height: 90vh; filter: brightness(35%)">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="text-shadow">Eliminate blood scarcity in NEPAL</h1>
                    <p class="text-shadow">by donating your time to make an impact, your blood to save lives or your money
                        to create a holistic
                        blood management cycle.</p>
                    <a href="{{ route('donate') }}" class="btn btn-danger">Donate Now <i class='bx bxs-right-arrow'></i></a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ url('/images/carousel/' . $carousels[2]->image) }}" class="d-block w-100"
                    style="height: 90vh; filter: brightness(35%)">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="text-shadow">Eliminate blood scarcity in NEPAL</h1>
                    <p class="text-shadow">by donating your time to make an impact, your blood to save lives or your money
                        to create a holistic
                        blood management cycle.</p>
                    <a href="{{ route('donate') }}" class="btn btn-danger">Donate Now <i class='bx bxs-right-arrow'></i></a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    {{-- slider end  --}}

    {{-- @auth
    @else --}}
    <!-- Whyus Us Section -->
    <div class="container mx-auto mt-5 " id="whyus" data-aos="fade">
        <div class="row">
            <div class="col-lg-6 col-sm-12 col-md-6" data-aos="fade-right">
                <div class="img-fluid">
                    <img src="{{ url(asset('images/whyus.png')) }}" class="why_img img-fluid"
                        style="height: 50vh;width: 61vh;">
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 col-md-12 pt-10 mx-auto  " data-aos="fade-left">
                <div class="title pt-4">
                    <h1 class="d-flex mx-md-auto">Why LIFELINE ?</h1>
                    <div class="d-flex md-justify-content-center">
                        <div class="one"> <img src="{{ url(asset('images/St_line.png')) }}"
                                class="img-fluid items-center" style="height: 3px;width: 13.5vh;"> </div>
                        <div class="two"> <img src="{{ url(asset('images/rectangle.png')) }}" class="img-fluid"
                                style="height: 21px;width: 21px;"> </div>
                        <div class="three"> <img src="{{ url(asset('images/St_line.png')) }}" class="img-fluid"
                                style="height: 3px;width: 13.5vh;"> </div>
                    </div><br><br>
                </div>
                <p>Existing blood management system in Nepal is manual,cumbersome
                    and inefficient. Most blood banks record the information on blood
                    collection/supply manually in registers.
                    Maintaining blood inventory is tedious with laborious back-
                    office paperwork and managing information on availability and
                    shortage of blood is a tall task
                    A social initiative for a smart, transparent and holistic
                    blood management service from collection to supply.
                    When it comes to blood, right information at the right time can be the
                    answer to a life and death situation.</p>
            </div>
        </div>
    </div><br><br>


    <!-- Gallery -->
    <div class="mt-5 container" id="gallery" data-aos="fade-left">
        <div class="row">
            <div class="text-center">
                <h1>Gallery</h1>
                <div class="d-flex justify-content-center  ">
                    <div class="one"> <img src="{{ url(asset('images/St_line.png')) }}" class="img-fluid "
                            style="height: 3px;width: 13.5vh;"> </div>
                    <div class="two"> <img src="{{ url(asset('images/rectangle.png')) }}" class="img-fluid"
                            style="height: 21px;width: 21px;"> </div>
                    <div class="three"> <img src="{{ url(asset('images/St_line.png')) }}" class="img-fluid"
                            style="height: 3px;width: 13.5vh;"> </div>
                </div><br><br>
            </div>
            <div class="row">
                @foreach ($images as $image)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card  mb-5 shadow-sm image-fluid">
                            <img src="{{ url('/images/gallery/' . $image->image) }}" class="img-responsive"
                                alt="" height="350px">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Gallery -->

    <!-- Blog Section -->
    <div class="container my-5" id="blogger" data-aos="fade"> 
        <div class="text-center">
            <h1>Recent Blogs</h1>
            <div class="d-flex justify-content-center  ">
                <div class="one"> <img src="{{ url(asset('images/St_line.png')) }}" class="img-fluid "
                        style="height: 3px;width: 13.5vh;"> </div>
                <div class="two"> <img src="{{ url(asset('images/rectangle.png')) }}" class="img-fluid"
                        style="height: 21px;width: 21px;"> </div>
                <div class="three"> <img src="{{ url(asset('images/St_line.png')) }}" class="img-fluid"
                        style="height: 3px;width: 13.5vh;"> </div>
            </div><br><br>
        </div>
        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card blogg mb-5 shadow-sm">
                        <img src="{{ url(asset('images/blogs/' . $blog->photo)) }}" alt=""
                            class="img-responsive">
                        <div class="card-body text-center">
                            <div class="card-title">
                                <h2>{{ $blog->title }}</h2>
                            </div>
                            <div class="card-text">
                                <p>
                                    {!! nl2br(Str::limit($blog->description, 150)) !!}
                                    <a href="{{ route('blog_detail', $blog->id) }}" class="ms-2">Read More</a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center">
            <a href="{{ route('blogs') }}" class="btn rounded px-4 text-white" style="background-color: #CF3D3C">View
                All</a>
        </div>
    </div>
    <!-- Blog Section -->

    {{-- need blood  --}}
    <div class="container mt-5" data-aos="fade">
        <div class="col-lg-12 contact mx-auto">
            <div class="row">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class=" py-5">
                        <img src="{{ asset('images/contact-img.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6 py-5 text-white text-center d-flex flex-column justify-content-center" data-aos="fade-left">
                    <h1> <b>रगत चाहियो?</b></h1>
                    <p class="fs-4">Fill in the form and send us your details.</p>
                    <p class="fs-4">Someone will get back to you asap. If it’s an emergency,</p>
                    <p class="fs-4">call us @ +977 9800000000 or msg us at Facebook</p>
                    <span>
                        <a href="{{ route('receive') }}"
                            class="btn me-3 px-5 py-2 shadow text-danger bg-white border-0">Request
                            Blood</a>
                        <a href="{{ route('donate') }}"
                            class="btn btn-secondary btn me-3 px-5 py-2  border-white shadow bg-danger">Donate
                            Blood</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
    {{-- end need blood  --}}

    {{-- @endauth --}}
@endsection
