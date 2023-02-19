@extends('layouts.home')
@section('content')
    <hr>
    <div class="container mt-5">
        <div class="text-center">
            <h1>Redeem Summary</h1>
            <div class="d-flex justify-content-center  ">
                <div class="one"> <img src="{{ url(asset('images/St_line.png')) }}" class="img-fluid "
                        style="height: 3px;width: 13.5vh;"> </div>
                <div class="two"> <img src="{{ url(asset('images/rectangle.png')) }}" class="img-fluid"
                        style="height: 21px;width: 21px;"> </div>
                <div class="three"> <img src="{{ url(asset('images/St_line.png')) }}" class="img-fluid"
                        style="height: 3px;width: 13.5vh;"> </div>
            </div>
        </div>
        <br><br>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-8 col-sm-12">
                <div class="card blogg mb-5 shadow-sm ">
                    <div class="img col-lg-12 mt-2 text-center">
                        <img src="{{ url(asset('images/reward/' . $reward->image)) }}" alt="redeem"
                            class="img-responsive">
                    </div>
                    <div class="card-body mt-3">
                        <div class="card-body">
                            <h2><b>{{ $reward->title }}</b></h2>
                            <p class="text-secondary">LifeLine</p>
                            <hr>
                            <p class="text-secondary">
                                Required Points: {{ $reward->point }}
                            </p>
                            <p class="text-secondary">
                                Your Points: {{ auth()->user()->RewardPoints }}
                            </p>
                            @if ($reward->point > auth()->user()->RewardPoints)
                               <p class="text-danger">Not enough points</p>
                            @endif
                            <hr>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary" @if (auth()->user()->RewardPoints < $reward->point) disabled @endif>Confirm
                                Redeem</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
