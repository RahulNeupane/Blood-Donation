@extends('layouts.home')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-10 mx-auto">
                <div class="card p-5">
                    <div class="card-body d-flex flex-wrap">
                        <div class="col">
                            <div class="img-card mb-3">
                                <img src="{{url('/images/user/'.auth()->user()->image)}}" alt="user" width="100">
                            </div>
                            <div class="mb-3">
                                <h3>{{auth()->user()->name}}</h3>
                            </div>
                            <div class="mb-3">
                                <h6>{{auth()->user()->email}}</h6>
                            </div>
                            <div class="mb-3">
                                <p>{{auth()->user()->address}}, {{auth()->user()->district}}</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{route('editProfile')}}" class="text-primary">Edit Profile</a>
                            </div>
                            <div class="mb-3">
                                <a href="{{route('showchangepassword')}}" class="text-primary">Change Password</a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label><b>Gender:</b> </label>
                                <p>{{auth()->user()->gender}}</p>
                            </div>
                            <div class="mb-3">
                                <label><b>Age:</b> </label>
                                <p>{{auth()->user()->age}}</p>
                            </div>
                            <div class="mb-3">
                                <label><b>Phone:</b> </label>
                                <p>{{auth()->user()->phone}}</p>
                            </div>
                            <div class="mb-3">
                                <label><b>Blood Group:</b> </label>
                                <p>{{auth()->user()->group}}</p>
                            </div>
                            <div class="mb-3">
                                <label><b>Reward Points: </b>{{auth()->user()->RewardPoints}}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
@endsection
