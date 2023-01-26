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
                                <h4>Details</h4>
                            </div>
                            <div class="card-body d-flex flex-wrap">
                                <div class="col">
                                    <div class="img-card mb-3">
                                        <img src="{{url('/images/'.$user->image)}}" alt="user" width="100">
                                    </div>
                                    <div class="mb-3">
                                        <h3>{{$user->name}}</h3>
                                    </div>
                                    <div class="mb-3">
                                        <h6>{{$user->email}}</h6>
                                    </div>
                                    <div class="mb-3">
                                        <p>{{$user->address}}, {{$user->district}}</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label><b>Gender:</b> </label>
                                        <p>{{$user->gender}}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label><b>Age:</b> </label>
                                        <p>{{$user->age}}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label><b>Phone:</b> </label>
                                        <p>{{$user->phone}}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label><b>Blood Group:</b> </label>
                                        <p>{{$user->group}}</p>
                                    </div>
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