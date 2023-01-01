@extends('layouts.app')
@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center">
                    <h1>Events</h1>                  
                        <div class="image-container">
                            <img class="img-responsive" src={{ asset('images/events1.jpg')}}  alt="">
                            <img class="img-responsive" src= {{ asset('images/slider.jpg')}}  alt="">
                            <img class="img-responsive" src={{ asset('images/slider.jpg')}}  alt="">
                        </div>

                        <div class="image-container">
                            <img class="img-responsive" src={{ asset('images/events1.jpg')}}  alt="">
                            <img class="img-responsive" src= {{ asset('images/slider.jpg')}}  alt="">
                            <img class="img-responsive" src={{ asset('images/slider.jpg')}}  alt="">
                        </div>
                    <a href="{{route('events')}}" class="btn btn-danger mx-auto">View more</a>
                </div>
            </div>
        </div>
</div>

@endsection  
</body>
</html>
