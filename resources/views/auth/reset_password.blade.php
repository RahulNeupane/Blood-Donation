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
                            <h4 class="m-auto">Reset Password</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('reset_password_submit') }}" method="post">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <input type="hidden" name="email" value="{{ $email }}">
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password" autofocus>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Retype Password</label>
                                    <input type="password"
                                        class="form-control @error('retype_password') is-invalid @enderror" name="retype_password" autofocus>

                                    @error('retype_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group d-grid">
                                    <button type="submit" class="btn btn-primary">
                                        Update Password
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
