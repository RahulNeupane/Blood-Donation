@extends('layouts.home')
@section('content')
    <hr>
    <div class="container" data-aos="fade">
        <div class="row">
            <div class="col-md-12 p-3 text-center">
                <h1 class="text-capitalize">{{ $event->title }}</h1>
            </div>
        </div>
    </div>
    <div class="page-content blog-detail" data-aos="fade">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="photo">
                        <img src="{{ url(asset('images/events/' . $event->image)) }}">
                    </div>
                    <div class="sub d-flex justify-content-start flex-column">
                        <div class="author"><span>By:</span> {{ $event->posted_by }}</div>
                        <div class="date mt-4" ><span class=" p-3 text-white rounded" style="background-color:{{ $color }}; "> {{ $event->date }}</span> </div>
                    </div>
                    <div class="text mt-3">
                        <p>
                            {!! nl2br($event->body) !!}
                        </p>
                        
                    </div>

                    <div class="share">
                        <script type="text/javascript"
                            src="https://platform-api.sharethis.com/js/sharethis.js#property=633263d3bfbc4500128cca2f&product=inline-share-buttons"
                            async="async"></script>
                        <div class="sharethis-inline-share-buttons"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
