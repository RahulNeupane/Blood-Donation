@extends('layouts.home')
@section('content')
    <hr>
    <div class="container mt-2" data-aos="fade">
        <div class="row">
            <div class="col-sm-10 mx-auto">
                <div class="p-5">
                    <form action="{{ route('updateProfile') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-header text-center">
                                <h3>Edit Profile</h3>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email address</label>
                                    <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">District</label>
                                    <input type="text" class="form-control" name="district"
                                        value="{{ auth()->user()->district }}">
                                    @error('district')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" name="address" value="{{ auth()->user()->address }}">
                                    @error('address')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control" name="phone" value="{{ auth()->user()->phone }}">
                                    @error('phone')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Age</label>
                                    <input type="text" class="form-control" name="age" value="{{ auth()->user()->age }}">
                                    @error('age')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Gender</label>
                                    <select class="form-select" name="gender">
                                        <option {{auth()->user()->gender=='male'?'selected':''}} value="male">Male</option>
                                        <option {{auth()->user()->gender=='female'?'selected':''}} value="female">Female</option>
                                        <option {{auth()->user()->gender=='others'?'selected':''}} value="others">Others</option>
                                    </select>
                                    @error('gender')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label ">Image</label>
                                    <input type="file" class="form-control dropify mb-2" name='image'>
                                    <img src="{{url('/images/user/'.auth()->user()->image)}}" alt="user" width="120">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.dropify').dropify();
    </script>
@endsection
