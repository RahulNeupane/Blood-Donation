@extends('layouts.home')
@section('content')
    <hr>
    <div class="page-content event">
        <div class="container mt-5">
            <div class="text-center">
                <h1>Our Events</h1>
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
                @foreach ($events as $event)
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="card eventg mb-5 shadow-sm ">
                            <img src="{{ url(asset('images/events/' . $event->image)) }}" alt=""
                                class="img-responsive" height="300">
                            <div class="card-body">
                                <div class="card-title">
                                    <h2>{{ $event->title }}</h2>
                                </div>
                                <div class="card-text">
                                    <p>
                                        {!! nl2br(Str::limit($event->body, 150)) !!}
                                    </p>
                                </div>
                                <div class="text-center">
                                    <a href="{{ route('event_detail',$event->id) }}" class="btn btn-outline-primary rounded">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="row">
                <div class="col-md-12">
                    {{ $events->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
