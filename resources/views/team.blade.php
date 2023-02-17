@extends('layouts.home')
@section('content')
    <hr>

    <!-- About Us Section -->
    <div class="container mx-auto mt-5 align-items-center" id="aboutus">
        <div class="row">
            <div class="col-lg-12 align-content-center">
                <div class="title text-center">
                    <h1>About US</h1>
                    <div class="d-flex justify-content-center  ">
                        <div class="one"> <img src="{{ url(asset('images/St_line.png')) }}" class="img-fluid "
                                style="height: 3px;width: 13.5vh;"> </div>
                        <div class="two"> <img src="{{ url(asset('images/rectangle.png')) }}" class="img-fluid"
                                style="height: 21px;width: 21px;"> </div>
                        <div class="three"> <img src="{{ url(asset('images/St_line.png')) }}" class="img-fluid"
                                style="height: 3px;width: 13.5vh;"> </div>
                    </div><br><br>
                    <p class="text-center col-lg-10 justify-content-center mx-auto">Existing blood management system in
                        Nepal is manual,cumbersome
                        and inefficient. Most blood banks record the information on blood
                        collection/supply manually in registers
                        Maintaining blood inventory is tedious with laborious back-
                        office paperwork and managing information on availability and
                        shortage of blood is a tall task
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="card-container d-flex justify-content-center mt-3">
        <div class="row col-lg-10 col-md-12">
            <div class="col-lg-4 col-sm-6 mb-3 mb-sm-0">
                <div class="card  about_card ml-3">
                    <div class="card-body">
                        <h5 class="card-title text-center ">Give Donation</h5>
                        <p class="card-text text-center pt-2">With supporting text below as a natural lead-in to additional
                            content.</p>
                        <div class="d-flex justify-content-center pt-6"><a href="#"
                                class="btn text-black text-bold align-self-center "
                                style="background: #D9D9D9;border: 3px solid #CF3D3C;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); font-weight: 500;width:170px">Donate
                                now</a></div> <br>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="card about_card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Become a volunteer</h5>
                        <p class="card-text text-center pt-2">With supporting text below as a natural lead-in to additional
                            content.</p>
                        <div class="d-flex justify-content-center "><a href="#"
                                class="btn text-black text-bold align-self-center ml-auto pt-2"
                                style="background: #D9D9D9;border: 3px solid #CF3D3C;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); font-weight: 500;width:170px">Become
                                now</a></div> <br>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="card about_card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Give Scholarship</h5>
                        <p class="card-text text-center pt-2">With supporting text below as a natural lead-in to additional
                            content.</p>
                        <div class="d-flex justify-content-center"><a href="#"
                                class="btn text-black text-bold align-self-center ml-auto"
                                style="background: #D9D9D9;border: 3px solid #CF3D3C;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); font-weight: 500;width:170px">Give
                                now</a></div> <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Us Section -->
    <!-- Our team -->
    <div class="team-area" id="team">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 align-content-center">
                    <div class="title text-center">
                        <h1>Our Team</h1>
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
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="single-team">
                                <div class="img-area">
                                    <img src="{{ url(asset('images/nabin.jpeg')) }}" class="img-responsive" alt=""
                                        height="435px">
                                    <div class="social">
                                        <ul class="list-inline">
                                            <li><a href="#"><i class='bx bxl-facebook-circle'></i></a></li>
                                            <li><a href="#"><i class='bx bxl-twitter'></i></a></li>
                                            <li><a href="#"><i class='bx bxl-instagram'></i></a></li>
                                            <li><a href="#"><i class='bx bxl-linkedin'></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="img-text">
                                    <h4>Nabin Sapkota</h4>
                                    <h5>Front-End Developer</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="single-team">
                                <div class="img-area">
                                    <img src="{{ url(asset('images/rahul.jpg')) }}" class="img-responsive" alt=""
                                        height="435px">
                                    <div class="social">
                                        <ul class="list-inline">
                                            <li><a href="#"><i class='bx bxl-facebook-circle'></i></a></li>
                                            <li><a href="#"><i class='bx bxl-twitter'></i></a></li>
                                            <li><a href="#"><i class='bx bxl-instagram'></i></a></li>
                                            <li><a href="#"><i class='bx bxl-linkedin'></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="img-text">
                                    <h4>Rahul Neupane</h4>
                                    <h5>Back-End Developer</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="single-team">
                                <div class="img-area">
                                    <img src="{{ url(asset('images/nabin.jpeg')) }}" class="img-responsive"
                                        alt="" height="435px">
                                    <div class="social">
                                        <ul class="list-inline">
                                            <li><a href="#"><i class='bx bxl-facebook-circle'></i></a></li>
                                            <li><a href="#"><i class='bx bxl-twitter'></i></a></li>
                                            <li><a href="#"><i class='bx bxl-instagram'></i></a></li>
                                            <li><a href="#"><i class='bx bxl-linkedin'></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="img-text">
                                    <h4>Anam Rajdhami</h4>
                                    <h5>Back-End Developer</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our team -->
@endsection
