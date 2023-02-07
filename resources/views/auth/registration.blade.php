@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div>
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
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <img src="{{ url('images/person-fill.svg') }}">
                                                <input id="name" type="name"
                                                class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Full name"
                                                value="{{ old('name') }}" autocomplete="name" autofocus>      
                                        </span>
                                    </div>

                                </div>
                                <div class="mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                        <img src="{{ url('images/envelope-fill.svg') }}">

                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                placeholder="Email" value="{{ old('email') }}" autocomplete="email"
                                                autofocus>
                                        </span>
                                    </div>

                                </div>

                                <div class="mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                        <img src="{{ url('images/lock-fill.svg') }}">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                placeholder="Password" autocomplete="current-password">
                                        </span>
                                    </div>

                                </div>
                                <div class="mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                        <img src="{{ url('images/unlock-fill.svg') }}">
                                            <input id="password" type="password"
                                                class="form-control @error('retype_password') is-invalid @enderror"
                                                name="retype_password" placeholder="Confirm password"
                                                autocomplete="current-password">
                                        </span>
                                    </div>

                                </div>
                                <div class="mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <img src="{{ url('images/house-door-fill.svg') }}">
                                            <input type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Address"
                                                name="address" value="{{ old('address') }}">
                                        </span>
                                    </div>

                                </div>
                                <div class="mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="#8a0303" class="me-3 bi bi-house-door-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
                                            </svg>
                                            <input type="text"
                                                class="form-control @error('district') is-invalid @enderror"
                                                name="district" value="{{ old('district') }}" placeholder="district">
                                        </span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                        <img src="{{ url('images/telephone-fill.svg') }}">
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone number"
                                                name="phone" value="{{ old('phone') }}">

                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="#8a0303" class="me-3 bi bi-telephone-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                            </svg>
                                            <input type="text" class="form-control @error('age') is-invalid @enderror"
                                                name="age" value="{{ old('age') }}" placeholder="age">
                                        </span>
                                    </div>

                                </div>
                                <div class="mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                            <img src="{{ url('images/droplet-half.svg') }}">
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

                                            </span>
                                        </div>

                                </div>
                                <div class="mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="#8a0303" class="me-3 bi bi-droplet-half" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M7.21.8C7.69.295 8 0 8 0c.109.363.234.708.371 1.038.812 1.946 2.073 3.35 3.197 4.6C12.878 7.096 14 8.345 14 10a6 6 0 0 1-12 0C2 6.668 5.58 2.517 7.21.8zm.413 1.021A31.25 31.25 0 0 0 5.794 3.99c-.726.95-1.436 2.008-1.96 3.07C3.304 8.133 3 9.138 3 10c0 0 2.5 1.5 5 .5s5-.5 5-.5c0-1.201-.796-2.157-2.181-3.7l-.03-.032C9.75 5.11 8.5 3.72 7.623 1.82z" />
                                                <path fill-rule="evenodd"
                                                    d="M4.553 7.776c.82-1.641 1.717-2.753 2.093-3.13l.708.708c-.29.29-1.128 1.311-1.907 2.87l-.894-.448z" />
                                            </svg>
                                            <select class="form-select @error('gender') is-invalid @enderror"
                                                name="gender">
                                                <option selected value="0">Select gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="others">Others</option>
                                            </select>
                                        </span>
                                    </div>

                                </div>
                                <div class="mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="#8a0303" class="me-3 bi bi-telephone-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                            </svg>
                                            <input type="file"
                                                class="form-control form-file @error('image') is-invalid @enderror"
                                                name='image'>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group d-grid">
                                    <button type="submit" class="btn btn-danger">
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
