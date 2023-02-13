@extends('layouts.home')
@section('content')
    <div class="hero-section">
        <div class="details">
            <h1>Blood request<br>Form</h1>
        </div>
    </div>
    <section class="section col-md-9 ms-md-auto">
        <div class="container ">
            <div class="row">
                <div class="col-lg-8 col-sm-10 col-md-8 mx-auto">

                    <div class="card card-primary">
                        <div class="card-body ">
                            <form method="POST" action="" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group ">
                                            <img src="{{ url(asset('images/requestIcons/person.svg')) }}" alt="">
                                            <label style="color:#C70039" class="fw-bold">Name</label>
                                            <input id="name" type="name"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                placeholder="Enter full name" value="{{ old('name') }}"
                                                autocomplete="name" autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group ">
                                            <img src="{{ url(asset('images/requestIcons/telephone-fill.svg')) }}"
                                                alt="">
                                            <label style="color:#C70039" class="fw-bold">Phone Number</label>
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                                placeholder="Your contact number" name="phone"
                                                value="{{ old('phone') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group ">
                                            <img src="{{ url(asset('images/requestIcons/envelope-fill.svg')) }}"
                                                alt="">
                                            <label style="color:#C70039" class="fw-bold">Email </label>
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                placeholder="Email address" value="{{ old('email') }}" autocomplete="email"
                                                autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group ">
                                            <img src="{{ url(asset('images//requestIcons/droplet-half.svg')) }}"
                                                alt="">
                                            <label style="color:#C70039" class="fw-bold">Blood Group</label>
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
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <img src="{{ url(asset('images//requestIcons/file-richtext.svg')) }}"
                                                alt="">
                                            <label style="color:#C70039" class="fw-bold">Requisition form</label>
                                            <input type="file" name="image"
                                                class="form-control @error('image') is-invalid @enderror">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group ">
                                            <img src="{{ url(asset('images/requestIcons/chat-dots.svg')) }}" alt="">
                                            <label for="message" class="form-label fw-bold"
                                                style="color:#C70039">Note</label>
                                            <textarea name="message" cols="80" rows="6" class="form-control" placeholder="Message.."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group d-grid">
                                    <button type="submit" class="btn btn-danger">
                                        Submit
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
