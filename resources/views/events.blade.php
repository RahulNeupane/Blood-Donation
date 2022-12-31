@extends('layouts.app')
@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center">
                    <h1>Events</h1>                  
                    <div class="image-container">
                        <img class="img-thumbnail" src={{ asset('images/blooddonation.jpg')}}  alt="">
                        <img class="img-thumbnail" src={{ asset('images/blooddonation.jpg')}}  alt="">
                        <img class="img-thumbnail" src={{ asset('images/blooddonation.jpg')}}  alt="">
                    </div>
                </div>
            </div>
        </div>
</div>
<a href="{{route('events')}}" class="btn btn-danger mx-auto">View more</a>

@endsection  
</body>
</html>