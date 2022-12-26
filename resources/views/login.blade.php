@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-6 col-sm-10 mx-auto">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Login</h3>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="mb-3">
                                <label>Email:</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            @error('email')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            <div class="mb-3">
                                <label>Password:</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            @error('password')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            <div class="mb-3">
                                <button class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <p>Don't have an Account ? <a href="{{route('register')}}">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection