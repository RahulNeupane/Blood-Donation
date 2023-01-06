@extends('layouts.home')
@section('content')
    <div class="hero-section">
        <img src="{{url(asset('images/slider.jpg'))}}" class="d-block w-100 z-1"  style="height: 90vh">
        <div class="details">
            <h1>Blood is a life,<br>pass it on !</h1>
            <p>Help us eliminate blood scarcity in Nepal</p>
            <a href=""><span>Donate Now <i class='bx bxs-right-arrow'></i></span></a>
        </div>
        <img src="{{url(asset('images/wave.svg'))}}" class="wave">    
    </div>
      
@endsection