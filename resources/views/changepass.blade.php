@extends('layouts.home')
@section('content')
<hr>
    <div class="container mt-5" data-aos="fade">
        <div class="row">
            <div class="col-10 col-lg-8 col-md-8 m-auto">
                <div class="card p-3">
                    <div class="card-header text-center mb-3">
                        <h4>Change Password</h4><br>
                    </div>
                    <div class="card-footer">
                        @if (session('success'))
                        <li class="alert alert-success mb-2">
                            {{ session('success') }}
                        </li>
                        @endif
                        @if (session('fail'))
                            <li class="alert alert-danger mb-2">
                                {{ session('fail') }}
                            </li>
                        @endif

                        @if ($errors->any())
                            <ul class="alert alert-danger" role="alert">
                                @foreach ($errors->all() as $error)
                                    <li class="text-white">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <form action="{{ route('updatePassword') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label>Current Password</label>
                                <input type="password" name="current_password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>New Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" />
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary "> Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
