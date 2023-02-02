@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand text-center mb-3">
                        <img src="{{ url('images/favicon.png') }}" alt="logo" width="100">
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="m-auto">Register</h4>

                        </div>
                        @if (Session::has('success'))
                            <div class="alert alert-success text-center" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <div class="card-body">
                            <form method="POST" action="{{ route('registration_submit') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input id="name" type="name"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Retype Password</label>
                                    <input id="password" type="password"
                                        class="form-control @error('retype_password') is-invalid @enderror"
                                        name="retype_password" autocomplete="current-password">

                                    @error('retype_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">District</label>
                                    <input type="text" class="form-control @error('district') is-invalid @enderror"
                                        name="district" value="{{ old('district') }}">
                                    @error('district')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        name="address" value="{{ old('address') }}">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                        name="phone" value="{{ old('phone') }}">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Age</label>
                                    <input type="text" class="form-control @error('age') is-invalid @enderror"
                                        name="age" value="{{ old('age') }}">
                                    @error('age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Blood Group</label>
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
                                    @error('group')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Gender</label>
                                    <select class="form-select @error('gender') is-invalid @enderror" name="gender">
                                        <option selected value="0">Select gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="others">Others</option>
                                    </select>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label ">Image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        name='image'>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
