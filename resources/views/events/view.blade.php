@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 m-auto ">
                <div class="section-body justify-content-center">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card p-5">
                                <div class="card-header text-center mb-3 justify-content-between">
                                    <h4>Event Detail</h4>
                                    <div>
                                        <a href="{{ route('events.index') }}" class="btn btn-primary">View Events</a>
                                    </div>
                                </div>
                                <div class="card-body d-flex flex-wrap">
                                    <img src="{{ url('/images/events/' . $event->image) }}" class="card-img" alt="event">
                                    <div class="card-footer">
                                        <div class="mb-3">
                                            <p class="card-text d-inline text-white p-1" style="background: {{$color}}">{{ $event->date }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <h5 class="card-title">{{ $event->title }}</h5>
                                        </div>
                                        <p class="card-text">{{ $event->body }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
