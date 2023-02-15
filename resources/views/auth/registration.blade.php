@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-10 col-md-8 mx-auto">
                    <div class="login-brand text-center mb-3">
                        <img src="{{ url('images/favicon.png') }}" alt="logo" width="100">
                    </div>
                    <div class="card card-primary">
                        <div class="card-header text-center">
                            <h4 class="m-auto p-3">Register</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('registration_submit') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group ">
                                            <label>Name</label>
                                            <input id="name" type="name"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" autocomplete="name" autofocus>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group ">
                                            <label>Email </label>
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" autocomplete="email" autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group last mb-3">
                                            <label for="password">Password</label>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                autocomplete="current-password">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group last mb-3">
                                            <label for="re-password">Re-type Password</label>
                                            <input id="password" type="password"
                                                class="form-control @error('retype_password') is-invalid @enderror"
                                                name="retype_password" autocomplete="current-password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group ">
                                            <label>District</label>
                                            <input type="text"
                                                class="form-control @error('district') is-invalid @enderror" name="district"
                                                value="{{ old('district') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group ">
                                            <label>Address</label>
                                            <input type="text"
                                                class="form-control @error('address') is-invalid @enderror" name="address"
                                                value="{{ old('address') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group ">
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                                name="phone" value="{{ old('phone') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group ">
                                            <label>Age</label>
                                            <input type="text" class="form-control @error('age') is-invalid @enderror"
                                                name="age" value="{{ old('age') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group ">
                                            <label>Blood Group</label>
                                            <select class="form-select @error('group') is-invalid @enderror" name="group">
                                                <option selected value="0">Select a blood group</option>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>
                                                <option value="AB+">AB-</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group ">
                                            <label>Gender</label>
                                            <select class="form-select @error('gender') is-invalid @enderror"
                                                name="gender">
                                                <option selected value="0">Select gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="others">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="image"
                                                class="form-control @error('image') is-invalid @enderror">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group d-grid">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <p>Already have an account ? <a href="{{ route('login') }}">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
