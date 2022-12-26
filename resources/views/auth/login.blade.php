@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-6 col-sm-10 mx-auto">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Login</h3>
                        @if (\Session::has('fail'))
                            <div class="alert alert-danger">
                                {!! \Session::get('fail') !!}
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <form action="{{ route('login.custom') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label>Email:</label>
                                <input type="text" name="email" class="form-control">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <div class="position-relative">
                                    <input type="password" class="form-control" name="password" id="password">
                                    <span class="position-absolute top-50 end-0 translate-middle-y fs-4 pe-2"><i
                                            class='bx bx-show'id="togglePassword"></i></span>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <p>Don't have an Account ? <a href="{{ route('register') }}">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function() {

            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

            // toggle the eye icon
            this.classList.toggle('bx-show');
            this.classList.toggle('bx-hide');
        });
    </script>
@endsection
