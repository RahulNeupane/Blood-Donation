@extends('layouts.home')
@section('content')
<hr>
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
                                        <h4>Nabin Sapkota</h4>
                                        <h5>Front-End Developer</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="single-team">
                                    <div class="img-area">
                                        <img src="{{ url(asset('images/rahul.jpg')) }}" class="img-responsive"
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
                                        <h4>Rahul Neupane</h4>
                                        <h5>Back-End Developer</h5>
                                    </div>
                                </div>
                            </div>
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