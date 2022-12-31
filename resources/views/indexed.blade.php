@extends('layouts.app')
@section('content')
    <div class="hero-section position-relative">
        <img src="{{url(asset('images/20221226075544.jpg'))}}" class="d-block w-100 z-1" alt="..." style="height: 90vh">
        <div class="details position-absolute">
            <h1>Welcome to Our Website</h1>
            <p>We are a team of experienced professionals dedicated to providing top-quality services to our clients.</p>
            <button class="btn btn-primary">Learn More</button>
        </div>
    </div>
      
@endsection