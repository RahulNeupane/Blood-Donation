@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row col-lg-8 col-md-8 col-sm-10 mx-auto">
            <form action="{{route('register.custom')}}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Register</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <div class="position-relative">
                                <input type="password" class="form-control" name="password" id="password">
                                <span class="position-absolute top-50 end-0 translate-middle-y fs-4 pe-2"><i class='bx bx-show'id="togglePassword"></i></span>
                            </div>
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">District</label>
                            <input type="text" class="form-control" name="district" value="{{ old('district') }}">
                            @error('district')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                            @error('address')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Age</label>
                            <input type="text" class="form-control" name="age" value="{{ old('age') }}">
                            @error('age')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Blood Group</label>
                            <select class="form-select" name="group">
                                <option selected value="0">Select a blood group</option>
                                @foreach ($bg as $item)
                                    <option value="{{ $item->BloodGroup }}">{{ $item->BloodGroup }}</option>
                                @endforeach
                            </select>
                            @error('group')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gender</label>
                            <select class="form-select" name="gender">
                                <option selected value="0">Select gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="others">Others</option>
                            </select>
                            @error('gender')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label ">Image</label>
                            <input type="file" class="form-control" name='image'>
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <p>Already have an account ? <a href="{{ route('login') }}">Login</a></p>
                    </div>
                </div>

            </form>
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
