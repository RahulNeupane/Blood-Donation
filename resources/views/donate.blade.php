@extends('layouts.home')
@section('content')
<div class="container">
    <div class="row col-lg-8 col-md-8 col-sm-10 mx-auto">
        <form action="{{route('donateRequest')}}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card">
                <div class="card-header text-center">
                    <h3>Donate Request</h3>
                    @if (session('fail'))
                        <li class="alert alert-danger mb-2">
                            {{ session('fail')}}
                        </li>
                        @endif
                </div>
                <div class="card-body">
                    <input type="text" value="1" name="type" hidden>
                    <input type="text" value="{{auth()->user()->id}}" name="userid" hidden>
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}" disabled>
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" disabled>
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" value="{{ auth()->user()->address }}, {{auth()->user()->district}}" disabled>
                        @error('address')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{ auth()->user()->phone }}" disabled>
                        @error('phone')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Age</label>
                        <input type="text" class="form-control" name="age" value="{{auth()->user()->age}}" disabled>
                        @error('age')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Blood Group</label>
                        <select class="form-select" name="group" disabled>
                            <option selected value="{{auth()->user()->group}}">{{auth()->user()->group}}</option>
                        </select>
                        @error('group')
                            <p class="text-danger">{{ $message }}</p>
                         @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gender</label>
                        <select class="form-select" name="gender" disabled>
                            <option selected value="{{auth()->user()->gender}}">{{auth()->user()->gender}}</option>
                        </select>
                        @error('gender')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Send Request</button>

                </div>
            </div>

        </form>
    </div>
</div>
@endsection