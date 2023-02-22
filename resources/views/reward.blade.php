@extends('layouts.home')
@section('content')
    <hr>
    <div class="page-content blog" data-aos="fade">
        <div class="container mt-5">
            <div class="text-center">
                <h1>Our Rewards</h1>
                <div class="d-flex justify-content-center  ">
                    <div class="one"> <img src="{{ url(asset('images/St_line.png')) }}" class="img-fluid "
                            style="height: 3px;width: 13.5vh;"> </div>
                    <div class="two"> <img src="{{ url(asset('images/rectangle.png')) }}" class="img-fluid"
                            style="height: 21px;width: 21px;"> </div>
                    <div class="three"> <img src="{{ url(asset('images/St_line.png')) }}" class="img-fluid"
                            style="height: 3px;width: 13.5vh;"> </div>
                </div><br><br>
            </div>
            <div class="d-flex justify-content-end mb-5">
                <form action="{{ route('rewards_search') }}" method="GET" role="search">
                    <div class="input-group">
                        <input type="search" name="search" placeholder="search reward" class="form-control me-1"
                            name="search">
                        <button class="btn btn-primary" type="submit">
                            Search
                        </button>
                    </div>
                </form>
            </div>
            <div class="row">
                @foreach ($rewards as $reward)
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="card blogg mb-5 shadow-sm text-capitalize">
                            <img src="{{ url(asset('images/reward/' . $reward->image)) }}" alt="reward_item"
                                class="img-responsive">
                            <div class="card-body">
                                <div class="card-title">
                                    <h2>{{ $reward->title }}</h2>
                                </div>
                                <div class="card-text">
                                    <p>
                                        Points: {{ $reward->point }}
                                    </p>
                                </div>
                                <div class="text-center">

                                    @auth
                                        <a href="{{ route('rewardRedeem', $reward->id) }}" class="btn text-white rounded"
                                            style="background-color: #CF3D3C">Redeem</a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="row">
                <div class="col-md-12">
                    {{ $rewards->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
