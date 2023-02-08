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
                            <h4 class="m-auto">Login</h4>
                        </div>
                        @if (Session::has('fail'))
                            <div class="alert alert-danger text-center" role="alert">
                                {{ Session::get('fail') }}
                            </div>
                        @endif
                        <div class="card-body">
                            <form method="POST" action="{{ route('login_submit') }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" autocomplete="email" autofocus>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="current-password">
                                </div>
                                <div class="mb-3">
                                    <a href="{{ route('forget_password') }}">Forget Password ?</a>
                                </div>
                                <div class="form-group d-grid">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <p>Don't have an Account ? <a href="{{ route('registration') }}">Register</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
