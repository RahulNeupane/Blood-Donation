@extends('layouts.home')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-body d-flex flex-wrap">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="img-card">
                            <img src="{{url('/images/'.auth()->user()->image)}}" alt="user" width="70">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        2
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
