@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 m-auto ">
                <div class="section-body justify-content-center">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card p-5">
                                <div class="card-header text-center mb-3">
                                    <h4>Event Detail</h4>
                                </div>
                                <div class="card-body d-flex flex-wrap">
                                    <img src="{{ url('/images/events/' . $event->image) }}" class="card-img" alt="event">
                                    <div class="card-footer">
                                        <p class="card-text"><small>{{ $event->date }}</small></p>
                                        <h5 class="card-title">{{ $event->title }}</h5>
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
